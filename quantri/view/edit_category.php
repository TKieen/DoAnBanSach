<!--Start: Edit Category-->
<div class="formPopup" id="edit-modal-category">
    <form action="#" method="post" id="edit-form-category" enctype="multipart/form-data">
        <button type="button" class="close-btn close-btn-category"><i class="fa-solid fa-x"></i></button>
        <div class="expand">
            <h1>Sửa thể loại</h1>
            <hr>
            <input type="hidden" name="category_id">
            <div class="field">
                <label for="ten" class="attribute">Thể loại</label>
                <input type="text" name="tenTL">
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
                <input type="hidden" name="update_data_category" value="submit">
                <button type="submit" name="update">Lưu</button>
            </div>
        </div>
    </form>
</div>
<!--End: Edit Category-->