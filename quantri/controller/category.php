<?php
include '../../lib/connect.php';
require '../model/category.php';

/* add-data */
if(isset($_POST['add_data_category'])){
    $tenTL = $_POST['tenTL'];
    if(!isCategoryExist($tenTL)){
        addCategory($tenTL);
        echo json_encode(array('success'=>true));
    }
    else echo json_encode(array('success'=>false));
}
/* add-data */

/* edit-data */
if(isset($_POST['edit_data_category'])){
    $result = getCategoryByID($_POST['category_id']);
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* edit-data */

/* update-data */
if(isset($_POST['update_data_category'])){
    $id = $_POST['category_id'];
    $tenTL = $_POST['tenTL'];
    $trangthai = $_POST['trangthai'];
    if(!isCategoryExist_update($id, $tenTL)){
        editCategory($id,$tenTL, $trangthai);
        echo json_encode(array('success'=>true));
    } 
    else echo json_encode(array('success'=>false));
}
/* update-data */

/* lock-data */
if(isset($_POST['lock_category'])){
    lockCategory($_POST['category_id']);
    echo json_encode(array('success'=>true));
}
/* lock-data */

/* lock-data */
if(isset($_POST['unlock_category'])){
    unlockCategory($_POST['category_id']);
    echo json_encode(array('success'=>true));
}
/* lock-data */
?>