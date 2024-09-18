<?php
    function getAllOrder(){
        $sql='SELECT idDH, tenTK, ngaytao, ngaycapnhat, tongtien, donhang.trangthai
        FROM donhang INNER JOIN taikhoan ON donhang.idTK = taikhoan.idTK 
        ORDER BY idDH';
        return getAll($sql);
    }

    function getOrderByID($id){
        $sql = 'SELECT donhang.idDH, taikhoan.idTK, tenTK, dienthoai, diachigiao, ngaytao, ngaycapnhat, SUM(soluong) AS tongsanpham, tongtien, donhang.trangthai AS trangthai, idNV
        FROM donhang INNER JOIN taikhoan ON donhang.idTK = taikhoan.idTK
        INNER JOIN ctdonhang ON ctdonhang.idDH = donhang.idDH
        WHERE donhang.idDH='.$id;
        return getOne($sql);
    }

    function getOrderDetailByID($id){
        $sql = 'SELECT sach.idSach, tonkho, tuasach, soluong, gialucdat, (soluong*gialucdat) AS thanhtien
        FROM ctdonhang
        INNER JOIN sach ON ctdonhang.idSach = sach.idSach
        WHERE idDH='.$id;
        return getALL($sql);
    }

    function editOrder($id,$trangthai,$ngaycapnhat, $idNV){
        $sql = 
        'UPDATE donhang
        SET trangthai = "'.$trangthai.'",
        ngaycapnhat = "'.$ngaycapnhat.'",
        idNV = '.$idNV.'
        WHERE idDH = '.$id;
        edit($sql);
    }
?>