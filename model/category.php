<?php
function getAllCategory_KH(){
    $sql='select * from theloai where 1';
    $sql.=' and trangthai = 1';
    return getAll($sql);
}

function getCategoryById($id){
    $sql='select * from theloai where 1';
    $sql.=' and trangthai = 1';
    $sql.=' and idTL = '.$id;
    return getOne($sql);
}
function getAllResultAndCategory() {
    $result = getLimitProductBestSeller(12);
    $category = getAllCategory_KH();
}
?>