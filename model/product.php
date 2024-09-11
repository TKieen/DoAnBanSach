<?php
function getAllProductBestSeller(){
    $sql='select * from sach where 1';
    $sql.=' and tonkho > 0';
    $sql.=' and luotban > 0';
    $sql.=' and trangthai = 1';
    $sql.=' order by luotban DESC';
    return getAll($sql);
}

function getProductById($id){
    $sql='select * from sach where idSach = '.$id;
    return getOne($sql);
}

function getLimitProductBestSeller($n){
    $sql='select * from sach where 1';
    $sql.=' and tonkho > 0';
    $sql.=' and luotban > 0';
    $sql.=' and trangthai = 1';
    $sql.=' order by luotban DESC';
    $sql.=' limit '.$n;
    return getAll($sql);
}

function getAllProductByCategory($idTL){
    $sql='select * from sach where 1';
    $sql.=' and tonkho > 0';
    $sql.=' and trangthai = 1';
    $sql.=' and idTL = '.$idTL;
    $sql.=' order by luotban DESC';
    return getAll($sql);
}

function searchProduct($kyw){
    $sql='select * from sach where 1';
    $sql.=' and tonkho > 0';
    $sql.=' and trangthai = 1';
    $sql.=' and (tuasach like "%'.$kyw.'%"';
    $sql.=' or tacgia like "%'.$kyw.'%")';
    $sql.=' order by luotban DESC';
    return getAll($sql);
}

function filterProductByKeyword($thingToSearchVal, $minPrice, $maxPrice){
    $sql='select * from sach where 1';
    $sql.=' and tonkho > 0';
    $sql.=' and trangthai = 1';
    $sql.=' and giaban >= '.$minPrice;
    $sql.=' and giaban <= '.$maxPrice;
    $sql.=' and (tuasach like "%'.$thingToSearchVal.'%"';
    $sql.=' or tacgia like "%'.$thingToSearchVal.'%")';
    $sql.=' order by giaban ASC';
    return getAll($sql);
}

function filterBestsellerProduct($minPrice, $maxPrice){
    $sql='select * from sach where 1';
    $sql.=' and tonkho > 0';
    $sql.=' and luotban > 0';
    $sql.=' and trangthai = 1';
    $sql.=' and giaban >= '.$minPrice;
    $sql.=' and giaban <= '.$maxPrice;
    $sql.=' order by giaban ASC';
    return getAll($sql);
}

function filterCategoryProduct($thingToSearchVal, $minPrice, $maxPrice){
    $sql='select * from sach where 1';
    $sql.=' and tonkho > 0';
    $sql.=' and trangthai = 1';
    $sql.=' and idTL = '.$thingToSearchVal;
    $sql.=' and giaban >= '.$minPrice;
    $sql.=' and giaban <= '.$maxPrice;
    $sql.=' order by giaban ASC';
    return getAll($sql);
}

function getTonKhoByID($id){
    $sql = 'SELECT tonkho FROM sach WHERE idSach='.$id;
    return getOne($sql);
}
?>