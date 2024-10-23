<?php
    include_once '../inc/header.php';
    extract($result); 
?>
<div class="container">
    <main class="content">
        <h1>Sản phẩm</h1>
        <form action="?page=searchProduct2" method="post">
        <input type="hidden" name="admin-controller-product">
            <div class="category">
                <button name="all"> Tất cả </button>
                <button name="db"> Đang bán </button>
                <button name="hh"> Hết hàng </button>
                <button name="ba"> Đã bị ẩn </button>
            </div>
        </form>
        <!--Start: Admin-controller-->
        <form class="admin-controller" action="?page=searchProduct1" method="post">
        <input type="hidden" name="admin-controller-product">
                <!--add new user-->
            <button type="button" class="open_add_form_product"><i class="fa-solid fa-plus"></i>Thêm</button>
            <!--search: name or id-->
            <div class="srch">
                <input type="text" placeholder="Nhập idSach, tên sách ..." name='kyw'>
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <select name="idTL">
                <option value="-1">---Chọn---</option>
                <?php
                    $category = getAllCategory();
                    foreach($category as $item){
                        extract($item);
                ?>
                    <option value="<?=$idTL?>"><?=$tenTL?></option>
                <?php
                    }
                ?>
            </select>
            <!--icon sorting: when hover a block display: A-Z-->
            <label for="">Giá từ </label>
            <input type="text" name="priceFrom" class="priceFrom" id="priceFrom">
            <label for="">đến</label>
            <input type="text" name="priceTo" class="priceTo" id="priceTo">
            <button type="submit" name="btnsearch">Lọc</button>
            <label for="">Tồn kho </label>
            <button name="sort" class="sort" value="asc">
                <i class="fa-solid fa-sort-up"></i>
                <div class="note">Tăng dần</div>
            </button>
            <button name="sort" class="sort" value="desc">
                <i class="fa-solid fa-sort-down"></i>
                <div class="note">Giảm dần</div>
            </button>
        </form>
        <!--End: Admin-controller-->

        <!--Start: Data table-->
        <table>
                <!--noi dung tieu de-->
                <tr class="title">
                    <th>ID</th>
                    <th>Hình ảnh</th>
                    <th>Sản phẩm</th> <!--hinh anh + ten sp-->
                    <th>Tồn kho</th>
                    <th>Giá bán</th>
                    <th>Trạng thái</th> 
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
                        $giaban = number_format($giaban,0,"",".");
                ?>
                <tr>
                    <td class="product_id"><?=$idSach?></td>
                    <td class="product">
                        <img src="../../uploads/uploads_product/<?=$hinhanh?>" alt="">
                    </td>
                    <td><?=$tuasach?></td>
                    <td><?=$tonkho?></td>
                    <td><?=$giaban?>đ</td>
                    <td>
                        <?php  
                        if($trangthai==0)
                            echo '<span class="status red">Bị ẩn</span></td>';
                        else echo '<span class="status green">Đang bán</span></td>'
                        ?>
                    <td>
                        <a href="#" class="action-button open_view_form_product">
                            <i class="fa-solid fa-circle-info"></i>
                            <div class="action-tooltip">Chi tiết</div>
                        </a>
                        <a href="#" class="action-button open_edit_form_product">
                            <i class="fas fa-edit"></i>
                            <div class="action-tooltip">Chỉnh sửa</div>
                        </a>
                        <?php 
                            if($trangthai != 0)
                                echo 
                                '<a href="#" class="action-button lock_product">
                                <i class="fa-solid fa-unlock"></i>
                                <div class="action-tooltip">Khóa</div></a>';
                            else echo 
                                '<a href="#" class="action-button unlock_product">
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
            require 'add_product.php'; // add_product popup form
            require 'detail_product.php'; // detail_product popup form
            require 'edit_product.php'; // edit_product popup form
        ?>
        <!-- End: Pop-up form -->
    </main>
</div>
<?php
    include_once '../inc/footer_product.php';