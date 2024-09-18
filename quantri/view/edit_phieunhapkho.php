<?php
    include_once '../inc/header_phieunhapkho.php';
    extract($phieunhap);
?>
        <main class="content">
            <h1>Phiếu nhập kho </h1>
            <form class="inventory" id="inventory_form" method="post">
                <input type="hidden" name="idPN" value="<?=$idPN?>">
            <div class="general">
                <div class="item">
                    <div class="field">
                        <label for="">Trạng thái:</label>
                        <div class="info">Chưa hoàn thành</div>
                    </div>
                    <div class="field">
                        <label for="">Nhà cung cấp:</label>
                        <div class="info">
                            <?=$tenNCC?>
                        </div>
                    </div>
                    <div class="field">
                        <label for="">Nhân viên:</label>
                        <div class="info idNV">
                            <?=$idNV?>
                        </div>
                        <input type="hidden" name="idNV" value="<?=$_SESSION['admin']['id']?>">
                    </div>
                </div>
                <div class="item">
                    <div class="field">
                        <label for="">Ngày lập phiếu:</label>
                        <div class="info">
                            <?=$ngaytao?>
                        </div>
                    </div>
                    <!--note-->
                    <div class="field">
                        <label for="">Ngày cập nhật:</label>
                        <div class="info ngaycapnhat">
                            <?=$ngaycapnhat?>
                        </div>
                    </div>
                    <div class="field">
                        <label for="">Chiết khấu:</label>
                        <div class="info">
                            <input type="hidden" name="chietkhau" value="<?=$chietkhau?>" id="chietkhau">
                            <?=$chietkhau?>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="field">
                        <label for="">Tổng SL:</label>
                        <div class="info tongsoluong"><?=$tongsoluong?></div>
                    </div>
                    <div class="field">
                        <label for="">Tổng tiền:</label>
                        <div class="info tongtien"><?=number_format($tongtien,0,"",".");$tongtien?>đ</div>
                    </div>
                </div>
                <!--note-->
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
                            $gianhap = ((100-$chietkhau)/100)*$giabia;
                            $giabia = number_format($giabia,0,"",".");
                            $thanhtien = number_format($thanhtien,0,"",".");
                    ?>
                    <tr>
                        <!-- tim kiem ten sach va sach duoc cung cap boi nha cung cap -->
                        <!-- ko cho thay doi san pham -->
                        <td class="srch-product">
                            <input type="hidden" name="product[]" value="<?=$idSach?>">
                            <?php
                                echo "#".$idSach." - ".$tuasach;
                            ?>
                        </td>
                        <td class="quantity">
                            <input type="number" name="soluong[]" value="<?=$soluong?>">
                        </td>
                        <!--gia nhap, gia bia phai duoc them luc tao san pham-->
                        <!--gererate auto-->
                        <td>
                            <input type="hidden" name="gianhap[]" value="<?=$gianhap?>">
                                <div class="gianhap"><?php echo number_format($gianhap,0,"","."); ?>đ</div>
                        </td>
                        <td>
                            <div class="giabia"><?=$giabia?>đ</div>
                        </td>
                        <td>
                            <div class="thanhtien"><?=$thanhtien?>đ</div>
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
                <a><button type="button" name="update_btn">Cập nhật</button></a>
                <a><button type="button" name="complete_btn">Hoàn thành</button></a>
                <a><button type="button" name="cancel_btn">Hủy phiếu nhập</button></a>
            </div>
        </form>
        </main>
<?php
    include_once '../inc/footer_phieunhapkho.php';
?>