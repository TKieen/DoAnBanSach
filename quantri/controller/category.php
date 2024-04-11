<?php
include '../../config/config.php';
include '../../lib/connect.php';
require '../model/category.php';

/* add-data */
if(isset($_POST['add_data'])){
    $tenTL = $_POST['tenTL'];
    if(!isCategoryExist($tenTL)){
        addCategory($tenTL);
        echo json_encode(array('success'=>true));
    }
    else echo json_encode(array('success'=>false));
}
/* add-data */

/* edit-data */
if(isset($_POST['edit_data'])){
    $result = getCategoryByID($_POST['category_id']);
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* edit-data */

/* update-data */
if(isset($_POST['update_data'])){
    $id = $_POST['category_id'];
    $tenTL = $_POST['tenTL'];
    $trangthai = $_POST['trangthai'];
    editCategory($id,$tenTL, $trangthai);
    echo json_encode(array('success'=>true));
}
/* update-data */

?>