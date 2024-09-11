<?php
    include_once '../inc/header_phieunhapkho.php';
    extract($supplier);
?>
        <main class="content">
            <h1>Phiếu nhập kho </h1>
            <form class="inventory" method="post">
            <div class="general">
                <div class="item">
                    <div class="field">
                        <label for="">Trạng thái:</label>
                        <div class="info">Chưa hoàn thành</div>
                    </div>
                    <div class="field">
                        <label for="">Nhà cung cấp:</label>
                        <div class="info">
                            <input type="hidden" name="idNCC" value="<?=$idNCC?>">
                            <?=$tenNCC?>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="field">
                        <label for="">Ngày lập phiếu:</label>
                        <div class="info">
                            <input type="hidden" name="ngaytao" value="<?=$ngaytao?>">
                            <?=$ngaytao?>
                        </div>
                    </div>
                    <div class="field">
                        <label for="">Ngày cập nhật:</label>
                        <div class="info">
                            <input type="hidden" name="ngaycapnhat" value="<?=$ngaytao?>">
                            <?=$ngaytao?>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="field">
                        <label for="">Tổng SL:</label>
                        <div class="info tongsoluong"></div>
                    </div>
                    <div class="field">
                        <label for="">Tổng tiền:</label>
                        <div class="info tongtien"></div>
                    </div>
                </div>
</div>
            <div class="inventory_detail">
                <!--create new product-->
                <div class="buttons-inventory controller">
                    <button type="button" class="add-new-row"><strong>Thêm 1 dòng</strong></button>
                    <button type="button" class="open_add_form_product_PN"><i class="fa-solid fa-plus"></i> <strong>Thêm sản phẩm</strong></button>
                </div>
                <!--alert (optional)-->

                <!--Start: Data table-->
                <table>
                    <thead class="title">
                        <th>Tên sách</th> <!--chỉ cho người dùng select, ko cho tự điền vào form-->
                        <th>SL</th>
                        <th>Đơn giá nhập</th>
                        <th>Đơn giá bìa</th>
                        <th>Thành tiền</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr class="template">
                            <!-- tim kiem ten sach va sach duoc cung cap boi nha cung cap -->
                            <td>
                                <select name="product[]">
                                    <option value="-1">---Chọn---</option>
                                    <?php
                                        $product = getAllProductBySupplierID($idNCC);
                                        foreach($product as $item){
                                            extract($item);
                                    ?>
                                        <option value="<?=$idSach?>" data-giabia="<?=$giabia?>" data-id="<?=$idSach?>"><?=$idSach?> - <?=$tuasach?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </td>
                            <td class="quantity">
                                <input type="number" name="soluong[]">
                            </td>
                            <!--gia nhap, gia bia phai duoc them luc tao san pham-->
                            <!--gererate auto-->
                            <td class="gianhap">
                                <input type="text" name="gianhap[]">
                            </td>
                            <td>
                                <div class="giabia"></div>
                            </td>
                            <td>
                                <div class="thanhtien"></div>
                            </td>
                            <td>
                                <a href="#" class="action-button open_view_form_product">
                                    <i class="fa-solid fa-circle-info"></i>
                                    <div class="action-tooltip">Chi tiết</div>
                                </a>
                                <a href="#" class="action-button delete_row">
                                    <i class="fa-solid fa-trash"></i>
                                    <div class="action-tooltip">xóa</div>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <!-- tim kiem ten sach va sach duoc cung cap boi nha cung cap -->
                            <td>
                                <select name="product[]">
                                    <option value="-1">---Chọn---</option>
                                    <?php
                                        $product = getAllProductBySupplierID($idNCC);
                                        foreach($product as $item){
                                            extract($item);
                                    ?>
                                        <option value="<?=$idSach?>" data-giabia="<?=$giabia?>" data-id="<?=$idSach?>"><?=$idSach?> - <?=$tuasach?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </td>
                            <td class="quantity">
                                <input type="number" name="soluong[]" >
                            </td>
                            <!--gia nhap, gia bia phai duoc them luc tao san pham-->
                            <!--gererate auto-->
                            <td class="gianhap">
                                <input type="number" name="gianhap[]">
                            </td>
                            <td>
                                <div class="giabia"></div>
                            </td>
                            <td>
                                <div class="thanhtien"></div>
                            </td>
                            <td>
                                <a href="#" class="action-button open_view_form_product">
                                    <i class="fa-solid fa-circle-info"></i>
                                    <div class="action-tooltip">Chi tiết</div>
                                </a>
                                <a href="#" class="action-button delete_row">
                                    <i class="fa-solid fa-trash"></i>
                                    <div class="action-tooltip">xóa</div>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!--End: Data table-->
                <div class="buttons-inventory">
                    <input type="hidden" name="add_inventory_form_btn" value="submit">
                    <a><button type="submit" class="add_inventory_form_btn">Lưu</button></a>
                    <a href="?page=phieunhapkho"><button type="button">Đóng</button></a>
                </div>
            </div>
        </form>

        <?php
            require 'add_product.php'; // add_supplier popup form
            require 'detail_product.php'; // add_supplier popup form
        ?>
        </main>
<?php
    include_once '../inc/footer_phieunhapkho.php';
?>