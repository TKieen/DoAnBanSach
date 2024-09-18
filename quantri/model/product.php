<?php
    function getAllProduct(){
        $sql='select * from sach';
        return getAll($sql);
    }

    function getAllProductBySupplierID($idNCC){
        $sql = 'SELECT * FROM sach WHERE idNCC = '.$idNCC;
        return getAll($sql);
    }
    function getProductByID($id){
        $sql = 'select * from sach where idSach='.$id;
        return getOne($sql);
    }

    function isProductExist($tuasach, $namxb, $tacgia, $giaban, $giabia, $idNCC, $nxb){
        $sql = 'select idSach from sach 
        where tuasach= "'.$tuasach.'" 
        and namxb='.$namxb.'
        and tacgia = "'.$tacgia.'"
        and giaban = '.$giaban.'
        and giabia = '.$giabia.'
        and idNCC = '.$idNCC.'
        and nxb = "'.$nxb.'"';
       return getOne($sql)!=null;
    }

    function isProductExist_update($id, $tuasach, $namxb){
        $sql = 'select idSach from sach where tuasach= "'.$tuasach.'" and namxb='.$namxb.' and idSach!='.$id;
       return getOne($sql)!=null;
    }
    
    function addProduct($hinhanh, $tuasach, $tacgia, $nxb, $namxb, $idNCC, $giabia, $giaban, $idTL, $mota){
        $sql='insert into Sach(hinhanh, tuasach, tacgia, nxb, namxb, idNCC, giabia, giaban, idTL, mota, trangthai, idMGG) values ("'.$hinhanh.'","'.$tuasach.'","'.$tacgia.'","'.$nxb.'",'.$namxb.','.$idNCC.','.$giabia.','.$giaban.','.$idTL.',"'.$mota.'",1, NULL)';
        insert($sql);
    }

    function editProduct($idSach, $hinhanh, $idMGG, $mota, $trangthai){
        $sql = 
        'UPDATE Sach
        SET hinhanh = "'.$hinhanh.'",';
        if($idMGG === NULL) $sql.='idMGG = NULL,';
        else $sql.='idMGG = '.$idMGG.',';
        $sql.='
        mota = "'.$mota.'",
        trangthai = '.$trangthai.'
        WHERE idSach = '.$idSach;
        edit($sql);
    }

    function searchProduct($tuasach){
        $sql = 'SELECT * FROM sach WHERE tuasach LIKE "%'.$tuasach.'%"';
        return getAll($sql);
    }

    function lockProduct($id){
        $sql = 
        'UPDATE sach
        SET trangthai = 0
        WHERE idSach = '.$id;
        edit($sql);
    }

    function unlockProduct($id){
        $sql = 
        'UPDATE sach
        SET trangthai = 1
        WHERE idSach = '.$id;
        edit($sql);
    }
?>