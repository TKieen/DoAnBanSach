<!--Start: Add phieunhapkho-->
<div class="formPopup" id="add-modal-phieunhapkho">
    <form id="add-form-phieunhapkho" method="post" enctype="multipart/form-data" method="post">
        <button type="button" class="close-btn close-btn-phieunhapkho"><i class="fa-solid fa-x"></i></button>
        <div class="expand">
            <h1>Tạo phiếu nhập</h1>
            <hr>
            <div class="field">
                <label for="idNCC" class="attribute">Nhà cung cấp</label>
                <select name="idNCC">
                    <option value="-1">Không có</option>
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
            <hr>
            <div class="buttons">
                <button type="submit" name="btnadd">Thêm</button>
            </div>
        </div>
    </form>
</div>
<!--End: Add phieunhapkho-->