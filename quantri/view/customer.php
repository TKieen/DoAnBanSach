<?php
    include_once '../inc/header.php';
    extract($result); 
?>
    <main class="content">
        <h1>Khách hàng</h1>
        <!--Start: Admin-controller-->
        <form class="admin-controller" method="post" action="?page=searchCustomer">
            <input type="hidden" name="admin-controller-customer">
            <!--add new user-->
            <button type="button" class="open_add_form_customer"><i class="fa-solid fa-plus"></i>Thêm</button>
            <!--search: name or id-->
            <div class="right">
                <div class="srch">
                    <input type="text" placeholder="Tìm kiếm theo ID, Tên hoặc Số điện thoại Khách hàng..." name='kyw'>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <!--select box: user status-->
                <select name="user-status">
                    <option value="-1">---Trạng thái---</option>
                    <option value="1">Hoạt động</option>
                    <option value="0">Bị ẩn</option>
                </select>
                <button type="submit" name="btnsearch">Lọc</button>
            </div>
        </form>
        <!--End: Admin-controller-->

        <!--Start: Data table-->
        <table>
            <!--noi dung tieu de-->
            <tr class="title">
                <th>ID</th>
                <th>Khách hàng</th>
                <th>Email</th>
                <th>Điện thoại</th>
                <th>Trạng thái</th> <!-- Actions gồm thêm, sửa, khóa (không cho người dùng đăng nhập)-->
                <th></th>
            </tr>
            
                <!--thong tin customer -->
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
                <td class="user_id"><?=$idTK?></td>
                <td><?=$tenTK?></td>
                <td><?=$email?></td>
                <td><?=$dienthoai?></td>
                <td>
                    <?php 
                    if($trangthai==0)
                        echo '<span class="status red">Bị ẩn</span></td>';
                    else echo '<span class="status green">Hoạt động</span></td>'
                    ?>
                <td>
                    <a href="#" class="action-button open_view_form_customer">
                        <i class="fa-solid fa-circle-info"></i>
                        <div class="action-tooltip">Chi tiết</div>
                    </a>
                    <a href="#" class="action-button open_edit_form_customer">
                        <i class="fas fa-edit"></i>
                        <div class="action-tooltip">Chỉnh sửa</div>
                    </a>
                    <?php 
                    if($trangthai!=0)
                        echo 
                        '<a href="#" class="action-button lock_customer">
                        <i class="fa-solid fa-unlock"></i>
                        <div class="action-tooltip">Khóa</div></a>';
                    else echo 
                        '<a href="#" class="action-button unlock_customer">
                        <i class="fa-solid fa-lock"></i>
                        <div class="action-tooltip">Mở</div></a>';
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
            require 'add_customer.php'; // add_customer popup form
            require 'edit_customer.php'; // edit_customer popup form
            require 'detail_customer.php'; // detail_customer popup form
        ?>
        <!-- End: Pop-up form -->
    </main>
<?php
    include_once '../inc/footer_customer.php';
?>