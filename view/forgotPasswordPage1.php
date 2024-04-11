<?php
    include_once "inc/header_forgotPasswordPage1.php";
    extract($result);
?>   
        <div class="container">
            <form class="container-form" action="?page=forgotPassword1" method="POST">
                <div class="container-form-row1">
                    <i class="fa-solid fa-circle-exclamation"></i>
                </div>
                <div class="container-form-row2">
                    <strong>Quên Mật Khẩu</strong>
                </div>
                <div class="container-form-row3">
                    <p>Vui lòng nhập vào địa chỉ email của bạn, chúng tôi sẽ gửi mã xác nhận nhằm giúp bạn khôi phục mật khẩu.</p>
                </div>
                <div class="container-form-row4">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="text" placeholder="Nhập vào email của bạn..." name="email">
                </div>
                <div class="container-form-row6">
                    <input type="submit" name="submit" id="" value="Gửi Mã Xác Nhận">
                </div>
            </form>
        </div>
    <?php
        include_once "inc/footer.php";
    ?>