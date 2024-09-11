<?php
    include_once '../inc/header.php';
    extract($result); 
?>
        <main class="content">
            <h1>Người dùng</h1>
            <!--Start: Admin-controller-->
            <form class="admin-controller" action="?page=searchUser" method="post">
            <input type="hidden" name="admin-controller-user">
                <!--add new user-->
            <button type="button" class="open_add_form_user"><i class="fa-solid fa-plus"></i>Thêm</button>
            <!--search: name or id-->
            <div class="right">
                <div class="srch">
                    <input type="text" placeholder="Nhập id, tên, sdt" name='kyw'>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <select name="phanquyen" id="">
                    <option value="-1">---Loại người dùng---</option>
                    <option value="DN">Chủ doanh nghiệp</option>
                    <option value="AD">Admin</option>
                    <option value="TK">Thủ kho</option>
                    <option value="KH">Khách hàng</option>
                    <option value="BH">Người bán hàng</option>
                </select>
                <!--select box: user status-->
                <select name="user-status" id="user-status">
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
                    <th>Người dùng</th>
                    <th>Điện thoại</th>
                    <th>Trạng thái</th>
                    <th>Phân quyền</th> 
                    <th></th> <!-- Actions gồm thêm, sửa, khóa (không cho người dùng đăng nhập)-->
                </tr>
                <!--thong tin users -->
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
                            <td><?=$dienthoai?></td>
                            <td>
                                <?php
                                if($trangthai==0)
                                    echo '<span class="status red">Bị ẩn</span></td>';
                                else echo '<span class="status green">Hoạt động</span></td>'
                                ?>
                            <td>

                                <?php
                                switch($phanquyen){
                                    case "DN": echo 'Chủ doanh nghiệp'; break;
                                    case "AD": echo 'Admin'; break;
                                    case "TK": echo 'Thủ kho'; break;
                                    case "KH": echo 'Khách hàng'; break;
                                    case "BH": echo 'Người bán hàng'; break;
                                }
                                ?>

                            </td>
                            <td>
                                <a href="#" class="action-button open_view_form_user">
                                    <i class="fa-solid fa-circle-info"></i>
                                    <div class="action-tooltip">Chi tiết</div>
                                </a>
                                <a href="#" class="action-button open_edit_form_user">
                                    <i class="fas fa-edit"></i>
                                    <div class="action-tooltip">Chỉnh sửa</div>
                                </a>
                                <?php 
                                    if($trangthai!=0)
                                        echo 
                                        '<a href="#" class="action-button lock_user">
                                        <i class="fa-solid fa-unlock"></i>
                                        <div class="action-tooltip">Khóa</div></a>';
                                    else echo 
                                        '<a href="#" class="action-button unlock_user">
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

            <!--Start: Paging-->
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
            <!--End: Paging-->

            <!-- Start: Pop-up form -->
            <?php 
                require 'add_user.php'; // add_user popup form
                require 'edit_user.php'; // edit_user popup form
                require 'detail_user.php'; // detail_user popup form
            ?>
            <!-- End: Pop-up form -->
        </main>
<?php
    include_once '../inc/footer_admin.php';
?>