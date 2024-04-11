<?php
    function getAllSupplier(){
        $sql='select * from nhacungcap';
        return getAll($sql);
    }

    function getSupplierByID($id){
        $sql = 'select * from nhacungcap where idNCC='.$id;
        return getOne($sql);
    }

    function getSupplierName($id){
        $sql = 'select tenNCC from nhacungcap where idNCC='.$id;
        return getOne($sql);
    }

    function isSupplierExist($email, $dienthoai){
        $sql = 'select idNCC from nhacungcap where email= "'.$email.'" or dienthoai= "'.$dienthoai.'"';
       return getOne($sql)!=null;
    }
    
    function addSupplier($hinhanh, $tenNCC, $email, $dienthoai, $diachi, $trangthai){
        $sql='insert into nhacungcap(hinhanh, tenNCC, email, dienthoai, diachi, trangthai) values ("'.$hinhanh.'","'.$tenNCC.'","'.$email.'","'.$dienthoai.'","'.$diachi.'",'.$trangthai.')';
        insert($sql);
    }

    function editSupplier($idNCC,$hinhanh,$tenNCC, $email, $dienthoai, $diachi, $trangthai){
        $sql = 
        'UPDATE nhacungcap
        SET hinhanh = "'.$hinhanh.'",
        hinhanh = "'.$tenNCC.'",
        email = "'.$email.'",
        dienthoai = "'.$dienthoai.'",
        diachi = "'.$diachi.'",
        trangthai = '.$trangthai.'
        WHERE idNCC = '.$idNCC;
        edit($sql);
    }
?>