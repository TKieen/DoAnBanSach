<?php
    include_once '../inc/header.php';
    include_once '../model/functions.php';
    include_once '../controller/thongKe.php';
    include_once '../../config/config.php';
    //extract($result); 
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
    <!-- Đoạn php này để test hiển thị tháng năm-->
    <?php
                $M = "04"; //input Month
                $Y = "2024"; //inputYear
                $WEEK4_END_DAY = "a";
                if ((int)$M >=0 && (int)$M <=12) {
                    if ((int)$M == 2) {
                        if (((int)$Y % 400 == 0 && (int)$Y % 100 == 0) || (int)$Y % 4 == 0) {
                            $WEEK4_END_DAY = 29;
                        }
                        else {
                            $WEEK4_END_DAY = 28;
                        }
                    }
                    elseif ((int)$M % 2 ==0) {
                        $WEEK4_END_DAY = 30;
                    }
                    else {
                        $WEEK4_END_DAY = 31;
                    }
                }
            ?>
                <!-- -->
    <!--End: Aside bar-->
    <main class="content">
        <h1>Thống kê doanh thu</h1>
        <!--Start: Admin-controller-->
        <form class="admin-controller" action="?page=TKDoanhThu" method="post">

            <button type="submit" name="btnsearch">Xem</button>
        </div>
        <!--End: Admin-controller-->

        <!--Start: Data table-->
            <table>
            <!--noi dung tieu de-->
                
            <tr class="title">
                <th></th>
                <th>Từ ngày</th>
                <th>Đến ngày</th>
                <th>Tổng đơn hàng</th>
                <th>Tổng sản phẩm</th> <!-- Actions gồm thêm, sửa, khóa (không cho người dùng đăng nhập)-->
                <th>Tổng tiền nhập</th>
            </tr>
            <tr>
                <th>Tuần 1</th>
                <td><?php echo dateFormat(WEEK1_START_DAY."-".$M."-".$Y); ?></td>
                <td><?php echo dateFormat(WEEK1_END_DAY."-".$M."-".$Y); ?></td>
                <td id="w1_tongDH"><?php echo DoanhThu_getTongDH(dateFormat(WEEK1_START_DAY."-".$M."-".$Y), dateFormat(WEEK1_END_DAY."-".$M."-".$Y)); ?></td>
                <td id="w1_tongSL"><?php echo DoanhThu_getTongSL(dateFormat(WEEK1_START_DAY."-".$M."-".$Y), dateFormat(WEEK1_END_DAY."-".$M."-".$Y)); ?></td>
                <td id="w1_tongTien"><?php echo DoanhThu_getTongTien(dateFormat(WEEK1_START_DAY."-".$M."-".$Y), dateFormat(WEEK1_END_DAY."-".$M."-".$Y)); ?></td>
            </tr>
            <tr>
                <th>Tuần 2</th>
                <td><?php echo dateFormat(WEEK2_START_DAY."-".$M."-".$Y); ?></td>
                <td><?php echo dateFormat(WEEK2_END_DAY."-".$M."-".$Y); ?></td>
                <td id="w2_tongDH"><?php echo DoanhThu_getTongDH(dateFormat(WEEK2_START_DAY."-".$M."-".$Y), dateFormat(WEEK2_END_DAY."-".$M."-".$Y)); ?></td>
                <td id="w2_tongSL"><?php echo DoanhThu_getTongSL(dateFormat(WEEK2_START_DAY."-".$M."-".$Y), dateFormat(WEEK2_END_DAY."-".$M."-".$Y)); ?></td>
                <td id="w2_tongTien"><?php echo DoanhThu_getTongTien(dateFormat(WEEK2_START_DAY."-".$M."-".$Y), dateFormat(WEEK2_END_DAY."-".$M."-".$Y)); ?></td>
            </tr>
            <tr>
                <th>Tuần 3</th>
                <td><?php echo dateFormat(WEEK3_START_DAY."-".$M."-".$Y); ?></td>
                <td><?php echo dateFormat(WEEK3_END_DAY."-".$M."-".$Y); ?></td>
                <td id="w3_tongDH"><?php echo DoanhThu_getTongDH(dateFormat(WEEK3_START_DAY."-".$M."-".$Y), dateFormat(WEEK3_END_DAY."-".$M."-".$Y)); ?></td>
                <td id="w3_tongSL"><?php echo DoanhThu_getTongSL(dateFormat(WEEK3_START_DAY."-".$M."-".$Y), dateFormat(WEEK3_END_DAY."-".$M."-".$Y)); ?></td>
                <td id="w3_tongTien"><?php echo DoanhThu_getTongTien(dateFormat(WEEK3_START_DAY."-".$M."-".$Y), dateFormat(WEEK3_END_DAY."-".$M."-".$Y)); ?></td>
            </tr>
            <tr>
                <th>Tuần 4</th>
                <td><?php echo dateFormat(WEEK4_START_DAY."-".$M."-".$Y); ?></td>
                <td><?php echo dateFormat($WEEK4_END_DAY."-".$M."-".$Y); ?></td>
                <td id="w4_tongDH"><?php echo DoanhThu_getTongDH(dateFormat(WEEK4_START_DAY."-".$M."-".$Y), dateFormat($WEEK4_END_DAY."-".$M."-".$Y)); ?></td>
                <td id="w4_tongSL"><?php echo DoanhThu_getTongSL(dateFormat(WEEK4_START_DAY."-".$M."-".$Y), dateFormat($WEEK4_END_DAY."-".$M."-".$Y)); ?></td>
                <td id="w4_tongTien"><?php echo DoanhThu_getTongTien(dateFormat(WEEK4_START_DAY."-".$M."-".$Y), dateFormat($WEEK4_END_DAY."-".$M."-".$Y)); ?></td>
            </tr>
            <tr>
                <th>Tổng</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <div><button type="submit" name="print">Xuất ra file PDF</button></div>
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
                <td class="supplier_id"><?=$ID?></td>
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
                    echo '<a href="index.php?page=supplier&index='.($curr_page-1).'">&lt;</a>';
                else echo '<a href="index.php?page=supplier&index=1">&lt;</a>';

                for($i=1; $i<=$total_pages; $i++){
                    if($curr_page==$i)
                        echo '<a href="index.php?page=supplier&index='.$i.'" class="active">'.$i.'</a>';
                    else echo '<a href="index.php?page=supplier&index='.$i.'">'.$i.'</a>';
                }

                //kiem tra neu currentpage la trang dau tien thi giu nguyen
                if($curr_page<$total_pages)
                    echo '<a href="index.php?page=supplier&index='.($curr_page+1).'">&gt;</a>';
                else echo '<a href="index.php?page=supplier&index='.$total_pages.'">&gt;</a>';
            ?>
        </div>
        <!--End: Pagination-->

        <!-- Start: Pop-up form -->
        <?php 
            require 'add_supplier.php'; // add_supplier popup form
            require 'edit_supplier.php'; // edit_supplier popup form
            require 'detail_supplier.php'; // detail_supplier popup form
        ?>
        <!-- End: Pop-up form -->
    </main>
</div>
<?php
    include_once '../inc/footer_supplier.php';
?>
