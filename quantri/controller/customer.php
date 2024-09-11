<?php
include '../../lib/connect.php';
require '../model/customer.php';
require '../model/user.php';

/* add-data */
if(isset($_POST['add_data_customer'])){
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $p = $_POST['matkhau'];
    $p_hash = password_hash($p, PASSWORD_DEFAULT);
    if(!isExist($email, $dienthoai)){
        addUser($ten, $email, $dienthoai, "KH", $p_hash);
        echo json_encode(array('success'=>true));
    }
    else echo json_encode(array('success'=>false));
}
/* add-data */

/* edit-data */
if(isset($_POST['edit_data_customer'])){
    $result = getUserByID($_POST['user_id']);
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* edit-data */

/* update-data */
if(isset($_POST['update_data_customer'])){
    $id = $_POST['user_id'];
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $trangthai = $_POST['trangthai'];
    if(!isExist_update($id, $email, $dienthoai)){
        editUser($id,$ten,$email,$dienthoai,"KH",$trangthai);
        echo json_encode(array('success'=>true));
    }
    else echo json_encode(array('success'=>false));
}
/* update-data */

/* view-data */
if(isset($_POST['view_data_customer'])){
    $result = getUserByID($_POST['user_id']);
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* view-data */

/* lock-data */
if(isset($_POST['lock_customer'])){
    lockUser($_POST['user_id']);
    echo json_encode(array('success'=>true));
}
/* lock-data */

/* lock-data */
if(isset($_POST['unlock_customer'])){
    unlockUser($_POST['user_id']);
    echo json_encode(array('success'=>true));
}
/* lock-data */
?>