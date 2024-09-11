<?php
    $sql = "SELECT * FROM taikhoan where email='".$_SESSION['admin']['email']."' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user_info = mysqli_fetch_array($result);
    if(isset($_POST['submit_info'])) {
        $tenTK = $_POST['tenTK'];
        if (isset($tenTK) && !empty($tenTK)) {
            $sql = "UPDATE taikhoan SET tenTK='".$tenTK."' WHERE email='".$_SESSION['admin']['email']."' LIMIT 1";
            $sql_run = mysqli_query($conn, $sql);
            $notif = 'Thay đổi họ và tên thành công';
            echo "<script>alert('{$notif}')</script>";
            admin_login_session_set_name($tenTK);
            echo "<meta http-equiv='refresh' content='0'>";
        }

        $email = $_POST['email'];
        if (isset($email) && !empty($email)) {
            $sql = "SELECT email FROM taikhoan where email='".$email."' and idTK !='".$_SESSION['admin']['id']."'";
            $sql_run = mysqli_query($conn, $sql);
            if (mysqli_num_rows($sql_run) === 0) {
                $sql = "UPDATE taikhoan SET email='".$email."' WHERE email='".$_SESSION['admin']['email']."' LIMIT 1";
                $sql_run = mysqli_query($conn, $sql);
                $notif = 'Thay đổi email thành công';
                echo "<script>alert('{$notif}')</script>";
                admin_login_session_set_email($email);
                echo "<meta http-equiv='refresh' content='0'>";
            }
            else {
                echo "<script>alert('Email đã tồn tại')</script>";
            }
        }

        $phone = $_POST['phone'];
        if (isset($phone) && !empty($phone)) {
            $sql = "SELECT dienthoai FROM taikhoan where dienthoai='".$phone."' and idTK !='".$_SESSION['admin']['id']."'";
            $sql_run = mysqli_query($conn, $sql);
            if (mysqli_num_rows($sql_run) === 0) {
                $sql = "UPDATE taikhoan SET dienthoai='".$phone."' WHERE email='".$_SESSION['admin']['email']."' LIMIT 1";
                $sql_run = mysqli_query($conn, $sql);
                $notif = 'Thay đổi số điện thoại thành công';
                echo "<script>alert('{$notif}')</script>";
                echo "<meta http-equiv='refresh' content='0'>";
            }
            else {
                echo "<script>alert('Số điện thoại đã tồn tại')</script>";
            }
        }
    }
    if(isset($_POST['submit_password'])) {
        $c_password = $_POST['c_password'];
        $n_password = $_POST['n_password'];
        $r_n_password = $_POST['r_n_password'];
        
        if(password_verify($c_password, $user_info['matkhau'])) {
            if (($n_password === $r_n_password) && !empty($n_password) && !empty($n_password)) {
                $password_hash = password_hash($n_password, PASSWORD_DEFAULT);
                $sql = "UPDATE taikhoan SET matkhau='".$password_hash."' WHERE email='".$_SESSION['admin']['email']."' LIMIT 1";
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
    require_once '../view/edit_info.php';
?>