<?php
include '../../lib/connect.php';
require '../model/discount.php';

/* add-data */
if(isset($_POST['add_data_discount'])){
    $phantram = $_POST['phantram'];
    $ngaybatdau = $_POST['ngaybatdau'];
    $ngayketthuc = $_POST['ngayketthuc'];
    if(!isDiscountExist($phantram, $ngaybatdau, $ngayketthuc)){
        // Current date
        $currentDate = date('Y-m-d');

        // Convert strings to DateTime objects
        $currentDateTime = new DateTime($currentDate);
        $dateToCompareDateTime = new DateTime($ngaybatdau);

        // Compare dates
        addDiscount($phantram, $ngaybatdau, $ngayketthuc, "cdr");
        echo json_encode(array('success'=>true));
    }
    else echo json_encode(array('success'=>false));
}
/* add-data */

/* edit-data */
if(isset($_POST['edit_data_discount'])){
    $result = getDiscountByID($_POST['discount_id']);
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* edit-data */

/* update-data */
if(isset($_POST['update_data_discount'])){
    $id = $_POST['discount_id'];
    $phantram = $_POST['phantram'];
    $ngaybatdau = $_POST['ngaybatdau'];
    $ngayketthuc = $_POST['ngayketthuc'];
    if(!isDiscountExist($phantram, $ngaybatdau, $ngayketthuc)){
        // Current date
        $currentDate = date('Y-m-d');

        // Convert strings to DateTime objects
        $currentDateTime = new DateTime($currentDate);
        $dateToCompareDateTime = new DateTime($ngaybatdau);

        // Compare dates
        if ($currentDateTime == $dateToCompareDateTime) {
            editDiscount($id,$phantram, $ngaybatdau, $ngayketthuc, "hd");
        } else {
            editDiscount($id,$phantram, $ngaybatdau, $ngayketthuc, "cdr");
        }
        echo json_encode(array('success'=>true));
    }
    else echo json_encode(array('success'=>false));
}
/* update-data */

/* lock-data */
if(isset($_POST['lock_discount'])){
    lockDiscount($_POST['discount_id']);
    echo json_encode(array('success'=>true));
}
/* lock-data */

?>