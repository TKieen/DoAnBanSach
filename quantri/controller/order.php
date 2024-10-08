<?php
include '../../lib/connect.php';
require '../model/order.php';

/* edit-data */
if(isset($_POST['edit_data_order'])){
    $donhang = getOrderByID($_POST['order_id']);
    $ctdonhang = getOrderDetailByID($_POST['order_id']);

    $result = array(
        'order_info' => $donhang,
        'order_details' => $ctdonhang
    );

    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* edit-data */

/* update-data */
if(isset($_POST['update_data_order'])){
    $id = $_POST['order_id'];
    $trangthai = $_POST['trangthai'];
    $idNV = $_POST['idNV_update'];

    // Fetch current "trangthai" value from the database
    $currentOrder = getOrderByID($id);
    if($currentOrder['trangthai'] == $trangthai){
        echo json_encode(array('success'=>false, 'message'=>'Trạng thái không thay đổi'));
    } else {
        editOrder($id,$trangthai,date("Y-m-d"), $idNV);
        echo json_encode(array('success'=>true));
    }
}
/* update-data */

/* view-data */
if(isset($_POST['view_data_order'])){
    $donhang = getOrderByID($_POST['order_id']);

    $ctdonhang = getOrderDetailByID($_POST['order_id']);

    $result = array(
        'order_info' => $donhang,
        'order_details' => $ctdonhang
    );

    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* view-data */

?>