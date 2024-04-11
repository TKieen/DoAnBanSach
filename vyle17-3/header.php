<?php
include_once 'connect.php';
include_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test.css">
    <script src="https://kit.fontawesome.com/1acf2d22a5.js" crossorigin="anonymous"></script>
    <title>Admin</title>
</head>
<body>
    <header>
        <img src="logo.png" alt="" class="logo">
        <ul>
            <!--thong bao-->
            <li class="notification">
                <i class="fa-regular fa-bell"></i>
                <!--dung de number-->
                <div class="num"></div>
                <div class="sub-menu-wrap">
                    <div class="sub-menu">
                        <!--notice message-->
                        <!--js generate automatically-->
                        <div>
                            <img src="duck.jpg" alt="">
                            <p>Sản phẩm #1 đã hết hàng</p>
                        </div>
                    </div>
                </div>
            </li>
            <li><a href="#" class="account"><img src="duck.jpg" alt=""><span>Lê Ngọc Thảo Vy</span></a></li>
            <li>| <a href="">Đăng xuất</a></li>
        </ul>
    </header>