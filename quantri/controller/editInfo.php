<?php
include '../../lib/connect.php';
require '../model/customer.php';
require '../model/user.php';
require_once "../../lib/session.php";

require 'userValidation.php';

    if(isset($_POST['submit_info'])) {
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        if(!empty($email) && isEmailValid($_SESSION['admin']['id'], $email) != null) 
            echo json_encode(array('success'=>false));
        else if(!empty($phone) && isPhoneValid($_SESSION['admin']['id'], $phone) != null)
            echo json_encode(array('success'=>false));
        else{
            $tenTK = $_POST['tenTK'];
            if($tenTK == "") $tenTK = $_POST['tenTK-org'];
            else
            if($email == "") $email = $_POST['email-org'];
            else login_session_set_email($email);
            login_session_set_name($tenTK);
            if($phone == "") $phone = $_POST['phone-org'];

            editCustomer($_SESSION['admin']['id'], $tenTK, $email, $phone);
            echo json_encode(array('success'=>true));
        }

        // if (isset($email) && !empty($email)) {
        //     $sql = "SELECT email FROM taikhoan where email='".$email."' and idTK !='".$_SESSION['user']['id']."'";
        //     $sql_run = mysqli_query($conn, $sql);
        //     if (mysqli_num_rows($sql_run) === 0) {
        //         $sql = "UPDATE taikhoan SET email='".$email."' WHERE email='".$_SESSION['user']['email']."' LIMIT 1";
        //         $sql_run = mysqli_query($conn, $sql);
        //         //Nếu email được chỉnh sửa, cập nhật lại session user
        //         login_session_set_email($email);
        //         echo "<meta http-equiv='refresh' content='0'>";
        //     }
        //     else {
        //         echo "<script>alert('Email đã tồn tại')</script>";
        //     }
        // }

        // $tenTK = $_POST['tenTK'];
        // if (isset($tenTK) && !empty($tenTK)) {
        //     $sql = "UPDATE taikhoan SET tenTK='".$tenTK."' WHERE email='".$_SESSION['user']['email']."' LIMIT 1";
        //     $sql_run = mysqli_query($conn, $sql);
        //     //Nếu họ tên được chỉnh sửa, cập nhật lại session user
        //     login_session_set_name($tenTK);
        //     echo "<meta http-equiv='refresh' content='0'>";
        // }

        

        // $phone = $_POST['phone'];
        // if (isset($phone) && !empty($phone)) {
        //     $sql = "SELECT dienthoai FROM taikhoan where dienthoai='".$phone."' and idTK !='".$_SESSION['user']['id']."'";
        //     $sql_run = mysqli_query($conn, $sql);
        //     if (mysqli_num_rows($sql_run) === 0) {
        //         $sql = "UPDATE taikhoan SET dienthoai='".$phone."' WHERE email='".$_SESSION['user']['email']."' LIMIT 1";
        //         $sql_run = mysqli_query($conn, $sql);
        //         echo "<meta http-equiv='refresh' content='0'>";
        //     }
        //     else {
        //         echo "<script>alert('Số điện thoại đã tồn tại')</script>";
        //     }
        // }
        // header("Location:index.php?page=customerInfo");

    }


    if(isset($_POST['submit_password'])) {
        $currentPassword = htmlspecialchars($_POST['c_password']);
        $newPassword = htmlspecialchars($_POST['n_password']);
        $reNewPassword = htmlspecialchars($_POST['r_n_password']);

        try {
            validatePassword($newPassword, $reNewPassword);
        } catch (Exception $e) {
            echo json_encode(array('success' => false, 'message' => $e->getMessage()));
            return;
        }

        $user = getUserById($_SESSION['admin']['id']);

        if (empty($currentPassword) || !password_verify($currentPassword, $user['matkhau'])) {
            echo json_encode(array('success' => false, 'message' => 'Mật khẩu hiện tai không đúng!'));
            return;
        }

        $password_hash = password_hash($newPassword, PASSWORD_DEFAULT);
        resetPassword1($_SESSION['admin']['id'], $password_hash);
        echo json_encode(array('success' => true));
    }
        
        // if(password_verify($currentPassword, $user_info['matkhau']) && $currentPassword != '') {
        //     if (!check_password_is_unmatched($newPassword, $r_n_password) && !empty($newPassword) && !empty($r_n_password)) {
        //         $password_hash = password_hash($newPassword, PASSWORD_DEFAULT);
        //         $sql = "UPDATE taikhoan SET matkhau='".$password_hash."' WHERE email='".$_SESSION['user']['email']."' LIMIT 1";
        //         $sql_run = mysqli_query($conn, $sql);
        //         if($sql_run) {
        //             $notif = 'Thay đổi mật khẩu thành công';
        //             echo "<script>alert('{$notif}')</script>";
        //         }
        //         else {
        //             $notif = 'Đã có lỗi xảy ra';
        //             echo "<script>alert('{$notif}')</script>";
        //         }
        //     }
        //     else {
        //         $notif = 'Mật khẩu mới không trùng khớp với nhau';
        //         echo "<script>alert('{$notif}')</script>";
        //     }
        // }
        // else {
        //     $notif = 'Mật khẩu hiện tại không đúng';
        //     echo "<script>alert('{$notif}')</script>";
        // }
    
    // $result = getLimitProductBestSeller(12);
    // $category = getAllCategory_KH();
    // require_once "view/customerInfo.php";
?>