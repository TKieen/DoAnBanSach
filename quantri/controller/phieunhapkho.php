<?php
include '../../lib/connect.php';
require '../model/phieunhapkho.php';
require '../model/product.php';
require '../model/supplier.php';

/* open - add phieunhapkho popupform*/
if(isset($_POST['open_phieunhapkho'])){
    $result = getAllSupplierActive();
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* open - add phieunhapkho popupform*/

/* add inventory */
if(isset($_POST['add_inventory_form_btn'])){
    $ngaytao = $_POST['ngaytao'];
    $ngaycapnhat = $_POST['ngaycapnhat'];
    addNewphieunhapkho();
    $idPN = getLastPhieuNhapKhoID()['idPN'];
    // so san pham
    $n = count($_POST['product']);
    $tongtien = 0;
    $tongsoluong = 0;
    $thanhtien_arr = [];

    for($i=1; $i<$n; $i++){
        $thanhtien = 0;
        $idSach = $_POST['product'][$i];
        $soluong = $_POST['soluong'][$i];
        $tongsoluong+=$soluong;
        $gianhap = $_POST['gianhap'][$i];
        $thanhtien = $gianhap * $soluong;
        $thanhtien_arr[] = $thanhtien;
        $tongtien+=$thanhtien;
        addCTPhieuNhapKho($idPN, $idSach, $soluong, $gianhap);
    }
    updatePhieuNhapKhoById($idPN, $ngaytao, $ngaycapnhat, $tongsoluong, $tongtien, "cht");

    // tong so luong
    // thanh tien
    // tong tien
    $result = [
        'success' => true,
        'tongsoluong' => $tongsoluong,
        'tongtien' => $tongtien,
        'thanhtien_arr' => $thanhtien_arr
    ];
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* add inventory */

/* update  button */
if(isset($_POST['update_btn'])){
    $n = count($_POST['product']);
    $tongtien = 0;
    $tongsoluong = 0;
    $thanhtien_arr = [];
    $idPN = $_POST['idPN'];

    for($i=0; $i<$n; $i++){
        $thanhtien = 0;
        $idSach = $_POST['product'][$i];
        $soluong = $_POST['soluong'][$i];
        $tongsoluong+=$soluong;
        $gianhap = $_POST['gianhap'][$i];
        $thanhtien = $gianhap * $soluong;
        $thanhtien_arr[] = $thanhtien;
        $tongtien+=$thanhtien;
        updateCTPhieuNhapKho($idPN, $idSach, $soluong, $gianhap);
    }
    updatePhieuNhapKho_ngaycapnhat($idPN,  date("Y-m-d"), $tongsoluong, $tongtien);
    $result = [
        'success' => true,
        'tongsoluong' => $tongsoluong,
        'tongtien' => $tongtien,
        'thanhtien_arr' => $thanhtien_arr,
        'ngaycapnhat' => date("Y-m-d")
    ];
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* update  button */

/* complete button*/
if(isset($_POST['complete_btn'])){
    updatePhieuNhapKho($_POST['idPN'], date("Y-m-d"),"ht");
    echo json_encode(array('success'=>true));
}
/* complete button*/

/* cancel button*/
if(isset($_POST['cancel_btn'])){
    updatePhieuNhapKho($_POST['idPN'], date("Y-m-d"),"huy");
    echo json_encode(array('success'=>true));
}
/* cancel button*/

/* search-product */
if(isset($_POST['search_product'])){
    $result = searchProduct($_POST['search_input']);
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}

?>