<?php
    include_once '../inc/header_editInfo.php';
    //extract($result); 
    $user_info = getUserByID($_SESSION['admin']['id']);
?>
<div class="container">
    <div class=" form-box">
        <h1>Sửa thông tin</h1>
        <form id="change-info-form" method="POST">
            <div>
                <input type="hidden" name="tenTK-org" value="<?=$user_info['tenTK']?>">
                <input type="text" name="tenTK" placeholder="<?php echo $user_info['tenTK'];?>">
            </div>
            <div>
                <input type="hidden" name="email-org" value="<?=$user_info['email']?>">
                <input type="email" name="email" placeholder="<?php echo $user_info['email'];?>">
            </div>
            <div>
                <input type="hidden" name="phone-org" value="<?=$user_info['dienthoai']?>">
                <input type="text" type="text" name="phone" placeholder="<?php echo $user_info['dienthoai'];?>" pattern="[0]+[0-9]{9}" title="Nhập số điện thoại có 10 chữ số bắt đầu từ số 0">
            </div>
            <div>
                <input type="hidden" name="submit_info">
                <button type="submit" name="submit_info">Lưu thông tin</button>
            </div>
        </form>
        <form id="change-pwd-form" method="POST">
            <div><input type="password" name="c_password" placeholder="Nhập mật khẩu hiện tại" required></div>
            <div><input type="password" name="n_password" placeholder="Nhập mật khẩu mới" required></div>
            <div><input type="password" name="r_n_password" placeholder="Xác nhận mật khẩu mới" required></div>
            <div>
                <input type="hidden" name="submit_password">
                <button type="submit" name="submit_password">Lưu mật khẩu</button>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="../asset/js/customer.js"></script> 
<?php
    include_once '../inc/footer_supplier.php';
?>
