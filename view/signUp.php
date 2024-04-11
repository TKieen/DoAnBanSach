<?php
    include_once "inc/header_signUp.php";
    extract($result);
?>
        <div class="container">
            <ul class="container-row">
                <div class="container-row1">
                    <li class="container-row1-items">
                        Trang chủ
                    </li>
                    <li class="container-row1-items">
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li class="container-row1-items">
                        Tạo tài khoản mới
                    </li>
                </div>
            </ul>
            <ul class="container-row">
                <div class="container-row2">
                    <li class="container-row1-items">
                        <h2>Chưa có tài khoản? Đăng ký ngay</h2>
                        <div class="container-row1-items-hr"></div>
                    </li>
                </div>
            </ul>
            <ul class="container-row">
                <div class="signIn-box">
                    <div class="signIn-box-row1">
                        ĐĂNG KÝ TÀI KHOẢN
                    </div>
                    <div class="signIn-box-row3">
                        <div class="signIn-box-row3-form">
                            <form action="?page=signUp" method="POST">
                                <div class="signIn-box-row3-form-items">
                                    <strong>Họ và tên<span style="color: #D64830">*</span></strong><input type="text" name="fullname" id="tt" required>
                                </div>
                                <div class="signIn-box-row3-form-items">
                                    <strong>Email<span style="color: #D64830">*</span></strong><input type="email" name="email" id="tt" required>
                                </div>
                                <div class="signIn-box-row3-form-items">
                                    <strong>Mật khẩu<span style="color: #D64830">*</span></strong><input type="password" name="password" id="tt" required>
                                </div>
                                <div class="signIn-box-row3-form-items">
                                    <strong>Xác nhận mật khẩu<span style="color: #D64830">*</span></strong><input type="password" name="r_password" id="tt" required>
                                </div>
                                <div class="signIn-box-row3-form-items">
                                    <strong>Điện thoại</strong><input type="text" name="phone" id="" pattern="[0]+[0-9]{9}" required title="Nhập số điện thoại có 10 chữ số bắt đầu từ số 0">
                                </div>
                                <div class="signIn-box-row3-form-errorMssg" style="display:none" id="empty">
                                    Vui lòng không để trống các thông tin bắt buộc.
                                </div>
                                <div class="signIn-box-row3-right-button"> <button type="submit" name="sign_up">ĐĂNG KÝ</button></div>
                            </form>
                        </div>
                    </div>
                    <div class="signIn-box-row5">
                        Đã có tài khoản? <a style="text-decoration: none; color: #0066C0" href="?page=signIn">Đăng nhập ngay</a>
                    </div>
                </div>
            </ul>
        </div>

<?php
    include_once "inc/footer.php";
?>