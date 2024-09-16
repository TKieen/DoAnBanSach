<?php
    function login($email){
        $sql = 'SELECT * FROM taikhoan WHERE email= "'.$email.'" LIMIT 1';
        return getOne($sql);
    }

    function isEmailValid_KH($email){
        $sql = 'SELECT email
        FROM taikhoan 
        WHERE email="'.$email.'" 
        AND (phanquyen = "KH"
        OR phanquyen = "DN")
        LIMIT 1';
        return getOne($sql)!=null;
    }

    function resetPassword($email, $password){
        $sql = 'UPDATE taikhoan SET matkhau="'.$password.'"WHERE email="'.$email.'"';
        return edit($sql);
    }
?>