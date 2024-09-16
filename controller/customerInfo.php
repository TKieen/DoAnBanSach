<?php
include '../lib/connect.php';
require '../model/customer.php';
require_once "../lib/session.php";

    if(isset($_POST['submit_info'])) {

        $email = $_POST['email'];
        $phone = $_POST['phone'];
        if(!empty($email) && isEmailValid($_SESSION['user']['id'], $email) != null) 
            echo json_encode(array('success'=>false));
        else if(!empty($phone) && isPhoneValid($_SESSION['user']['id'], $phone) != null)
            echo json_encode(array('success'=>false));
        else{
            $tenTK = $_POST['tenTK'];
            if($tenTK == "") $tenTK = $_POST['tenTK-org'];
            else
            if($email == "") $email = $_POST['email-org'];
            else login_session_set_email($email);
            login_session_set_name($tenTK);
            if($phone == "") $phone = $_POST['phone-org'];

            editCustomer($_SESSION['user']['id'], $tenTK, $email, $phone);
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
        $c_password = $_POST['c_password'];
        $n_password = $_POST['n_password'];
        $r_n_password = $_POST['r_n_password'];
        $user = getOneCustomerById($_SESSION['user']['id']);
        if(password_verify($c_password, $user['matkhau']) && $c_password != '') {
            $password_hash = password_hash($n_password, PASSWORD_DEFAULT);
            resetPassword1($_SESSION['user']['id'], $password_hash);
            echo json_encode(array('success'=>true));
        }
        else echo json_encode(array('success'=>false));
    }
        
        // if(password_verify($c_password, $user_info['matkhau']) && $c_password != '') {
        //     if (!check_password_is_unmatched($n_password, $r_n_password) && !empty($n_password) && !empty($r_n_password)) {
        //         $password_hash = password_hash($n_password, PASSWORD_DEFAULT);
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