<!--Start: Add Customer-->
<div class="formPopup" id="add-modal-discount">
    <form id="add-form-discount" method="post" enctype="multipart/form-data" method="post">
        <button type="button" class="close-btn close-btn-discount"><i class="fa-solid fa-x"></i></button>
        <div class="expand">
            <h1>Thêm mã giảm giá</h1>
            <hr>
            <div class="field">
                <label for="phantram" class="attribute">Phần trăm giảm: </label>
                <input type="text" name="phantram">
            </div>
            <div class="field">
                <label for="batdau" class="attribute">Ngày bắt đầu: </label>
                <input type="date" name="ngaybatdau">
            </div>
            <div class="field">
                <label for="ketthuc" class="attribute">Ngày kết thúc: </label>
                <input type="date" name="ngayketthuc">
            </div>
            <hr>
            <div class="alert"></div>
            <div class="buttons">
                <input type="hidden" name="add_data_discount" value="submit">
                <button type="submit" name="btnadd">Thêm</button>
            </div>
        </div>
    </form>
</div>
<!--End: Add User-->