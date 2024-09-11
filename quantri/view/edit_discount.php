<!--Start: Edit User-->
<div class="formPopup" id="edit-modal-discount">
    <form action="#" method="post" id="edit-form-discount" enctype="multipart/form-data">
        <button type="button" class=" close-btn close-btn-discount"><i class="fa-solid fa-x"></i></button>
        <div class="expand">
            <h1>Sửa mã giảm giá</h1>
            <hr>
            <input type="hidden" name="discount_id">
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
                <input type="hidden" name="update_data_discount" value="submit">
                <button type="submit" name="update">Lưu</button>
            </div>
        </div>
    </form>
</div>
<!--End: Edit User-->