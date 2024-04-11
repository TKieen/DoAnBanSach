<?php
//not include controller
include '../../config/config.php';
include '../../lib/connect.php';
require '../model/supplier.php';
require '../model/discount.php';
require '../model/category.php';
require '../model/product.php';
require '../../lib/session.php';


if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){
        case 'supplier':
            $tb = ""; //thong bao loi
            $result = getAllSupplier();
            require_once '../view/supplier.php';
            break;

        case 'discount':
            $result = getAllDiscount();
            require_once '../view/discount.php';
            break;

        case 'category':
            $result = getAllCategory();
            require_once '../view/category.php';
            break;

        case 'product':
            $result = getAllProduct();
            require_once '../view/product.php';
            break;

        default:
        //require homepage
        $result = getAllSupplier();
        require_once '../view/discount.php';
        break;
    }
}
else{
    //require homepage
    $result = getAllSupplier();
    require_once '../view/discount.php';
}

    
?>