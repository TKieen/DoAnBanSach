<?php
    $sql = "SELECT * FROM taikhoan where idTK='".$_SESSION['user']['id']."' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user_info = mysqli_fetch_array($result);
    if(isset($_POST['submit_info'])) {
        $tenTK = $_POST['tenTK'];
        if (isset($tenTK) && !empty($tenTK)) {
            $sql = "UPDATE taikhoan SET tenTK='".$tenTK."' WHERE email='".$_SESSION['user']['email']."' LIMIT 1";
            $sql_run = mysqli_query($conn, $sql);
            //Nếu họ tên được chỉnh sửa, cập nhật lại session user
            login_session_set_name($tenTK);
            echo "<meta http-equiv='refresh' content='0'>";
        }

        $email = $_POST['email'];
        if (isset($email) && !empty($email)) {
            $sql = "UPDATE taikhoan SET email='".$email."' WHERE email='".$_SESSION['user']['email']."' LIMIT 1";
            $sql_run = mysqli_query($conn, $sql);
            //Nếu email được chỉnh sửa, cập nhật lại session user
            login_session_set_email($email);
            echo "<meta http-equiv='refresh' content='0'>";
        }

        $phone = $_POST['phone'];
        if (isset($phone) && !empty($phone)) {
            $sql = "UPDATE taikhoan SET dienthoai='".$phone."' WHERE email='".$_SESSION['user']['email']."' LIMIT 1";
            $sql_run = mysqli_query($conn, $sql);
            echo "<meta http-equiv='refresh' content='0'>";
        }
        header("Location:index.php?page=customerInfo");

    }
    if(isset($_POST['submit_password'])) {
        $c_password = $_POST['c_password'];
        $n_password = $_POST['n_password'];
        $r_n_password = $_POST['r_n_password'];

        if($c_password === '') {
            $notif = 'Bạn chưa nhập mật khẩu hiện tại';
            echo "<script>alert('{$notif}')</script>";
        } else {
            if(password_verify($c_password, $user_info['matkhau']) && $c_password != '') {
                if (!check_password_is_unmatched($n_password, $r_n_password) && !empty($n_password) && !empty($r_n_password)) {
                    $password_hash = password_hash($n_password, PASSWORD_DEFAULT);
                    $sql = "UPDATE taikhoan SET matkhau='".$password_hash."' WHERE email='".$_SESSION['user']['email']."' LIMIT 1";
                    $sql_run = mysqli_query($conn, $sql);
                    if($sql_run) {
                        $notif = 'Thay đổi mật khẩu thành công';
                        echo "<script>alert('{$notif}')</script>";
                    }
                    else {
                        $notif = 'Đã có lỗi xảy ra';
                        echo "<script>alert('{$notif}')</script>";
                    }
                }
                else {
                    $notif = 'Mật khẩu mới không trùng khớp với nhau';
                    echo "<script>alert('{$notif}')</script>";
                }
            }
            else {
                $notif = 'Mật khẩu hiện tại không đúng';
                echo "<script>alert('{$notif}')</script>";
            }
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
    }
    $result = getLimitProductBestSeller(12);
    $category = getAllCategory_KH();
    require_once "view/customerInfo.php";
?>