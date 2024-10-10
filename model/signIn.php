<?php
    function login($email){
        $conn = $GLOBALS['conn'];
        $sql = 'SELECT * FROM taikhoan WHERE email= ? LIMIT 1';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();  
        return $result->fetch_assoc();
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