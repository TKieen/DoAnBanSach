<?php
    extract($result); 
?>
<div class="container">
        <main class="content">
            <h1>Người dùng</h1>
            <!--Start: Admin-controller-->
            <form class="admin-controller" action="#" method="post">
                <!--add new user-->
            <button type="button" class="open_add_form"><i class="fa-solid fa-plus"></i>Thêm</button>
            <!--search: name or id-->
            <div class="right">
                <div class="srch">
                    <input type="text" placeholder="Từ khóa tìm kiếm" name='kyw'>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <select name="theloai" id="">
                    <option value="-1">---Loại người dùng---</option>
                    <option value="1">Chủ doanh nghiệp</option>
                    <option value="2">Admin</option>
                    <option value="3">Quản lí kho</option>
                    <option value="4">Khách hàng</option>
                </select>
                <!--select box: user status-->
                <select name="user-status" id="user-status">
                    <option value="-1">---Trạng thái---</option>
                    <option value="1">Hoạt động</option>
                    <option value="0">Bị ẩn</option>
                </select>
                <!--icon sorting: when hover a block display: A-Z-->
                <button class="sort">
                    <i class="fa-solid fa-sort-down"></i>
                    <div class="note">Tên: A-Z</div>
                </button>
                <button class="sort">
                    <i class="fa-solid fa-sort-up"></i>
                    <div class="note">Tên: Z-A</div>
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
                    <th>Người dùng</th>
                    <th>Điện thoại</th>
                    <th>Phân quyền</th>
                    <th>Trạng thái</th> 
                    <th></th> <!-- Actions gồm thêm, sửa, khóa (không cho người dùng đăng nhập)-->
                </tr>
                <!--thong tin users -->
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
                            <td><?=$dienthoai?></td>
                            <td>
                                <?php 
                                if($trangthai===0)
                                    echo '<span class="status red">Bị ẩn</span></td>';
                                else echo '<span class="status green">Hoạt động</span></td>'
                                ?>
                            <td>

                                <?php
                                switch($phanquyen){
                                    case 1: echo 'Chủ doanh nghiệp'; break;
                                    case 2: echo 'Admin'; break;
                                    case 3: echo 'Thủ kho'; break;
                                    case 4: echo 'Khách hàng'; break;
                                }
                                ?>

                            </td>
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

            <!--Start: Paging-->
            <div class="paging">
                <?php           
                    $total_pages = ceil($total_records/$num_per_page);

                    if($curr_page>1)
                        echo '<a href="index.php?page=user&index='.($curr_page-1).'">&lt;</a>';
                    else echo '<a href="index.php?page=user&index=1">&lt;</a>';

                    for($i=1; $i<=$total_pages; $i++){
                        if($curr_page==$i)
                            echo '<a href="index.php?page=user&index='.$i.'" class="active">'.$i.'</a>';
                        else echo '<a href="index.php?page=user&index='.$i.'">'.$i.'</a>';
                    }

                    //kiem tra neu currentpage la trang dau tien thi giu nguyen
                    if($curr_page<$total_pages)
                        echo '<a href="index.php?page=user&index='.($curr_page+1).'">&gt;</a>';
                    else echo '<a href="index.php?page=user&index='.$total_pages.'">&gt;</a>';
                ?>
            </div>
            <!--End: Paging-->

            <!-- Start: Pop-up form -->
            <?php 
                require 'add_user.php'; // add_user popup form
                require 'edit_user.php'; // edit_user popup form
                require 'detail_user.php'; // detail_user popup form
            ?>
            <!-- End: Pop-up form -->
        </main>
</div>