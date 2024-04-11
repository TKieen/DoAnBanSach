<?php
    function getAllProduct(){
        $sql='select * from sach';
        return getAll($sql);
    }

    function getProductByID($id){
        $sql = 'select * from sach where idSach='.$id;
        return getOne($sql);
    }

    function isProductExist($tuasach, $tacgia, $nxb, $namxb){
        $sql = 'select idSach from sach where tuasach= "'.$tuasach.'" and tacgia= "'.$tacgia.'" and nxb="'.$nxb.'" and namxb='.$namxb;
       return getOne($sql)!=null;
    }
    
    function addProduct($hinhanh, $tuasach, $tacgia, $nxb, $namxb, $idNCC, $giabia, $giaban, $idTL, $mota){
        $sql='insert into Sach(hinhanh, tuasach, tacgia, nxb, namxb, idNCC, giabia, giaban, idTL, mota, trangthai, idMGG) values ("'.$hinhanh.'","'.$tuasach.'","'.$tacgia.'","'.$nxb.'",'.$namxb.','.$idNCC.','.$giabia.','.$giaban.','.$idTL.',"'.$mota.'",1, NULL)';
        insert($sql);
    }

    function editProduct($idSach, $hinhanh, $tuasach,  $tacgia, $nxb, $namxb, $idNCC, $giabia, $giaban, $idTL, $idMGG, $mota, $trangthai){
        $sql = 
        'UPDATE Sach
        SET hinhanh = "'.$hinhanh.'",
        tuasach = "'.$tuasach.'",
        tacgia = "'.$tacgia.'",
        nxb = "'.$nxb.'",
        namxb = '.$namxb.',
        idNCC = '.$idNCC.',
        giabia = '.$giabia.',
        giaban = '.$giaban.',';
        if($idMGG === NULL) $sql.='idMGG = NULL,';
        else $sql.='idMGG = '.$idMGG.',';
        $sql.='
        idTL = '.$idTL.',
        mota = "'.$mota.'",
        trangthai = '.$trangthai.'
        WHERE idSach = '.$idSach;
        edit($sql);
    }

?>