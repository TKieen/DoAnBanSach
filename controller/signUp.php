<?php
    include '../lib/connect.php';
    require '../model/signUp.php';
    require '../model/customer.php';
    require_once "../lib/session.php";

    if(isset($_POST['sign_up'])) {
        $fullname = htmlspecialchars($_POST['fullname']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $rPassword = htmlspecialchars($_POST['r_password']);
        $phone = htmlspecialchars($_POST['phone']);

        if (check_isEmpty($fullname)) {
            echo json_encode(['success'=>false, 'message'=>'Họ tên không được để trống']); return;
        }
        if (check_isEmpty($email)) {
            echo json_encode(['success'=>false, 'message'=>'Email không được để trống']); return;
        }
        if (check_isEmpty($password)) {
            echo json_encode(['success'=>false, 'message'=>'Mật khẩu không được để trống']); return;
        }
        if (check_isEmpty($rPassword)) {
            echo json_encode(['success'=>false, 'message'=>'Xác nhận mật khẩu không được để trống']); return;
        }
        if (check_isEmpty($phone)) {
            echo json_encode(['success'=>false, 'message'=>'Số điện thoại không được để trống']); return;
        }
        if (isFullNameValid($fullname) == false) {
            echo json_encode(['success'=>false, 'message'=>'Họ tên không hợp lệ']); return;
        }
        if (check_email_is_valid($email)) {
            echo json_encode(['success'=>false, 'message'=>'Email không hợp lệ']); return;
        }
        if (strlen($email) < 10 || strlen($email) > 254) {
            echo json_encode(['success'=>false, 'message'=>'Email phải có độ dài từ 10 đến 254 ký tự']); return;
        }
        if (check_email_is_existed($email)) {
            echo json_encode(['success'=>false, 'message'=>'Email đã tồn tại']); return;
        }

        if (check_phone_is_existed($phone)) {
            echo json_encode(['success'=>false, 'message'=>'Số điện thoại đã tồn tại']); return;
        }

        if (strlen($password) < 8 || strlen($password) > 20) {
            echo json_encode(['success'=>false, 'message'=>'Mật khẩu phải có độ dài từ 8 đến 20 ký tự']); return;
        }

        if (check_password_is_unmatched($password, $rPassword)) {
            echo json_encode(['success'=>false, 'message'=>'Mật khẩu và xác nhận mật khẩu không khớp.']); return;
        }
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        addCustomer($email, $hashedPassword, $fullname, $phone);
        echo json_encode(['success'=>true, 'message'=>'Đăng ký tài khoản thành công']);
    }
?>