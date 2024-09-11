<div class="formPopup" id="edit-modal-order">
    <form action="#" method="post" id="edit-form-order" class="updateOrderFrm">
        <button type="button" class="close-btn close-btn-order"><i class="fa-solid fa-x"></i></button>
        <h1>Cập nhật đơn hàng</h1>
        <hr>
        <table class="ctdonhang">
        </table>
        <hr>
        <div class="order_info">
        <input type="hidden" name="order_id">
            <div>
                <div class="field">
                    <label for="khachhang" class="attribute">Khách hàng</label>
                    <input type="text" name="khachhang" disabled>
                </div>
                <div class="field">
                    <label for="dienthoai" class="attribute">Điện thoại</label>
                    <input type="text" name="dienthoai" disabled>
                </div>
                <div class="field">
                    <label for="diachigiao" class="attribute">Địa chỉ giao</label>
                    <input type="text" name="diachigiao" disabled>
                </div>
                <div class="field">
                    <label for="ngaydat" class="attribute">Ngày tạo</label>
                    <input type="text" name="ngaytao" disabled>
                </div>
            </div>
            <div>
                <div class="field">
                    <label for="ngaydat" class="attribute">Ngày cập nhật</label>
                    <input type="text" name="ngaycapnhat" disabled>
                </div>
                <div class="field">
                    <label for="tongsanpham" class="attribute">Tổng sản phẩm</label>
                    <input type="text" name="tongsanpham" disabled>
                </div>
                <div class="field">
                    <label for="tongtien" class="attribute">Tổng tiền</label>
                    <input type="text" name="tongtien" disabled>
                </div>
                <div class="status">
                    <label for="trangthai" class="attribute">Trạng thái</label>
                    <select name="trangthai">
                    </select>
                </div>
            </div>
        </div>
        <hr>
        <div class="alert"></div>
        <div class="buttons">
            <input type="hidden" name="update_data_order" value="submit">
            <button type="submit" name="update">Lưu</button>
        </div>
    </form>
</div>
<!--End: Update Order Detail-->