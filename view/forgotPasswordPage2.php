<?php
    include_once "inc/header_forgotPasswordPage1.php";
    extract($result);
?>
        <div class="container">
            <form class="container-form" action="?page=forgotPassword2" method="POST">
                <div class="container-form-row1">
                    <i class="fa-solid fa-circle-exclamation"></i>
                </div>
                <div class="container-form-row2">
                    <strong>Quên Mật Khẩu</strong>
                </div>
                <div class="container-form-row3">
                    <p>Vui lòng nhập vào mã xác thực đã được gửi qua email của bạn.</p>
                </div>
                <div class="container-form-row4">
                    <input type="text" name="maxacnhan" placeholder="Nhập vào mã xác thực...">
                </div>
                <div class="container-form-row6">
                    <input type="submit" name="submit_verify" id="" value="Xác Nhận">
                </div>
            </form>
        </div>
<?php
    include_once "inc/footer.php";
?>