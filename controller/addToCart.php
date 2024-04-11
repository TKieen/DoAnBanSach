<?php
    if(!empty($_SESSION['user']['id'])) {
        if(isset($_POST['addToCart'])) {
            $id = $_POST['idSach'];
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
            
            header("Location:index.php?page=cart");
        }
    }
    else {
        header("Location:index.php?page=signIn");
        echo "<script>alert('Hãy đăng nhập để có thể mua hàng')</script>";
    }
?>