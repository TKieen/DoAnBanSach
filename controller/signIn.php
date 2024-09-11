<?php
    if (isset($_POST['sign_in'])) {
        $inputEmail = $_POST['email'];
        $inputPassword = $_POST['password'];
        $sql = "SELECT * FROM taikhoan WHERE email= '$inputEmail' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (mysqli_num_rows($result) > 0) {
            if(password_verify($inputPassword, $user['matkhau'])){
                if ($user['trangthai'] == 1 and ($user['phanquyen'] == "KH" or $user['phanquyen'] == "DN")) {
                    login_session($user['idTK'], $user['email'], $user['tenTK'], $user['phanquyen']);
                    //$result = getLimitProductBestSeller(12);
                    //$category = getAllCategory_KH();
                    echo "<script>alert('Đăng nhập thành công')</script>";
                    header("Location:index.php?page=home"); 
                }
                else if ($user['trangthai'] == 0) {
                    echo "<script>alert('Tài khoản đã bị khóa, vui lòng liên hệ với tổng đài để biết thêm thông tin chi tiết')</script>";
                }
                else{
                    echo "<script>alert('Bạn không có phân quyền để truy cập trang web cho khách hàng, hãy truy cập vào trang web dành cho quản trị viên')</script>";
                }
            }  
            else {
                /*$title = "Lưu Ý";
                $text = "Mật khẩu không đúng, vui lòng nhập lại";
                $icon = "warning";
                $button = "Tôi đã hiểu";
                notif($title, $text, $icon, $button);*/
                echo "<script>alert('Mật khẩu không đúng, vui lòng nhập lại')</script>";
            }   
        }
        else {
            echo "<script>alert('Tài khoản không tồn tại')</script>";
        }
    }
    $result = getLimitProductBestSeller(12);
    $category = getAllCategory_KH();
    require_once "view/signIn.php";
?>