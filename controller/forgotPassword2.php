<?php
    if (isset($_POST['submit_verify'])) {
        $maxacnhan = $_POST['maxacnhan'];
        if ($maxacnhan === $_SESSION['reset_password']['verify_code']) {
            $_SESSION['reset_password']['verified'] = true;
            header("Location:index.php?page=forgotPassword3");
        }
        else {
            $notif = 'Mã xác nhận không đúng';
            echo "<script>alert('{$notif}')</script>";
        }
    }
    $result = getLimitProductBestSeller(12);
    $category = getAllCategory_KH();
    require_once "view/forgotPasswordPage2.php";
?>