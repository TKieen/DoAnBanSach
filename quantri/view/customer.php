<?php
    extract($result); 
?>
<div class="container">
    <!--Start: Aside bar-->
    <aside>
        <!--menu button-->
        <div class="menu-btn">
            <i class="fas fa-bars"></i>
        </div>
        <!--sidebar-->
        <div class="side-bar">
            <!--Menu items-->
            <div class="menu">
                <div class="item"><a href="NguoiBanHang.html" class="active"><i class="fas fa-desktop"></i>Đơn hàng</a></div>
                <div class="item"><a href="KhachHang.html"><i class="fas fa-th"></i>Khách hàng</a></div>  
                <div class="item">
                    <a href="">
                        <i class="fas fa-table"></i>Thống kê
                        <!--dropdown-->
                        <!--dropdown arrow-->
                        <i class="fas fa-angle-right dropdown"></i>
                    </a>
                    <div class="sub-menu">
                        <a href="" class="sub-item">Doanh thu</a>
                        <a href="" class="sub-item">Lợi nhuận</a>
                        <a href="" class="sub-item">Đơn hàng</a>
                    </div>
                </div>      
            </div>
        </div>
    </aside>
    <!--End: Aside bar-->
    <main class="content">
        <h1>Khách hàng</h1>
        <!--Start: Admin-controller-->
        <form class="admin-controller" action="#" method="post">
            <!--add new user-->
            <button type="button" class="open_add_form"><i class="fa-solid fa-plus"></i>Thêm</button>
            <!--search: name or id-->
            <div class="right">
                <div class="srch">
                    <input type="text" placeholder="Nhập tên hoặc mã" name='kyw'>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <!--select box: user status-->
                <select name="user-status">
                    <option value="-1">---Trạng thái---</option>
                    <option value="1">Hoạt động</option>
                    <option value="0">Bị ẩn</option>
                </select>
                <!--icon sorting: when hover a block display: A-Z-->
                <label for="">Tên khách hàng</label>
                <button class="sort">
                    <i class="fa-solid fa-sort-down"></i>
                    <div class="note">A-Z</div>
                </button>
                <button class="sort">
                    <i class="fa-solid fa-sort-up"></i>
                    <div class="note">Z-A</div>
                </button>
                <button type="submit" name="btnsearch">Xem</button>
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
                $num_per_page = 2; //total records each page
                $curr_page = getPage();
                $start = ($curr_page-1)*$num_per_page; //start divide for this page
                $total_records = count($result);
                echo '<input type="hidden" name="curr_page" class="curr_page" value="'.$curr_page.'">';

                $keys = array_keys($result);
                for($i=$start; $i<$start+$num_per_page && $i<$total_records; $i++){
                    extract($result[$keys[$i]]);
            ?>
            <tr>
                <td class="user_id"><?=$ID?></td>
                <td><?=$ten?></td>
                <td><?=$email?></td>
                <td><?=$dienthoai?></td>
                <td>
                    <?php 
                    if($trangthai===0)
                        echo '<span class="status red">Bị ẩn</span></td>';
                    else echo '<span class="status green">Hoạt động</span></td>'
                    ?>
                <td>
                    <a href="#" class="action-button open_view_form">
                        <i class="fa-solid fa-circle-info"></i>
                        <div class="action-tooltip">Chi tiết</div>
                    </a>
                    <a href="#" class="action-button open_edit_form">
                        <i class="fas fa-edit"></i>
                        <div class="action-tooltip">Chỉnh sửa</div>
                    </a>
                    <a href="#" class="action-button delete">
                        <i class="fas fa-trash-alt"></i>
                        <div class="action-tooltip">Xóa</div>
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
                    echo '<a href="index.php?page=customer&index='.($curr_page-1).'">&lt;</a>';
                else echo '<a href="index.php?page=customer&index=1">&lt;</a>';

                for($i=1; $i<=$total_pages; $i++){
                    if($curr_page==$i)
                        echo '<a href="index.php?page=customer&index='.$i.'" class="active">'.$i.'</a>';
                    else echo '<a href="index.php?page=customer&index='.$i.'">'.$i.'</a>';
                }

                //kiem tra neu currentpage la trang dau tien thi giu nguyen
                if($curr_page<$total_pages)
                    echo '<a href="index.php?page=customer&index='.($curr_page+1).'">&gt;</a>';
                else echo '<a href="index.php?page=customer&index='.$total_pages.'">&gt;</a>';
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
</div>