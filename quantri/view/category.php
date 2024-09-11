<?php
    include_once '../inc/header.php';
    extract($result); 
?>
        <main class="content">
            <h1>Thể loại</h1>
            <!--Start: Admin-controller-->
            <form class="admin-controller" action="?page=searchCategory" method="post">
            <input type="hidden" name="admin-controller-category">
                <!--add new user-->
            <button type="button" class="open_add_form_category"><i class="fa-solid fa-plus"></i>Thêm</button>
            <!--search: name or id-->
            <div class="right">
                <div class="srch">
                    <input type="text" placeholder="Nhập id, tên thể loại" name='kyw'>
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
                        <th>Thể loại</th>
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
                        <td class="category_id"><?=$idTL?></td>
                        <td><?=$tenTL?></td>
                        <td>
                            <?php 
                            if($trangthai==0) echo '<span class="status red">Bị ẩn</span></td>';
                            else echo '<span class="status green">Hoạt động</span></td>'
                        ?>
                        <td>
                            <a href="#" class="action-button open_edit_form_category">
                                <i class="fas fa-edit"></i>
                                <div class="action-tooltip">Chỉnh sửa</div>
                            </a>
                            <?php 
                                if($trangthai!=0)
                                    echo 
                                    '<a href="#" class="action-button lock_category">
                                    <i class="fa-solid fa-unlock"></i>
                                    <div class="action-tooltip">Khóa</div></a>';
                                else echo 
                                    '<a href="#" class="action-button unlock_category">
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
            require 'add_category.php'; // add_category popup form
            require 'edit_category.php'; // edit_category popup form
        ?>
        <!-- End: Pop-up form -->
    </main>

<?php
    include_once '../inc/footer_category.php';
?>