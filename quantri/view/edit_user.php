<div class="formPopup" id="edit-modal">
    <form action="#" method="post" id="edit-form" enctype="multipart/form-data">
        <button type="button" class="close-btn"><i class="fa-solid fa-x"></i></button>
        <div class="change_img">
            <input type="hidden" name="curr_img">
            <img src="#" alt="userAvatar" id="update_pic">
            <label for="update_file" class="change_button">Thay đổi</label>
            <input type="file" id="update_file" name="input_file" accept="image/*">
        </div>
        <div class="info">
            <h1>Sửa người dùng</h1>
            <div class="cols">
                <div class="left">
                <input type="hidden" name="id">
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
                            <option value="3">Quản lí kho</option>
                            <option value="4">Khách hàng</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="status">
                <div>
                    <label for="trangthai">Hoạt động</label>
                    <input type="radio" name="trangthai" value="1" disabled>
                </div>
                <div>
                    <label for="trangthai">Bị ẩn</label>
                    <input type="radio" name="trangthai" value="0" disabled>
                </div>
            </div>
            <div class="alert"></div>
            <div class="buttons">
                <input type="hidden" name="update_data" value="submit">
                <button type="submit" name="update">Lưu</button>
            </div>
        </div>
    </form>
</div>