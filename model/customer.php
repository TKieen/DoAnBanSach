<?php
    function check_isEmpty($input) {
        if (empty($input)) {
            return true;
        }
        else return false;
    }

    function check_email_is_valid($inputEmail) {
        if(!filter_var($inputEmail, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        else return false;
    }
    
    function check_email_is_existed($inputEmail) {
        $sql = "SELECT * FROM taikhoan WHERE email= '".$inputEmail."' LIMIT 1";
        $row = mysqli_query($GLOBALS['conn'], $sql);
        $count = mysqli_num_rows($row);
        if ($count > 0) {
            return true;
        }
        else return false;
    }

    function check_phone_is_existed($inputPhone) {
        $sql = "SELECT * FROM taikhoan WHERE dienthoai= '".$inputPhone."' LIMIT 1";
        $row = mysqli_query($GLOBALS['conn'], $sql);
        $count = mysqli_num_rows($row);
        if ($count > 0) {
            return true;
        }
        else return false;
    }

    function check_password_is_unmatched($inputPW, $inputR_PW) {
        if($inputPW !== $inputR_PW) {
            return true;
        }
        else return false;
    }

    function getOneCustomerById($idTK){
        $sql='SELECT * FROM taikhoan WHERE 1';
        $sql.=' and idTK = '.$idTK;
        return getOne($sql);
    }

    function notif($title, $text, $icon, $button) {
        echo "<script type='text/javascript'>
        swal({
            title: '.$title.',
            text: '.$text.',
            icon: '.$icon.',
            button: '.$button.',
          });
        </script>";
    }

    function isEmailValid($idTK, $email){
        $sql = 'SELECT email FROM taikhoan where email="'.$email.'" and idTK !='.$idTK;
        return getOne($sql);
    }

    function isPhoneValid($idTK, $phone){
        $sql = 'SELECT dienthoai FROM taikhoan where dienthoai="'.$phone.'" and idTK !='.$idTK;
        return getOne($sql);
    }

    function editCustomer($idTK, $tenTK, $email, $phone){
        $sql = 'UPDATE taikhoan 
        SET tenTK = "'.$tenTK.'",
        email="'.$email.'",
        dienthoai = "'.$phone.'"
        WHERE idTK='.$idTK;
        edit($sql);
    }

    function resetPassword1($idTK, $pwd){
        $sql = 'UPDATE taikhoan 
        SET matkhau = "'.$pwd.'"
        WHERE idTK='.$idTK;
        edit($sql);
    }

    function isFullNameValid($fullname) {
        $pattern = '/^[\p{L} ]+$/u';
        return preg_match($pattern, $fullname);
    }
?>