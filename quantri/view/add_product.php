<!--Start: Add Product-->
<div class="formPopup" id="add-modal-product">
    <form id="add-form-product" method="post" enctype="multipart/form-data" method="post">
        <button type="button" class="close-btn close-btn-product"><i class="fa-solid fa-x"></i></button>
        <div class="change_img">
            <img src="../../uploads/uploads_product/product.png" alt="productImage" id="add_pic">
            <label for="add_file" class="change_button">Thêm</label>
            <input type="file" id="add_file" name="input_file" accept="image/*">
        </div>
        <div class="info">
            <h1>Thêm sản phẩm</h1>
            <hr>
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
                <input type="hidden" name="idNCC_hidden">
                <select name="idNCC">
                    <option value="-1">---Chọn---</option>
                    <?php
                        $supplier = getAllSupplierActive();
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
                <label for="idTL">Thể loại</label>
                <select name="idTL">
                    <option value="-1">---Chọn---</option>
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
                <label for="mota">Mô tả</label>
                <textarea name="mota" cols="50" rows="5"></textarea>
            </div>
            <hr>
            <div class="alert"></div>
            <div class="buttons">
                <input type="hidden" name="add_data_product" value="submit">
                <button type="submit" name="btnadd">Thêm</button>
            </div>
        </div>
    </form>
</div>
<!--End: Add Product-->