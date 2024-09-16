<?php
include '../../lib/connect.php';
require '../model/supplier.php';

/* add-data */
if(isset($_POST['add_data_supplier'])){
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    // tinh
    $sql = "SELECT * FROM `provinces` WHERE `province_id` = ?";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param('i', $_POST['tinhdiachi']);
    $stmt->execute();
    $result = $stmt->get_result();

    $tinh = "";
    while ($row = $result->fetch_assoc()) {
        $tinh = $row['province_name'];
    }
    // quan
    $sql = "SELECT * FROM `districts` WHERE `district_id` = ?";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param('i', $_POST['huyendiachi']);
    $stmt->execute();
    $result = $stmt->get_result();

    $quan = "";
    while ($row = $result->fetch_assoc()) {
        $quan = $row['district_name'];
    }

    // xa, phuong
    $sql = "SELECT * FROM `wards` WHERE `ward_id` = ?";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param('i', $_POST['xaphuongdiachi']);
    $stmt->execute();
    $result = $stmt->get_result();

    $xaphuong = "";
    while ($row = $result->fetch_assoc()) {
        $xaphuong = $row['ward_name'];
    }

    $commaPos = strpos($_POST['diachi'], ',');

    if ($commaPos !== false) {
        $substring = substr($_POST['diachi'], 0, $commaPos);
    } else {
        // If no comma is found, return the entire string
        $substring = $_POST['diachi'];
    }
    $diachi = $substring.','.$xaphuong.','.$quan.','.$tinh;
    if(!isSupplierExist($ten, $email, $dienthoai, $diachi)){
        addSupplier($ten, $email, $dienthoai, $diachi);
        echo json_encode(array('success'=>true));
    }
    else echo json_encode(array('success'=>false));
}
/* add-data */

/* edit-data */
if(isset($_POST['edit_data_supplier'])){
    $result = getSupplierByID($_POST['supplier_id']);
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* edit-data */

/* update-data */
if(isset($_POST['update_data_supplier'])){
    $id = $_POST['supplier_id'];
    $trangthai = $_POST['trangthai'];
    editSupplier($id,$trangthai);
    echo json_encode(array('success'=>true));
}
/* update-data */

/* view-data */
if(isset($_POST['view_data_supplier'])){
    $result = getSupplierByID($_POST['supplier_id']);
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* view-data */

/* lock-data */
if(isset($_POST['lock_supplier'])){
    lockSupplier($_POST['supplier_id']);
    echo json_encode(array('success'=>true));
}
/* lock-data */

/* lock-data */
if(isset($_POST['unlock_supplier'])){
    unlockSupplier($_POST['supplier_id']);
    echo json_encode(array('success'=>true));
}
/* lock-data */
?>