<!--Start: Edit Category-->
<div class="formPopup" id="edit-modal">
    <form action="#" method="post" id="edit-form" enctype="multipart/form-data">
        <button type="button" class="close-btn"><i class="fa-solid fa-x"></i></button>
        <div class="expand">
            <h1>Sửa thể loại</h1>
            <input type="hidden" name="category_id">
            <label for="ten">Thể loại</label>
            <input type="text" name="tenTL">
            <div class="status">
                <div>
                    <label for="trangthai">Hoạt động</label>
                    <input type="radio" name="trangthai" value="1">
                </div>
                <div>
                    <label for="trangthai">Bị hủy</label>
                    <input type="radio" name="trangthai" value="0">
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
<!--End: Edit Category-->