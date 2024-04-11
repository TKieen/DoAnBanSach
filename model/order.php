<?php
function getOneOrderByIdTK($idTK){
    $sql=
    'select donhang.trangthai as trangthaiDH, sach.trangthai as trangthaiSach, hinhanh, donhang.idDH as idDonHang, 
    tuasach, tacgia, soluong, gialucdat, tongtien 
    from donhang inner join CTdonhang on donhang.idDH = CTdonhang.idDH
    inner join sach on CTdonhang.idSach = sach.idSach where 1';
    $sql.=' and idTK = '.$idTK;
    $sql.=' and sach.trangthai != 0';
    return getOne($sql);
}

function getDetailOrderByIdDH($idDH){
    $sql = 'SELECT sach.trangthai AS trangthaiSach, hinhanh,';
    $sql .= ' sach.idSach AS idSH, tuasach, tacgia, soluong, gialucdat';
    $sql .= ' FROM ((SELECT * FROM donhang WHERE 1';
    $sql .= ' and idDH = '.$idDH;
    $sql .= ' ) AS `order`';
    $sql .= ' INNER JOIN CTdonhang ON `order`.idDH = CTdonhang.idDH';
    $sql .= ' INNER JOIN sach ON CTdonhang.idSach = sach.idSach)';
    return getAll($sql);
}

function getOrderByIdDH($idDH){
    $sql = 'SELECT * FROM donhang WHERE idDH = '.$idDH;
    return getOne($sql);
}

function orderCancelledByCustomer($idDH){
    // cap nhat trang thai don hang
    $sql = 
        'UPDATE donhang 
        SET trangthai = "huykh"
        WHERE idDH = '.$idDH;
        edit($sql);
}

function lastOrderID(){
    $sql = "SELECT idDH FROM donhang ORDER BY idDH DESC LIMIT 1";
    return getOne($sql);
}

// huong
function createOrder($diachi, $tongtien, $ngaytao, $ngaycapnhat) {
    // Chỉnh sửa: thay đổi dữ liệu idTK
    $sql = "INSERT INTO donhang (idTK, diachigiao, tongtien, trangthai, ngaytao, ngaycapnhat)
            VALUES  (1, '$diachi', $tongtien, 'cho', '$ngaytao', '$ngaycapnhat')
    ";
    insert($sql);

    $orderID = lastOrderID();

    return $orderID['idDH'];
}

function createOrderDetail($orderId, $idSach, $soLuong, $donGia) {
    $sql = "INSERT INTO ctdonhang(idDH, idSach, soluong, gialucdat)
            VALUES ($orderId, $idSach, $soLuong, $donGia);
    ";
    insert($sql);
}

function updateOrderDetail_tonkho($idSach, $soluong){
    $sql =
    'UPDATE sach 
    SET tonkho = tonkho - '.$soluong.'
    WHERE idSach = '.$idSach;
    edit($sql);
}

function updateOrder_tongsanpham($idDH, $tongsanpham){
    $sql =
    'UPDATE donhang
    SET tongsanpham = '.$tongsanpham.'
    WHERE idDH = '.$idDH;
    edit($sql);
}
?>