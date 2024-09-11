<?php
    function getAllDiscount(){
        $sql='select * from magiamgia';
        return getAll($sql);
    }

    function getAllDiscountWaiting(){
        $sql = 'SELECT * FROM magiamgia WHERE trangthai = "cdr"';
        return getAll($sql);
    }

    function getAllDiscountActive(){
        $sql='select * from magiamgia where trangthai = "cdr"';
        return getAll($sql);
    }

    function getDiscountByID($idMGG){
        $sql = 'select * from magiamgia where idMGG='.$idMGG;
        return getOne($sql);
    }

    function getDiscountName($id){
        $sql = 'select phantram from magiamgia where idMGG='.$id;
        return getOne($sql);
    }

    function isDiscountExist($phantram, $ngaybatdau, $ngayketthuc){
        $sql = 'select idMGG from magiamgia where phantram= '.$phantram.' and ngaybatdau= "'.$ngaybatdau.'" and ngayketthuc= "'.$ngayketthuc.'" and trangthai!="huy"';
       return getOne($sql)!=null;
    }
    
    function addDiscount($phantram, $ngaybatdau, $ngayketthuc, $trangthai){
        $sql='insert into magiamgia(phantram, ngaybatdau, ngayketthuc, trangthai) values ('.$phantram.',"'.$ngaybatdau.'","'.$ngayketthuc.'","'.$trangthai.'")';
        insert($sql);
    }

    function editDiscount($idMGG,$phantram, $ngaybatdau, $ngayketthuc, $trangthai){
        $sql = 
        'UPDATE magiamgia 
        SET phantram = '.$phantram.',
        ngaybatdau = "'.$ngaybatdau.'",
        ngayketthuc = "'.$ngayketthuc.'",
        trangthai = "'.$trangthai.'"
        WHERE idMGG = '.$idMGG;
        edit($sql);
    }

    function lockDiscount($idMGG){
        $sql = 
        'UPDATE magiamgia 
        SET trangthai = "huy"
        WHERE idMGG = '.$idMGG;
        edit($sql);
    }
?>