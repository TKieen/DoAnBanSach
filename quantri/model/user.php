<?php
    function getAllUser(){
        $sql='select * from taikhoan';
        return getAll($sql);
    }

    function getUserByID($id){
        $sql = 'select * from taikhoan where idTK='.$id;
        return getOne($sql);
    }

    function isExist($email, $dienthoai){
        $sql = 'select idTK from taikhoan where email= "'.$email.'" or dienthoai= "'.$dienthoai.'"';
        return getOne($sql)!=null;
    }

    // ton tai mot tai khoan trung email, dienthoai tru tai khoan hien tai
    function isExist_update($id, $email){
        $sql = 'select idTK from taikhoan where email= "'.$email.'" and idTK!='.$id;
        return getOne($sql)!=null;
    }
    
    function addUser($ten, $email, $dienthoai, $phanquyen,$matkhau){
        $sql='insert into taikhoan(tenTK, email, dienthoai, phanquyen, trangthai, matkhau) values ("'.$ten.'","'.$email.'","'.$dienthoai.'","'.$phanquyen.'",1,"'.$matkhau.'")';
        insert($sql);
    }

    function editUser($id, $email, $phanquyen, $trangthai){
        $sql = 
        'UPDATE taikhoan
        SET email = "'.$email.'",
        phanquyen = "'.$phanquyen.'",
        trangthai = '.$trangthai.'
        WHERE idTK = '.$id;
        edit($sql);
    }

    function lockUser($id){
        $sql = 
        'UPDATE taikhoan
        SET trangthai = 0
        WHERE idTK = '.$id;
        edit($sql);
    }

    function unlockUser($id){
        $sql = 
        'UPDATE taikhoan
        SET trangthai = 1
        WHERE idTK = '.$id;
        edit($sql);
    }
?>