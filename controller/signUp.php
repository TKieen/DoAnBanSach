<?php
    $errors = [ 'email' => ['isEmpty' => '', 'invalid' => '', 'existed' => ''], 
        'password' => ['isEmpty' => ''],
        'r_password' => ['isEmpty' => '', 'unmatched' => ''], 
        'fullname' => ['required' => '']
    ];

    if(isset($_POST['sign_up'])) {

        $errors['email']['isEmpty'] =  check_isEmpty($_POST['email']);
        $errors['email']['invalid'] = check_email_is_valid($_POST['email']);
        $errors['email']['existed'] = check_email_is_existed($_POST['email']);
        
        $errors['password']['isEmpty'] =  check_isEmpty($_POST['password']);

        $errors['r_password']['isEmpty'] =  check_isEmpty($_POST['r_password']);
        $errors['r_password']['unmatched'] = check_password_is_unmatched($_POST['password'], $_POST['r_password']);

        $errors['fullname']['isEmpty'] = check_isEmpty($_POST['fullname']);

        $is_able_to_sign_up = true;

        foreach($errors as $error) {
            foreach($error as $error_element) {
                if ($error_element) {
                    $is_able_to_sign_up = false;
                    break;
                }
            }
        }

        if ($is_able_to_sign_up){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];

            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO taikhoan (email, matkhau, tenTK, dienthoai, phanquyen, trangthai) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
            $phanquyen = "KH";
            $trangthai = '1';
            
            if($prepareStmt) {  
                mysqli_stmt_bind_param($stmt, "ssssss", $email, $password_hash, $fullname, $phone, $phanquyen, $trangthai);
                mysqli_stmt_execute($stmt);
                $notif = "Đăng kí thành công";
                echo "<script>alert('{$notif}')</script>";
                header('Location:?page=signIn');
            }
            else {
                $notif = 'Đã có lỗi xảy ra, vui lòng thử lại sau';
            }
            $result = getLimitProductBestSeller(12);
            $category = getAllCategory_KH();
            //require_once 'view/home.php';     
        }
    }
    $result = getLimitProductBestSeller(12);
    $category = getAllCategory_KH();
    require "view/signUp.php";
?>