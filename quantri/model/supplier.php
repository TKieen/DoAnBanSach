<?php
    function getAllSupplier(){
        $sql='SELECT * FROM nhacungcap';
        return getAll($sql);
    }

    function getAllSupplierActive(){
        $sql='SELECT * FROM nhacungcap WHERE trangthai = 1';
        return getAll($sql);
    }

    function getSupplierByID($id){
        $sql = 'SELECT * FROM nhacungcap WHERE idNCC='.$id;
        return getOne($sql);
    }

    function getSupplierName($id){
        $sql = 'SELECT tenNCC FROM nhacungcap WHERE idNCC='.$id;
        return getOne($sql);
    }

    function isSupplierExist($email, $dienthoai){
        $sql = 'SELECT idNCC FROM nhacungcap WHERE email= "'.$email.'" or dienthoai= "'.$dienthoai.'"';
       return getOne($sql)!=null;
    }

    function isSupplierExist_update($id, $email, $dienthoai){
        $sql = 'SELECT idNCC FROM nhacungcap WHERE (email= "'.$email.'" or dienthoai= "'.$dienthoai.'") and idNCC!='.$id;
       return getOne($sql)!=null;
    }
    
    function addSupplier($tenNCC, $email, $dienthoai, $diachi){
        $sql='INSERT INTO nhacungcap(tenNCC, email, dienthoai, diachi, trangthai) VALUES ("'.$tenNCC.'","'.$email.'","'.$dienthoai.'","'.$diachi.'",1)';
        insert($sql);
    }

    function editSupplier($idNCC,$tenNCC, $email, $dienthoai, $diachi, $trangthai){
        $sql = 
        'UPDATE nhacungcap
        SET tenNCC = "'.$tenNCC.'",
        email = "'.$email.'",
        dienthoai = "'.$dienthoai.'",
        diachi = "'.$diachi.'",
        trangthai = '.$trangthai.'
        WHERE idNCC = '.$idNCC;
        edit($sql);
    }

    function lockSupplier($id){
        $sql = 
        'UPDATE nhacungcap
        SET trangthai = 0
        WHERE idNCC = '.$id;
        edit($sql);
    }

    function unlockSupplier($id){
        $sql = 
        'UPDATE nhacungcap
        SET trangthai = 1
        WHERE idNCC = '.$id;
        edit($sql);
    }
?>