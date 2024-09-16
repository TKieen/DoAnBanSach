<?php
    include_once "inc/header_forgotPasswordPage1.php";
?>   
        <div class="container">
            <form class="container-form" id="forgotPwd1-form" method="POST" enctype="multipart/form-data">
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
                    <input type="text" placeholder="Nhập vào email của bạn..." name="email" required>
                </div>
                <div class="alert"></div>
                <div class="container-form-row6">
                    <input type="hidden" name="forgot-pwd-1">
                    <input type="submit" name="forgot-pwd-1" id="" value="Gửi Mã Xác Nhận">
                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="asset/js/signIn.js"></script>   
    <?php
        include_once "inc/footer.php";
    ?>