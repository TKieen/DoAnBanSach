<?php
    function getAllCustomer(){
        $sql='select * from taikhoan where phanquyen = "KH"';
        return getAll($sql);
    }

    function getOneCustomerByEmail($email){
        $sql = 'SELECT * FROM taikhoan where email="'.$email.'"';
        return getOne($sql);
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
?>