<?php
    include_once "inc/header_signIn.php";
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
                        Đăng nhập
                    </li>
                </div>
            </ul>
            <ul class="container-row">
                <div class="container-row2">
                    <li class="container-row1-items">
                        <h2>Đăng nhập vào tài khoản</h2>
                        <div class="container-row1-items-hr"></div>
                    </li>
                </div>
            </ul>
            <ul class="container-row">
                <div class="signIn-box">
                    <div class="signIn-box-row1">
                        Đăng nhập
                    </div>
                    <div class="signIn-box-row2">
                    </div>
                    <div class="signIn-box-row3">
                        <div class="signIn-box-row3-form">
                            <form id="signIn-form" method="POST"  enctype="multipart/form-data">
                                <div class="signIn-box-row3-form-items">
                                    <strong>Email<span style="color: #D64830">*</span></strong><input type="text" name="email" id="email" required>
                                </div>
                                <div class="signIn-box-row3-form-items">
                                    <strong>Mật khẩu<span style="color: #D64830">*</span></strong><input type="password" name="password" id="password" required>
                                </div>
                                <div class="alert"></div>
                                <div class="signIn-box-row3-form-forgotPassword">
                                    <i>Bạn đã <a href="?page=forgotPassword1">quên mật khẩu?</a></i>
                                </div>
                                <div class="signIn-box-row3-right-button"> 
                                    <input type="hidden" name="sign_in">
                                    <button type="submit" name="sign_in" id="btn-signin"> ĐĂNG NHẬP</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="signIn-box-row5">
                        Chưa có tài khoản? <a style="text-decoration: none; color: #0066C0" href="?page=signUp">Đăng ký ngay</a>
                    </div>
                </div>
            </ul>
        </div>
    <!-- <script>
        function validate_FormSignin() {
            let x = document.getElementById('email').value;
            if (x === '') {
                document.getElementById('empty').style.display = 'block';
                return false;
            } else {
                document.getElementById('empty').style.display = 'none';
            }
        }
    </script> -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="asset/js/signIn.js"></script>
    <?php
        include_once "inc/footer.php";
    ?>