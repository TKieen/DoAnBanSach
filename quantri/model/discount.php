<?php
    function getAllDiscount(){
        $sql='select * from magiamgia';
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
        $sql = 'select idMGG from magiamgia where phantram= '.$phantram.' and ngaybatdau= "'.$ngaybatdau.'" and ngayketthuc= "'.$ngayketthuc.'"';
       return getOne($sql)!=null;
    }
    
    function addDiscount($phantram, $ngaybatdau, $ngayketthuc){
        $sql='insert into magiamgia(phantram, ngaybatdau, ngayketthuc, trangthai) values ('.$phantram.',"'.$ngaybatdau.'","'.$ngayketthuc.'",1)';
        insert($sql);
    }

    function editDiscount($idMGG,$phantram, $ngaybatdau, $ngayketthuc, $trangthai){
        // trangthai = -1: bi huy
        // trangthai = 0: het han
        // trangthai = 1: hoatdong
        $sql = 
        'UPDATE magiamgia 
        SET phantram = '.$phantram.',
        ngaybatdau = "'.$ngaybatdau.'",
        ngayketthuc = "'.$ngayketthuc.'",
        trangthai = '.$trangthai.'
        WHERE idMGG = '.$idMGG;
        edit($sql);
    }
?>