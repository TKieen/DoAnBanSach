<?php
    include_once '../inc/header_phieunhapkho.php';
    extract($phieunhap);
?>
        <main class="content">
            <h1>Phiếu nhập kho </h1>
            <form action="" class="inventory">
            <div class="general">
                <div class="item">
                    <div class="field">
                        <label for="">Trạng thái:</label>
                        <?php
                        if($trangthai == "cht") $trangthai = "Chưa hoàn thành";
                        else if($trangthai == "ht") $trangthai = "Hoàn thành";
                        else $trangthai = "Hủy"
                        ?>
                        <div class="info"><?=$trangthai?></div>
                    </div>
                    <div class="field">
                        <label for="">Nhà cung cấp:</label>
                        <div class="info"><?=$tenNCC?></div>
                    </div>
                    
                </div>
                <div class="item">
                    <div class="field">
                        <label for="">Ngày lập phiếu:</label>
                        <div class="info">
                            <?=$ngaytao?>
                        </div>
                    </div>
                    <div class="field">
                        <label for="">Ngày cập nhật:</label>
                        <div class="info">
                            <?=$ngaycapnhat?>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="field">
                        <label for="">Tổng SL:</label>
                        <div class="info"><?=$tongsoluong?></div>
                    </div>
                    <div class="field">
                        <label for="">Tổng tiền:</label>
                        <div class="info"><?=number_format($tongtien,0,"",".");$tongtien?>đ</div>
                    </div>
                </div>
            </div>

            <!--Start: Data table-->
            <form action="">
             <table>
                <thead class="title">
                    <th>Tên sách</th> <!--chỉ cho người dùng select, ko cho tự điền vào form-->
                    <th>SL</th>
                    <th>Đơn giá nhập</th>
                    <th>Đơn giá bìa</th>
                    <th>Thành tiền</th>
                </thead>
                <tbody>
                    <?php
                        foreach($ctphieunhap as $item){
                            extract($item);
                            $giabia = number_format($giabia,0,"",".");
                            $gianhap = number_format($gianhap,0,"",".");
                            $thanhtien = number_format($thanhtien,0,"",".");
                    ?>
                    <tr>
                        <!-- tim kiem ten sach va sach duoc cung cap boi nha cung cap -->
                        <td class="srch-product">
                            <?php
                                echo "#".$idSach." - ".$tuasach;
                            ?>
                        </td>
                        <td class="quantity">
                            <?=$soluong?>
                        </td>
                        <!--gia nhap, gia bia phai duoc them luc tao san pham-->
                        <!--gererate auto-->
                        <td class="gianhap">
                            <?=$gianhap?>đ
                        </td>
                        <td>
                            <?=$giabia?>đ
                        </td>
                        <td>
                            <?=$thanhtien?>đ
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
             </table>
            <!--End: Data table-->
            </form>
            <div class="buttons-inventory">
                <a href="?page=phieunhapkho"><button type="button">Đóng</button></a>
            </div>
        </form>
        
        </main>
<?php
    include_once '../inc/footer_phieunhapkho.php';
?>