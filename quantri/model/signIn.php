<?php
    function login($email){
        $sql = 'SELECT * FROM taikhoan WHERE email= "'.$email.'" LIMIT 1';
        return getOne($sql);
    }

    function isEmailValid1($email){
        $sql = 'SELECT email
        FROM taikhoan 
        WHERE email="'.$email.'" 
        AND phanquyen != "KH" 
        LIMIT 1';
        return getOne($sql)!=null;
    }

    function resetPassword2($email, $password){
        $sql = 'UPDATE taikhoan SET matkhau="'.$password.'"WHERE email="'.$email.'"';
        return edit($sql);
    }
?>