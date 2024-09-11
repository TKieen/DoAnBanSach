<?php
    include_once '../inc/header.php';
    extract($result); 
?>
        <main class="content">
            <h1>Phiếu nhập kho</h1>
            <!--Start: Admin-controller-->
            <form class="admin-controller" action="?page=searchPhieunhapkho" method="post">
                <input type="hidden" name="admin-controller-phieunhapkho">
                <!--add new user-->
                <button type="button" class="open_add_form_phieunhapkho"><i class="fa-solid fa-plus"></i>Thêm</button>
                <!--search: name or id-->
            <div class="right">
                <div class="srch">
                    <input type="text" placeholder="Nhập idPN, tên NCC" name='kyw'>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <!--select box: user status-->
                <div class="date">
                    <div>
                        <label for="from">Từ </label>
                        <input type="date" name="from">
                    </div>
                    <div>
                        <label for="to">đến </label>
                        <input type="date" name="to">
                    </div>
                </div>
                <button type="submit" name="btnsearch">Lọc</but ton>
            </div>
        </form>
            <!--End: Admin-controller-->

            <!--Start: Data table-->
             <!--data table-->
             <table>
                    <!--noi dung tieu de-->
                    <tr class="title">
                        <th>IdPN</th>
                        <th>Nhà cung cấp</th>
                        <th>Tổng tiền</th>
                        <th>Ngày tạo</th> <!-- Actions gồm thêm, sửa, khóa (không cho người dùng đăng nhập)-->
                        <th>Ngày cập nhật</th> <!-- Actions gồm thêm, sửa, khóa (không cho người dùng đăng nhập)-->
                        <th>Trạng thái</th> <!-- Actions gồm thêm, sửa, khóa (không cho người dùng đăng nhập)-->
                        <th></th>
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
                        <td><?=$idPN?></td>
                        <td><?=$tenNCC?></td>
                        <td><?=$tongtien?></td>
                        <td><?=$ngaytao?></td>
                        <td><?=$ngaycapnhat?></td>
                        <td>
                            <?php  
                            if($trangthai==="cht")
                                echo '<span class="status red">Chưa hoàn thành</span></td>';
                            else if($trangthai==="ht")
                                echo '<span class="status green">Hoàn thành</span></td>';
                            else echo '<span class="status yellow">Bị hủy</span></td>';
                            ?>
                        </td>
                        <td>
                            <a href="?page=detail_phieunhapkho&idPN=<?=$idPN?>" class="action-button">
                                <i class="fa-solid fa-circle-info"></i>
                                <div class="action-tooltip">Chi tiết</div>
                            </a>
                            <a href="../controller/printGRN.php?idPN=<?=$idPN?>" target="_blank" class="action-button print_order">
                                <i class="fa-solid fa-print"></i>
                                <div class="action-tooltip">In</div>
                            </a>
                            <?php
                                if($trangthai==="cht")
                                echo 
                                    '<a href="?page=edit_phieunhapkho&idPN='.$idPN.'" class="action-button">
                                        <i class="fas fa-edit"></i>
                                        <div class="action-tooltip">Chỉnh sửa</div>
                                    </a>';
                            ?>
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
            require 'add_formPN.php'; // add_supplier popup form
        ?>
        <!-- End: Pop-up form -->
    </main>
<?php
    include_once '../inc/footer_phieunhapkho.php';
?>