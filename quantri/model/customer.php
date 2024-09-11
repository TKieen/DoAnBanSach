<?php
    function getAllCustomer(){
        $sql='select * from taikhoan where phanquyen = "KH"';
        return getAll($sql);
    }
?>