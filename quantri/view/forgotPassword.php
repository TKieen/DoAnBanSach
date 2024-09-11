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
    .form-box h3 {
        text-align: center;
    }
</style>
<body>
    <img src="asset/img/logo.png" alt="vinabook">
    <div class="wrapper">
        <div class=" form-box login">
            <h1>Quên mật khẩu?</h1>
            <h3>Nhập vào email của bạn:</h3>
            <form action="?page=forgotPassword" method="POST">
                <input type="email" name="email" placeholder="Email" required> 
                <button type="submit" name="submit">XÁC NHẬN</button>
            </form>
        </div>
    </div>
</body>
</html>