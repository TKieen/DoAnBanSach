<!--Start: Add User-->
<div class="formPopup" id="add-modal">
    <form id="add-form" method="post" enctype="multipart/form-data">
        <button type="button" class="close-btn"><i class="fa-solid fa-x"></i></button>
        <div class="change_img">
            <img src="../../uploads/uploads_user/person.png" alt="userAvatar" id="add_pic">
            <label for="add_file" class="change_button">Thêm</label>
            <input type="file" id="add_file" name="input_file" accept="image/*">
        </div>
        <div class="info">
            <h1>Thêm người dùng</h1>
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
                    <div class="field">
                        <label for="phanquyen">Phân quyền</label>
                        <select name="phanquyen">
                            <option value="-1">---Chọn ---</option>
                            <option value="1">Chủ doanh nghiệp</option>
                            <option value="2">Admin</option>
                            <option value="3">Thủ kho</option>
                            <option value="4">Khách hàng</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="alert"></div>
            <div class="buttons">
                <input type="hidden" name="add_data" value="submit">
                <button type="submit">Thêm</button>
            </div>
        </div>
    </form>
</div>
<!--End: Add User-->