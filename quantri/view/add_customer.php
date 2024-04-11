<!--Start: Add Customer-->
<div class="formPopup" id="add-modal">
    <form id="add-form" method="post" enctype="multipart/form-data" method="post">
        <button type="button" class="close-btn"><i class="fa-solid fa-x"></i></button>
        <div class="change_img">
            <img src="../uploads/uploads_user/person.png" alt="userAvatar" id="add_pic">
            <label for="add_file" class="change_button">Thêm</label>
            <input type="file" id="add_file" name="input_file" accept="image/*">
        </div>
        <div class="info">
            <h1>Thêm khách hàng</h1>
            <div class="cols">
                <div class="left">
                    <div class="field">
                        <label for="ten">Họ và tên</label>
                        <input type="text" name="ten">
                    </div>
                    <div class="field">
                        <label for="email">Email</label>
                        <input type="text" name="email">
                    </div>
                    <div class="field">
                        <label for="matkhau">Mật khẩu</label>
                        <input type="password" name="matkhau">
                    </div>
                </div>
                <div class="right">
                    <div class="field">
                        <label for="dienthoai">Điện thoại</label>
                        <input type="text" name="dienthoai">
                    </div>
                    <div class="field">
                        <label for="diachi">Địa chỉ</label>
                        <input type="text" name="diachi">
                    </div>
                </div>
            </div>
            <div class="alert"></div>
            <div class="buttons">
                <input type="hidden" name="add_data" value="submit">
                <button type="submit" name="btnadd">Thêm</button>
            </div>
        </div>
    </form>
</div>
<!--End: Add User-->