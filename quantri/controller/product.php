<?php
include '../../lib/connect.php';
require '../model/product.php';
require '../model/supplier.php';
require '../model/category.php';
require '../model/discount.php';

/* add-data */
if(isset($_POST['add_data_product'])){
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
    if(isset($_POST['idNCC'])) $idNCC = $_POST['idNCC'];
    else $idNCC = $_POST['idNCC_hidden'];
    $giabia = $_POST['giabia'];
    $giaban = $giabia;
    $tacgia = $_POST['tacgia'];
    $namxb = $_POST['namxb'];
    $idTL = $_POST['idTL'];
    $mota = $_POST['mota'];
    if(!isProductExist($tuasach,$namxb, $tacgia, $giaban, $giabia, $idNCC, $nxb)){ 
        addProduct($picProfile, $tuasach, $tacgia, $nxb, $namxb, $idNCC, $giabia, $giaban, $idTL, $mota);
        echo json_encode(array('success'=>true));
    }
    else echo json_encode(array('success'=>false));
}
/* add-data */

/* edit-data */
if(isset($_POST['edit_data_product'])){
    $result = getProductByID($_POST['product_id']);
    $theloai = getTrangThaiCategoryByID($result['idTL']);
    $result['trangthaiTL'] = $theloai['trangthai'];
    $result['tenTL'] = $theloai['tenTL'];
    if($result['idMGG'] == NULL) $result['idMGG']=-1;

    //option for discount
    $options = "";
    $discount = null;
    if($result['idMGG']!=-1){
        $discount = getDiscountByID($result['idMGG']);
        extract($discount);
        $options .= '<option value="'.$idMGG.'">'.$phantram.'</option>';
    }
    else{
        $options = '<option value="-1">Không có</option>';
        $discount = getAllDiscountWaiting();
        foreach($discount as $item){
            extract($item);
            $options .= '<option value="'.$idMGG.'">'.$phantram.'</option>';
        }
    }
    
    $result['optionsMGG'] = $options;
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* edit-data */

/* update-data */
if(isset($_POST['update_data_product'])){
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
    $mota = $_POST['mota'];
    $idMGG = $_POST['idMGG'];
    if($idMGG == -1) $idMGG = NULL;
    $trangthai = $_POST['trangthai'];
    editProduct($id, $picProfile, $idMGG, $mota, $trangthai);
    echo json_encode(array('success'=>true));
    //  if(!isProductExist_update($id, $tuasach,$namxb)){
    //      editProduct($id, $picProfile, $tuasach, $tacgia, $nxb, $namxb, $giabia, $idTL, $idMGG, $mota, $trangthai);
    //      echo json_encode(array('success'=>true));
    //  }
    // else echo json_encode(array('success'=>false));
}
/* update-data */

/* view-data */
if(isset($_POST['view_data_product'])){
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

/* lock-data */
if(isset($_POST['lock_product'])){
    lockProduct($_POST['product_id']);
    echo json_encode(array('success'=>true));
}
/* lock-data */

/* lock-data */
if(isset($_POST['unlock_product'])){
    unlockProduct($_POST['product_id']);
    echo json_encode(array('success'=>true));
}
/* lock-data */

/* info-product */
if(isset($_POST['product_info'])){
    $result = getProductByID($_POST['product_id']);
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* info-product */

/* get_product_by_supplier */
if(isset($_POST['get_product_by_supplier'])){
    $result = getAllProductBySupplierID($_POST['supplier_id']);
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* get_product_by_supplier */


?>