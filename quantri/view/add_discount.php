<!--Start: Add Customer-->
<div class="formPopup" id="add-modal">
    <form id="add-form" method="post" enctype="multipart/form-data" method="post">
        <button type="button" class="close-btn"><i class="fa-solid fa-x"></i></button>
        <div class="info">
            <h1>Thêm mã giảm giá</h1>
            <div class="cols">
                <div class="left">
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
            <div class="alert"></div>
            <div class="buttons">
                <input type="hidden" name="add_data" value="submit">
                <button type="submit" name="btnadd">Thêm</button>
            </div>
        </div>
    </form>
</div>
<!--End: Add User-->