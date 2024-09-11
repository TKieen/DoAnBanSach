<div class="formPopup" id="edit-modal-user">
    <form action="#" method="post" id="edit-form-user" enctype="multipart/form-data">
        <button type="button" class="close-btn close-btn-user"><i class="fa-solid fa-x"></i></button>
        <div class="expand">
            <h1>Sửa người dùng</h1>
            <hr>
            <input type="hidden" name="user_id">
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
                <label for="phanquyen"class="attribute">Phân quyền</label>
                <select name="phanquyen">
                    <option value="-1">---Chọn ---</option>
                    <option value="DN">Chủ doanh nghiệp</option>
                    <option value="AD">Admin</option>
                    <option value="TK">Thủ kho</option>
                    <option value="KH">Khách hàng</option>
                    <option value="BH">Người bán hàng</option>
                </select>
            </div>
            <div class="status">
                <label for="trangthai" class="attribute">Trạng thái: </label>
                <div>
                    <label for="trangthai">Hoạt động</label>
                    <input type="radio" name="trangthai" value="1">
                </div>
                <div>
                    <label for="trangthai">Bị ẩn</label>
                    <input type="radio" name="trangthai" value="0">
                </div>
            </div>
            <hr>
            <div class="alert"></div>
            <div class="buttons">
                <input type="hidden" name="update_data_user" value="submit">
                <button type="submit" name="update">Lưu</button>
            </div>
        </div>
    </form>
</div>