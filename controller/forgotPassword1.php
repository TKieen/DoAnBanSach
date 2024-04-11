<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require "view/vendor/autoload.php";
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $sql = "SELECT email FROM taikhoan WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
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
            header("Location:index.php?page=forgotPassword2");
        }
        else {
            $notif = 'Chúng tôi không tìm thấy địa chỉ email này.';
            echo "<script>alert('{$notif}')</script>";
        }
    }
    $result = getLimitProductBestSeller(12);
    $category = getAllCategory_KH();
    require "view/forgotPasswordPage1.php";
?>