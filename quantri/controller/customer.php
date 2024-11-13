<?php
include '../../lib/connect.php';
require '../model/customer.php';
require '../model/user.php';

/* add-data */
if(isset($_POST['add_data_customer'])){
    $name = htmlspecialchars($_POST['ten']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['dienthoai']);
    $password = htmlspecialchars($_POST['matkhau']);

    try {
        validateName($name);
        validateEmail($email);
        validatePassword($password);
        validatePhone($phone);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        if (isExist($email, $phone)) {
            echo json_encode(array('success'=>false, 'message'=>"Người này đã tồn tại do trùng email hoặc số điện thoại"));
            return;
        }
        addUser($name, $email, $phone, "KH", $hashedPassword);
        echo json_encode(array('success'=>true));
    } catch (Exception $e) {
        echo json_encode(['success'=>false, 'message'=>$e->getMessage()]);
        return;
    }
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
    $id = htmlspecialchars($_POST['user_id']);
    $name = htmlspecialchars($_POST['ten']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['dienthoai']);
    $status = htmlspecialchars($_POST['trangthai']);
    try {
        validateName($name);
        validateEmail($email);
        validatePhone($phone);
    } catch (Exception $e) {
        echo json_encode(['success'=>false, 'message'=>$e->getMessage()]);
        return;
    }
    if(!isExist_update($id, $email, $phone)){
        editUser($id,$name,$email,$phone,"KH",$status);
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