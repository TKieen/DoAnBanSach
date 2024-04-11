<?php
include '../../config/config.php';
include '../../lib/connect.php';
require '../model/discount.php';

/* add-data */
if(isset($_POST['add_data'])){
    $phantram = $_POST['phantram'];
    $ngaybatdau = $_POST['ngaybatdau'];
    $ngayketthuc = $_POST['ngayketthuc'];
    if(!isDiscountExist($phantram, $ngaybatdau, $ngayketthuc)){
        addDiscount($phantram, $ngaybatdau, $ngayketthuc);
        echo json_encode(array('success'=>true));
    }
    else echo json_encode(array('success'=>false));
}
/* add-data */

/* edit-data */
if(isset($_POST['edit_data'])){
    $result = getDiscountByID($_POST['discount_id']);
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* edit-data */

/* update-data */
if(isset($_POST['update_data'])){
    $id = $_POST['discount_id'];
    $phantram = $_POST['phantram'];
    $ngaybatdau = $_POST['ngaybatdau'];
    $ngayketthuc = $_POST['ngayketthuc'];
    $trangthai = $_POST['trangthai'];
    editDiscount($id,$phantram, $ngaybatdau, $ngayketthuc, $trangthai);
    echo json_encode(array('success'=>true));
}
/* update-data */

?>