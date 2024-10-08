<?php
    if(isset($_GET['idSach'])){
        if (getProductByID($_GET['idSach']) != null) {
            $result = getProductById($_GET['idSach']);
            $tenTL = "";
            if(isset($_GET['idTL'])){
                $theloai = getCategoryById($_GET['idTL']);
                $tenTL = $theloai['tenTL'];
            }
            $category = getAllCategory_KH();   
            require_once 'view/productDetail.php';
        }
        else {
            echo '<script>alert("Sản phẩm không tồn tại")</script>';
            require "controller/home.php";
        }
    }
?>