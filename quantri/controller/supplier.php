<?php
include '../../lib/connect.php';
require '../model/supplier.php';

/* add-data */
if(isset($_POST['add_data_supplier'])){
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    if(!isSupplierExist($email, $dienthoai)){
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
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $trangthai = $_POST['trangthai'];
    if(!isSupplierExist_update($id,$email, $dienthoai)){
        editSupplier($id,$ten,$email,$dienthoai,$diachi,$trangthai);
        echo json_encode(array('success'=>true));
    }
    else echo json_encode(array('success'=>false));
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