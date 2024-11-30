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
        'SELECT DISTINCT phieunhap.idPN, nhacungcap.tenNCC,chietkhau, nhacungcap.idNCC, tongtien, tongsoluong, ngaytao, ngaycapnhat, phieunhap.trangthai, idNV
        FROM nhacungcap
        INNER JOIN sach ON nhacungcap.idNCC = sach.idNCC
        INNER JOIN ctphieunhap ON sach.idSach = ctphieunhap.idSach
        INNER JOIN phieunhap ON ctphieunhap.idPN = phieunhap.idPN
        WHERE phieunhap.idPN = '.$id;
        return getOne(($sql));
    }

    function getDetailPhieuNhapByID($id){
        $sql = 
        'SELECT sach.idSach, tuasach, soluong, giabia, (((100-chietkhau)/100)*giabia*soluong) AS thanhtien
        FROM phieunhap
        INNER JOIN ctphieunhap ON phieunhap.idPN = ctphieunhap.idPN
        INNER JOIN sach ON ctphieunhap.idSach = sach.idSach
        WHERE ctphieunhap.idPN = '.$id;
        return getAll(($sql));
    }

    function updatePhieuNhapKho($id, $ngaycapnhat, $trangthai, $idNV){
        $sql = 
        'UPDATE phieunhap
        SET ngaycapnhat= "'.$ngaycapnhat.'",
        trangthai = "'.$trangthai.'",
        idNV = '.$idNV.'
        WHERE idPN = '.$id;
        edit($sql);
    }

    function addNewphieunhapkho($idNV){
        $sql=
        'INSERT INTO phieunhap(idNV, trangthai) 
        VALUE('.$idNV.', "cht")';
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

    function updatePhieuNhapKhoById($idPN, $ngaytao, $ngaycapnhat, $chietkhau, $tongsoluong, $tongtien){
        $sql = 
        'UPDATE phieunhap
        SET ngaytao = "'.$ngaytao.'",
        ngaycapnhat = "'.$ngaycapnhat.'",
        chietkhau = '.$chietkhau.',
        tongsoluong= '.$tongsoluong.',
        tongtien = '.$tongtien.'
        WHERE idPN = '.$idPN;
        edit($sql);
    }

    function updatePhieuNhapKho_ngaycapnhat($idPN, $ngaycapnhat, $idNV, $tongsoluong, $tongtien){
        $sql = 
        'UPDATE phieunhap
        SET ngaycapnhat = "'.$ngaycapnhat.'",
        idNV = '.$idNV.',
        tongsoluong= '.$tongsoluong.',
        tongtien = '.$tongtien.'
        WHERE idPN = '.$idPN;
        edit($sql);
    }
    /* Phieu nhap kho */

    /* Chi tiet phieu nhap kho */
    function addCTPhieuNhapKho($idPN, $idSach, $soluong){
        $sql=
        'INSERT INTO ctphieunhap(idPN, idSach, soluong) 
        VALUES ('.$idPN.','.$idSach.','.$soluong.')';
        try {
        insert($sql);
        return true;
        } catch(Exception $e){
            return false;
        }
    }

    function updateCTPhieuNhapKho($idPN, $idSach, $soluong){
        $sql = 
        'UPDATE ctphieunhap
        SET soluong = '.$soluong.'
        WHERE idPN = '.$idPN.'
        AND idSach = '.$idSach;
        edit($sql);
    }
    /* Chi tiet phieu nhap kho */

    function deletePhieuNhapKho($idPN){
        $sql = 'DELETE FROM ctphieunhap WHERE idPN = '.$idPN;
        delete($sql);
        $sql = 'DELETE FROM phieunhap WHERE idPN ='.$idPN;
        delete($sql);
    }
?>