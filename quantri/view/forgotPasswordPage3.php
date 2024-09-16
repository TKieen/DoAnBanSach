<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--đổi title khi nhấn registerLink-->
    <title class="title">Quên mật khẩu</title>
    <link rel="stylesheet" href="asset/css/style_LoginAdmin.css">
</head>
<style>
    .container-form-row1 h3{
        margin-bottom: 5px;
        text-align: center;
    }
</style>
<body>
    <img src="asset/img/logo.png" alt="vinabook">
    <div class="wrapper">
        <form class=" form-box login" id="forgotPwd3-form" method="POST" enctype="multipart/form-data">
            <div class="container-form-row1">
                <h3>Khôi Phục Lại Mật Khẩu</h3>
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
                <button type="submit" name="submit_password">Khôi Phục Mật Khẩu</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="asset/js/script_signIn.js"></script>
</body>
</html>