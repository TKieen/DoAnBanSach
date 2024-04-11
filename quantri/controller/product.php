<?php
include '../../config/config.php';
include '../../lib/connect.php';
require '../model/product.php';
require '../model/supplier.php';
require '../model/category.php';
require '../model/discount.php';

/* add-data */
if(isset($_POST['add_data'])){
    //avata
    $images = $_FILES['input_file']['name'];
    $tmp_dir = $_FILES['input_file']['tmp_name'];
    $imageSize = $_FILES['input_file']['size'];

    if($imageSize===0){
        $picProfile="product.png";
    }
    else{
    $upload_dir='../../uploads/uploads_product/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
    $picProfile = rand(1000, 1000000).'.'.$imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
    }

    $tuasach = $_POST['tuasach'];
    $nxb = $_POST['nxb'];
    $idNCC = $_POST['idNCC'];
    $giabia = $_POST['giabia'];
    $tacgia = $_POST['tacgia'];
    $namxb = $_POST['namxb'];
    $giaban = $_POST['giaban'];
    $idTL = $_POST['idTL'];
    $mota = $_POST['mota'];
    if(!isProductExist($tuasach, $tacgia, $nxb, $namxb)){
        addProduct($picProfile, $tuasach, $tacgia, $nxb, $namxb, $idNCC, $giabia, $giaban, $idTL, $mota);
        echo json_encode(array('success'=>true));
    }
    else echo json_encode(array('success'=>false));
}
/* add-data */

/* edit-data */
if(isset($_POST['edit_data'])){
    $result = getProductByID($_POST['product_id']);
    if($result['idMGG'] == NULL) $result['idMGG']=-1;
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* edit-data */

/* update-data */
if(isset($_POST['update_data'])){
    //avata
    $images = $_FILES['input_file']['name'];
    $tmp_dir = $_FILES['input_file']['tmp_name'];
    $imageSize = $_FILES['input_file']['size'];

    if($imageSize===0){ //khong thay doi
        $picProfile=$_POST['curr_img'];
    }
    else{
        $upload_dir='../../uploads/uploads_product/';
        $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
        $picProfile = rand(1000, 1000000).'.'.$imgExt;
        move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
    }
    $id = $_POST['product_id'];
    $tuasach = $_POST['tuasach'];
    $nxb = $_POST['nxb'];
    $idNCC = $_POST['idNCC'];
    $giabia = $_POST['giabia'];
    $giaban = $_POST['giaban'];
    $tacgia = $_POST['tacgia'];
    $namxb = $_POST['namxb'];
    $idTL = $_POST['idTL'];
    $mota = $_POST['mota'];
    $idMGG = $_POST['idMGG'];
    if($idMGG == -1) $idMGG = NULL;
    $trangthai = $_POST['trangthai'];
    editProduct($id, $picProfile, $tuasach, $tacgia, $nxb, $namxb, $idNCC, $giabia, $giaban, $idTL, $idMGG, $mota, $trangthai);
    echo json_encode(array('success'=>true));
}
/* update-data */

/* view-data */
if(isset($_POST['view_data'])){
    $result = getProductByID($_POST['product_id']);

    // tenNCC
    $nhacungcap = getSupplierName($result['idNCC']);
    $result['idNCC'] =  $nhacungcap['tenNCC'];

    // tenTL
    $theloai = getCategoryName($result['idTL']);
    $result['idTL'] =  $theloai['tenTL'];

    // tenMGG
    $idMGG = $result['idMGG'];
    if($idMGG !== null){
        $magiamgia = getDiscountName($idMGG);
        $result['idMGG'] =  $magiamgia['phantram'];
    }
    else $result['idMGG'] = 'Không có';
        
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* view-data */

?>