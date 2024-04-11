<?php
    function getAllCategory(){
        $sql='select * from theloai';
        return getAll($sql);
    }

    function getCategoryByID($idTL){
        $sql = 'select * from theloai where idTL='.$idTL;
        return getOne($sql);
    }

    function getCategoryName($id){
        $sql = 'select tenTL from theloai where idTL='.$id;
        return getOne($sql);
    }

    function isCategoryExist($tenTL){
        $tenTL = strtolower($tenTL);
        $sql = 'select idTL from theloai where tenTL= "'.$tenTL.'"';
       return getOne($sql)!=null;
    }
    
    function addCategory($tenTL){
        $sql='insert into theloai(tenTL, trangthai) values ("'.$tenTL.'",1)';
        insert($sql);
    }

    function editCategory($idTL,$tenTL, $trangthai){
        // trangthai = -1: bi huy
        // trangthai = 0: het han
        // trangthai = 1: hoatdong
        $sql = 
        'UPDATE theloai 
        SET tenTL = "'.$tenTL.'",
        trangthai = '.$trangthai.'
        WHERE idTL = '.$idTL;
        edit($sql);
    }
?>