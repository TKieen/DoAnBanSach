<?php
    function addCustomer($email, $matkhau, $tenTK, $dienthoai){
        $sql = 'INSERT INTO taikhoan (email, matkhau, tenTK, dienthoai, phanquyen, trangthai) 
        VALUES ("'.$email.'","'.$matkhau.'", "'.$tenTK.'", "'.$dienthoai.'", "KH", 1)';
        insert($sql);
    }
?>