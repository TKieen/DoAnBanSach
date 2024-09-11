<!--Start: Edit User-->
<div class="formPopup" id="edit-modal-product">
    <form action="#" method="post" id="edit-form-product" enctype="multipart/form-data">
        <button type="button" class="close-btn close-btn-product"><i class="fa-solid fa-x"></i></button>
        <div class="change_img">
            <input type="hidden" name="curr_img">
            <img src="#" alt="productImage" id="update_pic">
            <label for="update_file" class="change_button">Thay đổi</label>
            <input type="file" id="update_file" name="input_file" accept="image/*">
        </div>
        <div class="info">
            <h1>Sửa sản phẩm</h1>
            <hr>
            <input type="hidden" name="product_id">
            <div class="field">
                <label for="tuasach">Tựa sách</label>
                <input type="text" name="tuasach">
            </div>
            <div class="field">
                <label for="nxb">Nhà xuất bản</label>
                <input type="text" name="nxb">
            </div>
            <div class="field">
                <label for="idNCC">Nhà cung cấp</label>
                <select name="idNCC" disabled>
                    <?php
                        $supplier = getAllSupplier();
                        foreach($supplier as $item){
                            extract($item);
                    ?>
                        <option value="<?=$idNCC?>"><?=$tenNCC?></option>
                    <?php
                        }
                    ?>
                </select>
             </div>
             <div class="field">
                <label for="giabia">Giá bìa</label>
                <input type="text" name="giabia">
            </div>
            <div class="field">
                <label for="tacgia">Tác giả</label>
                <input type="text" name="tacgia">
            </div>
            <div class="field">
                <label for="namxuatban">Năm xuất bản</label>
                <input type="text" name="namxb">
            </div>
            <div class="field">
                <label for="giaban">Giá bán</label>
                <input type="text" name="giaban" disabled>
            </div>
            <div class="field">
                <label for="idTL">Thể loại</label>
                <select name="idTL">
                    <?php
                        $category = getAllCategoryActive();
                        foreach($category as $item){
                            extract($item);
                    ?>
                        <option value="<?=$idTL?>"><?=$tenTL?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="field">
                <label for="idMGG">Mã giảm giá</label>
                <select name="idMGG">
                </select>
            </div>
            <div class="status">
                <label for="trangthai">Trạng thái: </label>
                <div>
                    <label for="trangthai">Hoạt động</label>
                    <input type="radio" name="trangthai" value="1">
                </div>
                <div>
                    <label for="trangthai">Bị khóa</label>
                    <input type="radio" name="trangthai" value="0">
                </div>
            </div>
            <div class="field">
                <label for="mota">Mô tả</label>
                <textarea name="mota" cols="50" rows="5"></textarea>
            </div>
            <hr>
            <div class="alert"></div>
            <div class="buttons">
                <input type="hidden" name="update_data_product" value="submit">
                <button type="submit" name="update">Lưu</button>
            </div>
        </div>
    </form>
</div>
<!--End: Edit User-->