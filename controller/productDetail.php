<?php
    if(isset($_GET['idSach'])){
        $result = getProductById($_GET['idSach']);
        $tenTL = "";
        if(isset($_GET['idTL'])){
            $theloai = getCategoryById($_GET['idTL']);
            $tenTL = $theloai['tenTL'];
        }
        $category = getAllCategory_KH();   
        require_once 'view/productDetail.php';
    }
?>