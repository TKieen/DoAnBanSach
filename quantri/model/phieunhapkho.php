<?php
    /* Phieu nhap kho */
    function getAllPhieuNhap(){
        $sql = 
        'SELECT DISTINCT nhacungcap.tenNCC, phieunhap.idPN, tongtien, ngaytao, ngaycapnhat, phieunhap.trangthai
        FROM nhacungcap
        INNER JOIN sach ON nhacungcap.idNCC = sach.idNCC
        INNER JOIN ctphieunhap ON sach.idSach = ctphieunhap.idSach
        INNER JOIN phieunhap ON ctphieunhap.idPN = phieunhap.idPN
        ORDER BY phieunhap.idPN';
        return getAll(($sql));
    }

    function getPhieuNhapByID($id){
        $sql = 
        'SELECT DISTINCT phieunhap.idPN, nhacungcap.tenNCC, nhacungcap.idNCC, tongtien, tongsoluong, ngaytao, ngaycapnhat, phieunhap.trangthai
        FROM nhacungcap
        INNER JOIN sach ON nhacungcap.idNCC = sach.idNCC
        INNER JOIN ctphieunhap ON sach.idSach = ctphieunhap.idSach
        INNER JOIN phieunhap ON ctphieunhap.idPN = phieunhap.idPN
        WHERE phieunhap.idPN = '.$id;
        return getOne(($sql));
    }

    function getDetailPhieuNhapByID($id){
        $sql = 
        'SELECT sach.idSach, tuasach, soluong, gianhap, giabia, (gianhap*soluong) AS thanhtien
        FROM ctphieunhap
        INNER JOIN sach ON ctphieunhap.idSach = sach.idSach
        WHERE idPN = '.$id;
        return getAll(($sql));
    }

    function updatePhieuNhapKho($id, $ngaycapnhat, $trangthai){
        $sql = 
        'UPDATE phieunhap
        SET ngaycapnhat= "'.$ngaycapnhat.'",
        trangthai = "'.$trangthai.'"
        WHERE idPN = '.$id;
        edit($sql);
    }

    function addNewphieunhapkho(){
        $sql=
        'INSERT INTO phieunhap(trangthai) 
        VALUE("cht")';
        insert($sql);
    }

    function getLastPhieuNhapKhoID(){
        $sql = 
        'SELECT idPN
        FROM phieunhap
        ORDER BY idPN DESC
        LIMIT 1';
        return getOne($sql);
    }

    function updatePhieuNhapKhoById($idPN, $ngaytao, $ngaycapnhat, $tongsoluong, $tongtien){
        $sql = 
        'UPDATE phieunhap
        SET ngaytao = "'.$ngaytao.'",
        ngaycapnhat = "'.$ngaycapnhat.'",
        tongsoluong= '.$tongsoluong.',
        tongtien = '.$tongtien.'
        WHERE idPN = '.$idPN;
        edit($sql);
    }

    function updatePhieuNhapKho_ngaycapnhat($idPN, $ngaycapnhat, $tongsoluong, $tongtien){
        $sql = 
        'UPDATE phieunhap
        SET ngaycapnhat = "'.$ngaycapnhat.'",
        tongsoluong= '.$tongsoluong.',
        tongtien = '.$tongtien.'
        WHERE idPN = '.$idPN;
        edit($sql);
    }
    /* Phieu nhap kho */

    /* Chi tiet phieu nhap kho */
    function addCTPhieuNhapKho($idPN, $idSach, $soluong, $gianhap){
        $sql=
        'INSERT INTO ctphieunhap(idPN, idSach, soluong, gianhap) 
        VALUES ('.$idPN.','.$idSach.','.$soluong.','.$gianhap.')';
        insert($sql);
    }

    function updateCTPhieuNhapKho($idPN, $idSach, $soluong, $gianhap){
        $sql = 
        'UPDATE ctphieunhap
        SET soluong = '.$soluong.',
        gianhap = '.$gianhap.'
        WHERE idPN = '.$idPN.'
        AND idSach = '.$idSach;
        edit($sql);
    }
    /* Chi tiet phieu nhap kho */
?>