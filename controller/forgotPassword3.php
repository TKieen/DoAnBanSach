<?php
    if($_SESSION['reset_password']['verified'] === true) {
        if (isset($_POST['submit_password'])) {
            $password = $_POST['password'];
            $r_password = $_POST['r_password'];
            if (!check_password_is_unmatched($password, $r_password)) {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "UPDATE taikhoan SET matkhau='".$password_hash."'WHERE email='".$_SESSION['reset_password']['email']."' LIMIT 1";
                $result = mysqli_query($conn, $sql);

                if($result) {
                    reset_password_session_unset();
                    $notif = 'Đổi mật khẩu thành công';
                    echo "<script>alert('{$notif}')</script>";
                    header("Location:index.php?page=signIn");
                }
                else {
                    $notif = 'Có lỗi xảy ra, vui lòng thử lại sau...';
                    echo "<script>alert('{$notif}')</script>";
                }
            }
            else {
                $notif = 'Mật khẩu không trùng khớp';
                echo "<script>alert('{$notif}')</script>";
            }
        }
        $result = getLimitProductBestSeller(12);
        $category = getAllCategory_KH();
        require_once "view/forgotPasswordPage3.php";
    }
    else {
        header("Location:index.php?page=forgotPassword2");
    }
?>