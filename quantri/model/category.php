<?php
    function getAllCategory(){
        $sql='SELECT * FROM theloai';
        return getAll($sql);
    }

    function getAllCategoryActive(){
        $sql='SELECT * FROM theloai WHERE trangthai = 1';
        return getAll($sql);
    }

    function getCategoryByID($idTL){
        $sql = 'SELECT * FROM theloai WHERE idTL='.$idTL;
        return getOne($sql);
    }

    function getCategoryName($id){
        $sql = 'SELECT tenTL FROM theloai WHERE idTL='.$id;
        return getOne($sql);
    }

    function isCategoryExist($tenTL){
        $tenTL = strtolower($tenTL);
        $sql = 'SELECT idTL FROM theloai WHERE tenTL= "'.$tenTL.'"';
       return getOne($sql)!=null;
    }

    function isCategoryExist_update($idTL, $tenTL){
        $tenTL = strtolower($tenTL);
        $sql = 'SELECT idTL FROM theloai WHERE tenTL= "'.$tenTL.'" and idTL!='.$idTL;
       return getOne($sql)!=null;
    }
    
    function addCategory($tenTL){
        $sql='INSERT INTO theloai(tenTL, trangthai) VALUES ("'.$tenTL.'",1)';
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

    function lockCategory($id){
        $sql = 
        'UPDATE theloai
        SET trangthai = 0
        WHERE idTL = '.$id;
        edit($sql);
    }

    function unlockCategory($id){
        $sql = 
        'UPDATE theloai
        SET trangthai = 1
        WHERE idTL = '.$id;
        edit($sql);
    }

    function getTrangThaiCategoryByID($idTL){
        $sql = 'SELECT trangthai, tenTL FROM theloai WHERE idTL='.$idTL;
        return getOne($sql);
    }
?>