<?php
    function getAllCustomer(){
        $sql='select * from User where phanquyen = 4';
        return getAll($sql);
    }

    function getUserByID($id){
        $sql = 'select * from User where ID='.$id;
        return getOne($sql);
    }

    function isExist($email, $dienthoai){
        $sql = 'select ID from User where email= "'.$email.'" or dienthoai= "'.$dienthoai.'"';
       return getOne($sql)!=null;
    }
    
    function addUser($avatar, $ten, $email, $dienthoai, $diachi, $phanquyen, $trangthai){
        $sql='insert into User(avatar, ten, email, dienthoai, diachi, phanquyen, trangthai) values ("'.$avatar.'","'.$ten.'","'.$email.'","'.$dienthoai.'","'.$diachi.'",'.$phanquyen.','.$trangthai.')';
        insert($sql);
    }

    function editUser($id,$picProfile,$ten, $email, $dienthoai, $diachi, $phanquyen, $trangthai){
        $sql = 
        'UPDATE User 
        SET avatar = "'.$picProfile.'",
        ten = "'.$ten.'",
        email = "'.$email.'",
        dienthoai = "'.$dienthoai.'",
        diachi = "'.$diachi.'",
        phanquyen = '.$phanquyen.',
        trangthai = '.$trangthai.'
        WHERE id = '.$id;
        edit($sql);
    }

    function deleteUser($id){
        $sql='DELETE FROM User WHERE id='.$id;
        delete($sql);
    }

    function searchUser($ten){
        $sql='SELECT * FROM User WHERE ten LIKE "%'.$ten.'%"';
        return getAll($sql);
    }
?>