<!--Start: Add User-->
<div class="formPopup" id="add-modal-supplier">
    <form id="add-form-supplier" method="post" enctype="multipart/form-data" method="post">
        <button type="button" class="close-btn close-btn-supplier"><i class="fa-solid fa-x"></i></button>
        <div class="expand">
            <h1>Thêm nhà cung cấp</h1>
            <hr>
            <div class="field">
                <label for="ten" class="attribute">Nhà cung cấp</label>
                <input type="text" name="ten">
            </div>
            <div class="field">
                <label for="email" class="attribute">Email</label>
                <input type="text" name="email">
            </div>
            <div class="field">
                <label for="dienthoai" class="attribute">Điện thoại</label>
                <input type="text" name="dienthoai">
            </div>
            <div class="field">
                <label for="diachi" class="attribute">Địa chỉ</label>
                <input type="text" name="diachi">
            </div>
            <hr>
            <div class="alert"></div>
            <div class="buttons">
                <input type="hidden" name="add_data_supplier" value="submit">
                <button type="submit" name="btnadd">Thêm</button>
            </div>
        </div>
    </form>
</div>
<!--End: Add User-->