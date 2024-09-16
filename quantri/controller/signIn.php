<?php
include '../../lib/connect.php';
require '../model/signIn.php';
require '../../model/customer.php';
require_once "../../lib/session.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require "../../view/vendor/autoload.php";

if(isset($_POST['sign_in'])){
    $inputEmail = $_POST['email'];
    $inputPassword = $_POST['password'];
    $user = login($inputEmail);
    if($user){
        if(password_verify($inputPassword, $user['matkhau']) && ($user['trangthai'] == 1 && $user['phanquyen'] != 'KH')){
            admin_login_session($user['idTK'], $user['email'], $user['tenTK'], $user['phanquyen']);
            echo json_encode(array('success'=>true,'phanquyen'=>$user['phanquyen']));
        }
        else echo json_encode(array('success'=>false));
    }
    else echo json_encode(array('success'=>false));
}

if(isset($_POST['forgot-pwd-1'])){
    $email = $_POST['email'];
    if(isEmailValid1($email)){
        reset_password_session($email);

            //code gửi mail
            $mail = new PHPMailer(true);

            $mail->isSMTP(); 
            $mail->SMTPAuth   = true;
            //$mail->setLanguage('vi','vendor/phpmailer/phpmailer/language/phpmailer.lang-vi.php');  

            $mail->Host       = 'smtp.gmail.com';                                         
            $mail->Username   = 'doannhom4.pttkhttt@gmail.com';               
            $mail->Password   = 'ewvd stdf afap kckz';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            
            $mail->Port       = 587; 

            $mail->setFrom('doannhom4.pttkhttt@gmail.com', 'Nha sach Vinabook');
            $mail->addAddress($_SESSION['reset_password']['email']);
            
            $mail->isHTML(true);
            $mail->Subject = "Your Vinabook account verification code";

            $email_template = "
                <h2>Xin chào bạn</h2>
                <h3>Đây là mã xác nhận cho tài khoản Vinabook của bạn, tuyệt đối không chia sẻ cho bất kì ai: {$_SESSION['reset_password']['verify_code']}</h3>
            ";
            $mail->Body = $email_template;
            $mail->send();
            echo json_encode(array('success'=>true));
    }
    else echo json_encode(array('success'=>false));
}

if (isset($_POST['forgot-pwd-2'])) {
    $maxacnhan = $_POST['maxacnhan'];
    if ($maxacnhan === $_SESSION['reset_password']['verify_code']) {
        $_SESSION['reset_password']['verified'] = true;
        echo json_encode(array('success'=>true));
    }
    else echo json_encode(array('success'=>false));
}


if (isset($_POST['forgot-pwd-3'])) {
    $password = $_POST['password'];
    $r_password = $_POST['r_password'];
    
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    resetPassword2($_SESSION['reset_password']['email'], $password_hash);
    reset_password_session_unset();
    echo json_encode(array('success'=>true));
        
}

?>

