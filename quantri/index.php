<?php
    require_once "../lib/connect.php";
    require_once "../lib/session.php";
    if(isset($_GET['page'])&&($_GET['page']!=="")){
        switch(trim($_GET['page'])){
            case 'home': {
                require_once "home.php";
                break;
            }
            case 'signIn':
                require_once "login.php";
                if (isset($_POST['sign_in'])) {
                    $inputEmail = $_POST['email'];
                    $inputPassword = $_POST['password'];
                    $sql = "SELECT * FROM taikhoan WHERE email= '$inputEmail' LIMIT 1";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if (mysqli_num_rows($result) > 0) {
                        if(password_verify($inputPassword, $user['matkhau'])){
                            login_session($user['idTK'], $user['email'], $user['tenTK'], $user['phanquyen']);
                            $notif = "Đăng nhập thành công";
                            echo "<script>alert('{$notif}'')</script>";
                            switch ($user['phanquyen']) {
                                case "AD":
                                    header("Location:Admin/index.php");
                                    break;

                                case "BH":
                                    header("Location:BanHang/index.php");
                                    break;

                                case "TK":
                                    header("Location:ThuKho/index.php");
                                    break;

                                /*case "DN":
                                    header("Location:Admin/index.php");
                                    break;
                                */
                            }  
                        }  
                        else {
                            echo "<script>alert('Mật khẩu không đúng, vui lòng nhập lại')</script>";
                        }   
                    }
                    else {
                        echo "<script>alert('Tài khoản không tồn tại')</script>";
                    }
                }
                break;
            case 'forgotPassword':
                require_once "forgotPassword.php";
                if (isset($_POST['submit'])) {
                    $inputEmail = $_POST['email'];
                    $sql = "SELECT * FROM taikhoan WHERE email= '$inputEmail' LIMIT 1";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if (mysqli_num_rows($result) > 0) {
                        $n_password = password_hash("1", PASSWORD_DEFAULT);
                        $sql = "UPDATE taikhoan SET matkhau= '$n_password' WHERE email='".$inputEmail."' LIMIT 1";
                        $sql_run = mysqli_query($conn, $sql);
                        echo "<script>alert('Đã đổi mật khẩu về 1')</script>";
                        header("location:index.php?page=signIn");
                    }
                    else {
                        echo "<script>alert('Tài khoản không tồn tại')</script>";
                    } 
                }
                break;  
            case 'editInfo':
                $sql = "SELECT * FROM taikhoan where email='".$_SESSION['user']['email']."' LIMIT 1";
                $result = mysqli_query($conn, $sql);
                $user_info = mysqli_fetch_array($result);
                require_once 'view/edit_info.php';
                if(isset($_POST['submit_info'])) {
                    $tenTK = $_POST['tenTK'];
                    if (isset($tenTK) && !empty($tenTK)) {
                        $sql = "UPDATE taikhoan SET tenTK='".$tenTK."' WHERE email='".$_SESSION['user']['username']."' LIMIT 1";
                        $sql_run = mysqli_query($conn, $sql);
                        $notif = 'Thay đổi họ và tên thành công';
                        echo "<script>alert('{$notif}')</script>";
                        login_session_set_name($tenTK);
                    }
            
                    $email = $_POST['email'];
                    if (isset($email) && !empty($email)) {
                        $sql = "UPDATE taikhoan SET email='".$email."' WHERE email='".$_SESSION['user']['username']."' LIMIT 1";
                        $sql_run = mysqli_query($conn, $sql);
                        $notif = 'Thay đổi email thành công';
                        echo "<script>alert('{$notif}')</script>";
                        login_session_set_email($email);
                    }
            
                    $phone = $_POST['phone'];
                    if (isset($phone) && !empty($phone)) {
                        $sql = "UPDATE taikhoan SET dienthoai='".$phone."' WHERE email='".$_SESSION['user']['username']."' LIMIT 1";
                        $sql_run = mysqli_query($conn, $sql);
                        $notif = 'Thay đổi số điện thoại thành công';
                        echo "<script>alert('{$notif}')</script>";
                    }
                }
                if(isset($_POST['submit_password'])) {
                    $c_password = $_POST['c_password'];
                    $n_password = $_POST['n_password'];
                    $r_n_password = $_POST['r_n_password'];
                    
                    if(password_verify($c_password, $user_info['matkhau'])) {
                        if (($n_password === $r_n_password) && !empty($n_password) && !empty($n_password)) {
                            $password_hash = password_hash($n_password, PASSWORD_DEFAULT);
                            $sql = "UPDATE taikhoan SET matkhau='".$password_hash."' WHERE email='".$_SESSION['user']['username']."' LIMIT 1";
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
                break;
        }
    }
    else {
        require_once "home.php";
    }
?>