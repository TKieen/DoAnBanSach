<!--Start: Edit User-->
<div class="formPopup" id="edit-modal">
    <form action="#" method="post" id="edit-form" enctype="multipart/form-data">
        <button type="button" class="close-btn"><i class="fa-solid fa-x"></i></button>
        <div class="info">
            <h1>Sửa mã giảm giá</h1>
            <div class="cols">
                <div class="left">
                <input type="hidden" name="discount_id">
                    <div class="field">
                        <label for="phantram">Phần trăm khuyến mãi</label>
                        <input type="text" name="phantram">
                    </div>
                    <div class="field">
                        <label for="batdau">Ngày bắt đầu</label>
                        <input type="date" name="ngaybatdau">
                    </div>
                </div>
                <div class="right">
                    <div class="field">
                        <label for="ketthuc">Ngày kết thúc</label>
                        <input type="date" name="ngayketthuc">
                    </div>
                </div>
            </div>
            <div class="status">
                <div>
                    <label for="trangthai">Hoạt động</label>
                    <input type="radio" name="trangthai" value="1">
                </div>
                <div>
                    <label for="trangthai">Hết hạn</label>
                    <input type="radio" name="trangthai" value="0">
                </div>
                <div>
                    <label for="trangthai">Bị hủy</label>
                    <input type="radio" name="trangthai" value="-1">
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
<!--End: Edit User-->