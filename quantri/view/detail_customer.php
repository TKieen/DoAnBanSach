<!--Start: User Detail-->
<div class="formPopup" id="view-modal-customer">
    <form action="#" method="post" id="view-form-customer">
        <button type="button" class="close-btn close-btn-customer"><i class="fa-solid fa-x"></i></button>
        <div class="expand">
            <h1>Chi tiết khách hàng</h1>
            <hr>
            <div class="field">
                <label for="ten" class="attribute">Họ và tên</label>
                <input type="text" name="ten" disabled>
            </div>
            <div class="field">
                <label for="email" class="attribute">Email</label>
                <input type="text" name="email" disabled>
            </div>
            <div class="field">
                <label for="dienthoai" class="attribute">Điện thoại</label>
                <input type="text" name="dienthoai" disabled>
            </div>
            <div class="status">
                <label for="trangthai" class="attribute">Trạng thái: </label>
                <div>
                    <label for="trangthai" >Hoạt động</label>
                    <input type="radio" name="trangthai" value="1" disabled>
                </div>
                <div>
                    <label for="trangthai" >Bị ẩn</label>
                    <input type="radio" name="trangthai" value="0" disabled>
                </div>
            </div>
        </div>
    </form>
</div>
<!--End: User Detail-->