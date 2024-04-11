<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--đổi title khi nhấn registerLink-->
    <title class="title">Đăng nhập</title>
    <link rel="stylesheet" href="asset/css/style_LoginAdmin.css">
</head>
<body>
    <img src="../asset/img/logo.png" alt="vinabook">
    <div class="wrapper">
        <div class=" form-box login">
            <h1>Đăng nhập</h1>
            <form action="?page=signIn" method="POST">
                <input type="email" name="email" placeholder="Email" required> 
                <input type="password" name="password" placeholder="Mật khẩu" required>
                <div class="alert">Thông báo</div>
                <button type="submit" name="sign_in">ĐĂNG NHẬP</button>
                <div>Bạn đã <a href="?page=forgotPassword">quên mật khẩu</a> ?</div>
            </form>
        </div>
    </div>
</body>
</html>