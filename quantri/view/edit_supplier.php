<!--Start: Edit User-->
<div class="formPopup" id="edit-modal-supplier">
    <form action="#" method="post" id="edit-form-supplier" enctype="multipart/form-data">
        <button type="button" class="close-btn close-btn-supplier"><i class="fa-solid fa-x"></i></button>
        <div class="expand">
            <h1>Sửa nhà cung cấp</h1>
            <hr>
            <input type="hidden" name="supplier_id">
            <div class="field">
                <label for="ten" class="attribute">Họ và tên</label>
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
            <div class="status">
                <label for="trangthai" class="attribute">Trạng thái: </label>
                <div>
                    <label for="trangthai">Hoạt động</label>
                    <input type="radio" name="trangthai" value="1">
                </div>
                <div>
                    <label for="trangthai">Bị khóa</label>
                    <input type="radio" name="trangthai" value="0">
                </div>
            </div>
            <hr>
            <div class="alert"></div>
            <div class="buttons">
                <input type="hidden" name="update_data_supplier" value="submit">
                <button type="submit" name="update">Lưu</button>
            </div>
        </div>
    </form>
</div>
<!--End: Edit User-->