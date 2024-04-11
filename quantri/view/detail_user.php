<div class="formPopup" id="view-modal">
    <form action="#" method="post" id="view-form">
        <button type="button" class="close-btn"><i class="fa-solid fa-x"></i></button>
        <div class="change_img">
            <img src="#" alt="userAvatar" id="view_pic">
        </div>
        <div class="info">
            <h1>Chi tiết người dùng</h1>
            <div class="cols">
                <div class="left">
                    <div class="field">
                        <label for="ten">Họ và tên</label>
                        <input type="text" name="ten" disabled>
                    </div>
                    <div class="field">
                        <label for="email">Email</label>
                        <input type="text" name="email" disabled>
                    </div>
                    <div class="field">
                        <label for="matkhau">Mật khẩu</label>
                        <input type="password" name="matkhau" disabled>
                    </div>
                </div>
                <div class="right">
                    <div class="field">
                        <label for="dienthoai">Điện thoại</label>
                        <input type="text" name="dienthoai" disabled>
                    </div>
                    <div class="field">
                        <label for="diachi">Địa chỉ</label>
                        <input type="text" name="diachi" disabled>
                    </div>
                    <div class="field">
                        <label for="phanquyen">Phân quyền</label>
                        <select name="phanquyen" disabled>
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
        </div>
    </form>
</div>