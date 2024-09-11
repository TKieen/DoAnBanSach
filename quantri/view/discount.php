<?php
    include_once '../inc/header.php';
    extract($result); 
?>
    <main class="content">
        <h1>Mã giảm giá</h1>
        <!--Start: Admin-controller-->
        <form class="admin-controller" action="?page=searchDiscount" method="post">
        <input type="hidden" name="admin-controller-discount">
            <!--add new user-->
        <button type="button" class="open_add_form_discount"><i class="fa-solid fa-plus"></i>Thêm</button></a>
        <!--search: name or id-->
        <div class="right">
            <div class="srch">
                <input type="text" placeholder="Nhập id, phần trăm giảm" name='kyw'>
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <button type="submit" name="btnsearch">Xem</button>
        </div>
    </form>
        <!--End: Admin-controller-->

        <!--Start: Data table-->
            <table>
                <!--noi dung tieu de-->
                <tr class="title">
                    <th>ID</th>
                    <th>Discount(%)</th>
                    <th>Bắt đầu</th>
                    <th>Kết thúc</th>
                    <th>Trạng thái</th>
                    <!-- Actions gồm thêm, sửa, khóa (không cho người dùng đăng nhập)-->
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
                ?>
                <tr>
                    <td class="discount_id"><?=$idMGG?></td>
                    <td><?=$phantram?></td>
                    <td><?=$ngaybatdau?></td>
                    <td><?=$ngayketthuc?></td>
                    <td>
                        <?php 
                        if($trangthai==="huy") echo '<span class="status red">Bị hủy</span></td>';
                        else if($trangthai==="hh") echo '<span class="status yellow">Hết hạn</span></td>';
                        else if($trangthai==="hd")echo '<span class="status green">Hoạt động</span></td>';
                        else if($trangthai==="cdr")echo '<span class="status green">Chưa diễn ra</span></td>';
                        ?>
                    <td>
                        <?php 
                            if($trangthai=="cdr"){
                                echo
                                '<a href="#" class="action-button open_edit_form_discount">
                                    <i class="fas fa-edit"></i>
                                    <div class="action-tooltip">Chỉnh sửa</div>
                                </a>';
                        
                                echo 
                                '<a href="#" class="action-button lock_discount">
                                <i class="fa-solid fa-trash"></i>
                                <div class="action-tooltip">Hủy</div></a>';
                            }
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
            require 'add_discount.php'; // add_discount popup form
            require 'edit_discount.php'; // edit_discount popup form
        ?>
        <!-- End: Pop-up form -->
    </main>
<?php
    include_once '../inc/footer_discount.php';
?>