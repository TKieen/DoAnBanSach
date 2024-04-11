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
?>