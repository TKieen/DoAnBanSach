<?php
include '../lib/connect.php';
require_once "../lib/session.php";
require '../model/product.php';

    if(!empty($_SESSION['user']['id'])) {
        if(isset($_POST['addToCart'])) {
        // kiem tra asyncronus ton kho
            $id = $_POST['idSach'];
            $ketqua = getTonKhoByID($id);
            if($ketqua['tonkho'] <= 0){
                echo json_encode(['success' => false, 'direct' => false]);
                return;
            }

            $img = $_POST['img'];
            $name = $_POST['name'];
            $originalPrice = $_POST['originalPrice'];
            $salePrice = $_POST['salePrice'];
            //Nếu trong trang productDetail có input để nhập số lượng sản phẩm
            if(isset($_POST['qty']) && ($_POST['qty'] > 0)) {
                $qty = $_POST['qty'];
            }
            else {
                $qty = 1;
            }
            $isExists = 0;
            
            // $tmp = array(2, "book878.jpg", "Đám Trẻ Ở Đại Dương Đen", 150000, 135000, 1);
            // array_push($_SESSION['cart'], $tmp);

            //Kiểm tra sản phẩm có tồn tại trong giỏ hàng hay không?
            //Nếu có thì chỉ cập nhật lại số lượng
            $i = 0;
            if(!empty($_SESSION['cart']))
                foreach ($_SESSION['cart'] as $item) {
                    if($item[2] === $name) {    //Chỉnh sửa: so sánh id thay vì tên
                        //cập nhật trực tiếp trên giỏ hàng
                        $qty_new = $qty + $item[5];
                        $_SESSION['cart'][$i][5] = $qty_new;
                        $isExists = 1;
                        break;
                    }
                    $i++;
                }
            //Nếu không thì thêm một sản phẩm mới
            if($isExists == 0) {
                $product = array($id, $img, $name, $originalPrice, $salePrice, $qty);
                if(!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = array();
                }
                array_push($_SESSION['cart'], $product);
            }
            
            echo json_encode(['success' => true]);
        }
    }
    else {
        echo json_encode(['success' => false, 'direct' => true]);
    }
?>