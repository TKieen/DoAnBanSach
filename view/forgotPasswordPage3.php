<?php
    include_once "inc/header_forgotPasswordPage2.php";
?> 
        <div class="container">
            <form class="container-form" id="forgotPwd3-form" method="POST">
                <div class="container-form-row1">
                    <strong>Khôi Phục Lại Mật Khẩu</strong>
                </div>
                <div class="container-form-row2-newPassword">
                    <span>Nhập mật khẩu mới</span>
                    <div class="container-form-row2-newPassword-ds">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="password" required>
                    </div>
                </div>
                <div class="container-form-row3-confirmPassword">
                    <span>Nhập lại mật khẩu mới</span>
                    <div class="container-form-row3-confirmPassword-ds">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="r_password" required>
                    </div>
                </div>
                <div class="alert"></div>
                <div class="container-form-row4">
                    <input type="hidden" name="forgot-pwd-3">
                    <input type="submit" name="submit_password" id="" value="Khôi Phục Mật Khẩu">
                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="asset/js/signIn.js"></script>   
<?php
    include_once "inc/footer.php";
?>