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
<body>
    <img src="../asset/img/logo.png" alt="vinabook">
    <div class="wrapper">
        <div class=" form-box login">
            <h1>Quên mật khẩu?</h1>
            <h3>Nhập vào email của bạn để reset mật khẩu:</h3>
            <form action="?page=forgotPassword" method="POST">
                <input type="email" name="email" placeholder="Email" required> 
                <div class="alert">Thông báo</div>
                <button type="submit" name="submit">ĐĂNG NHẬP</button>
            </form>
        </div>
    </div>
</body>
</html>