<!--Start: Order Detail-->
<div class="formPopup" id="view-modal-order">
    <form action="#" method="post" id="view-form-order" class="updateOrderFrm">
        <button type="button" class="close-btn close-btn-order"><i class="fa-solid fa-x"></i></button>
        <h1>Chi tiết đơn hàng</h1>
        <hr>
        <table class="ctdonhang">
        </table>
        <hr>
        <div class="order_info">
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
                    <select name="trangthai" disabled>
                        <option value="cho">Chờ duyệt</option>
                        <option value="vc">Đang vận chuyển</option>
                        <option value="ht">Hoàn tất</option>
                        <option value="huykh">Hủy bởi khách hàng</option>
                        <option value="huynv">Hủy bởi người bán</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
</div>
<!--End: Order Detail-->
