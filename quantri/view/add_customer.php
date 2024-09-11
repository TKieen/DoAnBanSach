<!--Start: Add Customer-->
<div class="formPopup" id="add-modal-customer">
    <form id="add-form-customer" method="post" enctype="multipart/form-data" method="post">
        <button type="button" class="close-btn close-btn-customer"><i class="fa-solid fa-x"></i></button>
        <div class="expand">
            <h1>Thêm khách hàng</h1>
            <hr>
            <div class="field">
                <label for="ten" class="attribute">Họ và tên</label>
                <input type="text" name="ten">
            </div>
            <div class="field">
                <label for="email" class="attribute">Email</label>
                <input type="text" name="email">
            </div>
            <div class="field">
                <label for="matkhau" class="attribute">Mật khẩu</label>
                <input type="password" name="matkhau">
            </div>
            <div class="field">
                <label for="dienthoai" class="attribute">Điện thoại</label>
                <input type="text" name="dienthoai">
            </div>
            <hr>
            <div class="alert"></div>
            <div class="buttons">
                <input type="hidden" name="add_data_customer" value="submit">
                <button type="submit" name="btnadd">Thêm</button>
            </div>
        </div>
    </form>
</div>
<!--End: Add User-->