<?php
    require_once "../lib/connect.php";
    require_once "../lib/session.php";

    if(isset($_GET['page'])&&($_GET['page']!=="")){
        switch(trim($_GET['page'])){
            case 'home': {
                require_once "view/home.php";
                break;
            }
            case 'signIn':
                if (isset($_POST['sign_in'])) {
                    $inputEmail = $_POST['email'];
                    $inputPassword = $_POST['password'];
                    $sql = "SELECT * FROM taikhoan WHERE email= '$inputEmail' LIMIT 1";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if (mysqli_num_rows($result) > 0) {
                        if(password_verify($inputPassword, $user['matkhau'])){
                            if (($user['trangthai'] == 1) and ($user['phanquyen'] !== "KH")) {
                                admin_login_session($user['idTK'], $user['email'], $user['tenTK'], $user['phanquyen']);
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

                                    case "DN":
                                        header("Location:ChuDN/index.php");
                                        break;
                                }
                            }
                            else if ($user['trangthai'] == 0) {
                                echo "<script>alert('Tài khoản đã bị khóa, vui lòng liên hệ với quản trị viên để biết thêm thông tin chi tiết')</script>";
                            }
                            else{
                                echo "<script>alert('Bạn không có phân quyền để truy cập trang web cho quản trị viên, hãy truy cập vào trang web dành cho khách hàng')</script>";
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
                require_once "view/signIn.php";
                break;
            case 'forgotPassword':
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
                require_once "view/forgotPassword.php";
                break;
            
            default:
                header("Location:index.php?page=home");
                break;
        }
    }
    else {
        header("Location:index.php?page=home");
    }
?>