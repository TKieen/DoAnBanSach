<?php
    include_once "inc/header_forgotPasswordPage2.php";
    extract($result);
?> 
        <div class="container">
            <form class="container-form" action="?page=forgotPassword3" method="POST">
                <div class="container-form-row1">
                    <strong>Khôi Phục Lại Mật Khẩu</strong>
                </div>
                <div class="container-form-row2-newPassword">
                    <span>Nhập mật khẩu mới</span>
                    <div class="container-form-row2-newPassword-ds">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="password" id="">
                    </div>
                </div>
                <div class="container-form-row3-confirmPassword">
                    <span>Nhập lại mật khẩu mới</span>
                    <div class="container-form-row3-confirmPassword-ds">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="r_password" id="">
                    </div>
                </div>
                <div class="container-form-row4">
                    <input type="submit" name="submit_password" id="" value="Khôi Phục Mật Khẩu">
                </div>
            </form>
        </div>
<?php
    include_once "inc/footer.php";
?>