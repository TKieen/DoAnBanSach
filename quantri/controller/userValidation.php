<?php
$nameRegex = '/^[\p{L} ]+$/u';
$phoneRegex = '/^0[0-9]{9}$/';
$emailRegex = '/^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/';
$passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*!])[A-Za-z\d@#$%^&*!]{8,}$/';
$phoneRegex = '/^0[0-9]{9}$/';

function validateName($name) {
    global $nameRegex;
    if (empty($name)) {
        throw new Exception("Tên không được để trống!");

    }
    if (strlen($name) < 3) {
        throw new Exception('Vui lòng nhập họ tên nhiều hơn 3 ký tự!');
    }
    if (!preg_match($nameRegex, $name)) {
        throw new Exception("Tên không hợp lệ. Vui lòng chỉ sử dụng chữ cái!");
    }
}

function validateEmail($email) {
    global $emailRegex;
    if (empty($email)) {
        throw new Exception("Vui lòng nhập email!");
    }
    if (!preg_match($emailRegex, $email)) {
        throw new Exception("Email không hợp lệ. Vui lòng kiểm tra lại!");
    }
}

function validatePassword($password, $rePassword = '') {
    global $passwordRegex;
    if (empty($password)) {
        throw new Exception("Vui lòng nhập mật khẩu!");
    }
    if (!preg_match($passwordRegex, $password)) {
        throw new Exception("Mật khẩu chưa đủ mạnh!");
    }
    if (!empty($rePassword) && !hash_equals($rePassword, $password)) {
        throw new Exception('Xác nhận mật khẩu và mật khẩu không khớp!');
    }
}

function validatePhone($phone) {
    global $phoneRegex;
    if (empty($phone)) {
        throw new Exception("Vui lòng nhập số điện thoại!");
    }
    if (!preg_match($phoneRegex, $phone)) {
        throw new Exception("Sai định dạng số điện thoại!");
    }
}

function validateRole($role) {
    if ($role == -1) {
        throw new Exception("Vui lòng phân quyền cho người dùng!");
    }
}