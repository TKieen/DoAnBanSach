<?php
    include_once '../inc/header.php';
    extract($result); 
?>
    <main class="content">
        <h1>Đơn hàng</h1>
        <!--Start: Admin-controller-->
        <form class="admin-controller" action="?page=searchOrder" method="post">
            <input type="hidden" name="admin-controller-order">
                <!--add new user-->
            <div class="empty"></div>
            <!-- <button type="button" class="create" onclick="togglePopup()"><i class="fa-solid fa-plus"></i>Thêm</button> -->
            <!--search: name or id-->
            <div class="right">
                <div>
                    <select name="trangthai">
                        <option value="-1">---Trạng thái---</option>
                        <option value="cho">Chờ duyệt</option>
                        <option value="vc">Đang vận chuyển</option>
                        <option value="ht">Hoàn tất</option>
                        <option value="huykh">Hủy bởi khách hàng</option>
                        <option value="huynv">Hủy bởi người bán</option>
                    </select>
                </div>
                <div class="srch">
                    <input type="text" placeholder="Nhập idDH, tên KH" name='kyw'>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <!--icon sorting: when hover a block display: A-Z-->
                <div class="date">
                    <div>
                        <label for="from">Từ</label>
                        <input type="date" name="dateFrom">
                    </div>
                    <div>
                        <label for="to">đến</label>
                        <input type="date" name="dateTo">
                    </div>
                </div>
                <button type="submit" name="btnsearch">Lọc</button>
            </div>
        </form>
        <!--End: Admin-controller-->

        <!--Start: Data table-->
            <table>
            <!--noi dung tieu de-->
            <tr class="title">
                <th>ID</th>
                <th>Khách hàng</th> <!--hinh anh + ten sp-->
                <th>Ngày tạo</th> <!--hinh anh + ten sp-->
                <th>Ngày cập nhật</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th> 
                <th></th> <!-- Actions gồm thêm, sửa, khóa (không cho người dùng đăng nhập)-->
            </tr>
            <?php 
                //chia mang result thanh tung trang
                $num_per_page = 5; //total records each page
                $curr_page = getPage();
                $start = ($curr_page-1)*$num_per_page; //start divide for this page
                $total_records = count($result);
                echo '<input type="hidden" name="curr_page" class="curr_page" value="'.$curr_page.'">';

                $keys = array_keys($result);
                for($i=$start; $i<$start+$num_per_page && $i<$total_records; $i++){
                    extract($result[$keys[$i]]);
                    $tongtien = number_format($tongtien,0,"",".");
            ?>
            <tr>
                <td class="order_id"><?=$idDH?></td>    
                <td><?=$tenTK?></td>
                <td><?=$ngaytao?></td>
                <td><?=$ngaycapnhat?></td>
                <td><?=$tongtien?>đ</td>
                <td>
                    <?php 
                    if($trangthai==="cho") echo '<span class="status yellow">Chờ duyệt</span></td>';
                    else if($trangthai==="vc") echo '<span class="status blue">Đang vận chuyển</span></td>';
                    else if($trangthai==="ht") echo '<span class="status green">Hoàn tất</span></td>';
                    else if($trangthai==="huykh") echo '<span class="status red">Hủy bởi khách hàng</span></td>';
                    else if($trangthai==="huynv") echo '<span class="status red">Hủy bởi người bán</span></td>';
                    ?>
                </td>
                <td>
                    <a href="#" class="action-button open_view_form_order">
                        <i class="fa-solid fa-circle-info"></i>
                        <div class="action-tooltip">Chi tiết</div>
                    </a>
                <?php
                    if($trangthai=="cho" || $trangthai=="vc") //cap nhat trang thai
                        echo
                        '<a href="#" class="action-button open_edit_form_order">
                            <i class="fas fa-edit"></i>
                            <div class="action-tooltip">Chỉnh sửa</div>
                        </a>';
                ?>
                        <a href="../controller/printInvoice.php?idDH=<?=$idDH?>" target="_blank" class="action-button print_order">
                            <i class="fa-solid fa-print"></i>
                            <div class="action-tooltip">In</div>
                        </a>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
        <!--End: Data table-->
        
        <!--Start: Pagination-->
        <div class="paging">
            <?php           
                $total_pages = ceil($total_records/$num_per_page);

                if($curr_page>1)
                    echo '<a href="index.php?page='.$pageTitle.'&index='.($curr_page-1).'">&lt;</a>';
                else echo '<a href="index.php?page='.$pageTitle.'&index=1">&lt;</a>';

                for($i=1; $i<=$total_pages; $i++){
                    if($curr_page==$i)
                        echo '<a href="index.php?page='.$pageTitle.'&index='.$i.'" class="active">'.$i.'</a>';
                    else echo '<a href="index.php?page='.$pageTitle.'&index='.$i.'">'.$i.'</a>';
                }

                //kiem tra neu currentpage la trang dau tien thi giu nguyen
                if($curr_page<$total_pages)
                    echo '<a href="index.php?page='.$pageTitle.'&index='.($curr_page+1).'">&gt;</a>';
                else echo '<a href="index.php?page='.$pageTitle.'&index='.$total_pages.'">&gt;</a>';
            ?>
        </div>
        <!--End: Pagination-->

        <!-- Start: Pop-up form -->
        <?php 
            require 'edit_order.php'; // edit_order popup form
            require 'detail_order.php'; // detail_order popup form
        ?>
        <!-- End: Pop-up form -->
    </main>
<?php
    include_once '../inc/footer_order.php';
?>