<!--Start: Add User-->
<div class="formPopup" id="add-modal-user">
    <form id="add-form-user" method="post" enctype="multipart/form-data">
        <button type="button" class="close-btn close-btn-user"><i class="fa-solid fa-x"></i></button>
        <div class="expand">
            <h1>Thêm người dùng</h1>
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
            <div class="field">
                <label for="phanquyen" class="attribute">Phân quyền</label>
                <select name="phanquyen">
                    <option value="-1">---Chọn ---</option>
                    <option value="DN">Chủ doanh nghiệp</option>
                    <option value="AD">Admin</option>
                    <option value="TK">Thủ kho</option>
                    <option value="KH">Khách hàng</option>
                    <option value="BH">Người bán hàng</option>
                </select>
            </div>
            <hr>
            <div class="alert"></div>
            <div class="buttons">
                <input type="hidden" name="add_data_user" value="submit">
                <button type="submit">Thêm</button>
            </div>
        </div>
    </form>
</div>
<!--End: Add User-->