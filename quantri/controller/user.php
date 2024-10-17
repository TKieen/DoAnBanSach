<?php
include '../../lib/connect.php';
require '../model/user.php';

require 'userValidation.php';

/* add-data */
if(isset($_POST['add_data_user'])){
    $name = htmlspecialchars($_POST['ten']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['dienthoai']);
    $role = htmlspecialchars($_POST['phanquyen']);
    $password = htmlspecialchars($_POST['matkhau']);
    
    try {
        validateName($name);
        validateEmail($email);
        validatePassword($password);
        validatePhone($phone);
        validateRole($role);
    } catch (Exception $e) {
        echo json_encode(['success'=>false, 'message'=>$e->getMessage()]);
        return;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    if (isExist($email, $phone)) {
        echo json_encode(array('success'=>false, 'message'=>"Người này đã tồn tại do trùng email hoặc số điện thoại"));
        return;
    }
    addUser($name, $email, $phone, $role, $hashedPassword);
    echo json_encode(array('success'=>true));
}
/* add-data */

/* edit-data */
if(isset($_POST['edit_data_user'])){
    $result = getUserByID($_POST['user_id']);
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* edit-data */

/* update-data */
if(isset($_POST['update_data_user'])){
    $id = $_POST['user_id'];
    $email = $_POST['email'];
    $phanquyen = $_POST['phanquyen'];
    $trangthai = $_POST['trangthai'];
    if(!isExist_update($id, $email)){
        editUser($id,$email,$phanquyen,$trangthai);
        echo json_encode(array('success'=>true));
    }
    else echo json_encode(array('success'=>false));
}
/* update-data */

/* view-data */
if(isset($_POST['view_data_user'])){
    $result = getUserByID($_POST['user_id']);
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* view-data */

/* lock-data */
if(isset($_POST['lock_user'])){
    lockUser($_POST['user_id']);
    echo json_encode(array('success'=>true));
}
/* lock-data */

/* unlock-data */
if(isset($_POST['unlock_user'])){
    unlockUser($_POST['user_id']);
    echo json_encode(array('success'=>true));
}
/* unlock-data */