<?php
    include_once '../inc/header.php';
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
            <div class="item"><a href="?page=supplier" class="active"><i class="fas fa-desktop"></i>Nhà cung cấp</a></div>
            <div class="item"><a href="?page=product"><i class="fas fa-th"></i>Sản phẩm</a></div>  
            <div class="item"><a href="?page=category"><i class="fas fa-th"></i>Danh mục</a></div>  
            <div class="item"><a href="?page=discount"><i class="fas fa-th"></i>Mã giảm giá</a></div>  
            <div class="item">
                <a>
                    <i class="fas fa-table"></i>Nhập kho
                    <i class="fas fa-angle-right dropdown"></i>
                </a>
                <!--dropdown-->
                <div class="sub-menu">
                    <a href="PhieuNhapKho.html" class="sub-item">Phiếu nhập kho</a> <!--tao + xem lich su phieu nhap kho-->
                    <a href="#" class="sub-item">Thống kê</a>
                </div>
            </div>      
        </div>
    </div>
    </aside>
    <!--End: Aside bar-->
    <main class="content">
        <h1>Sản phẩm</h1>
        <div class="category">
            <a href="#">Tất cả</a>
            <a href="#">Đang hoạt động</a>
            <a href="#">Hết hàng</a>
            <a href="#">Đã bị ẩn</a>
        </div>
        <!--Start: Admin-controller-->
        <form class="admin-controller" action="#" method="post">
                <!--add new user-->
            <button type="button" class="open_add_form"><i class="fa-solid fa-plus"></i>Thêm</button>
            <!--search: name or id-->
            <div class="srch">
                <input type="text" placeholder="Nhập tên hoặc mã" name='kyw'>
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <select name="theloai" id="">
                <option value="-1">---Thể loại---</option>
                <option value="vanhoc">Văn học</option>
                <option value="thieunhi">Thiếu nhi</option>
            </select>
            <!--icon sorting: when hover a block display: A-Z-->
            <label for="">Giá </label>
            <input type="text" name="tonkhofrom">
            <label for="">đến</label>
            <input type="text" name="tonkhoto">
            <label for="">Tồn kho </label>
            <button class="sort">
                <i class="fa-solid fa-sort-down"></i>
                <div class="note">Tăng dần</div>
            </button>
            <button class="sort">
                <i class="fa-solid fa-sort-up"></i>
                <div class="note">Giảm dần</div>
            </button>
            <button type="submit" name="btnsearch">Xem</button>
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
                    $num_per_page = 2; //total records each page
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
                        if($trangthai===0)
                            echo '<span class="status red">Bị ẩn</span></td>';
                        else echo '<span class="status green">Đang bán</span></td>'
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
                    echo '<a href="index.php?page=product&index='.($curr_page-1).'">&lt;</a>';
                else echo '<a href="index.php?page=product&index=1">&lt;</a>';

                for($i=1; $i<=$total_pages; $i++){
                    if($curr_page==$i)
                        echo '<a href="index.php?page=product&index='.$i.'" class="active">'.$i.'</a>';
                    else echo '<a href="index.php?page=product&index='.$i.'">'.$i.'</a>';
                }

                //kiem tra neu currentpage la trang dau tien thi giu nguyen
                if($curr_page<$total_pages)
                    echo '<a href="index.php?page=product&index='.($curr_page+1).'">&gt;</a>';
                else echo '<a href="index.php?page=product&index='.$total_pages.'">&gt;</a>';
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