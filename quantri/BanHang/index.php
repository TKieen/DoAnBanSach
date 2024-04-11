<?php
//not include controller
include '../../config/config.php';
include '../../lib/connect.php';
require '../model/customer.php';

include_once '../inc/header.php';
if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){
        case 'customer':
            $result = getAllCustomer();
            require_once '../view/customer.php';
            break;
        case 'TKDoanhThu':
            require_once '../view/TKDoanhThu.php';
            break;
        default:
        //require homepage
        $result = getAllCustomer();
        require_once '../view/customer.php';
        break;
    }
}
else{
    //require homepage
    $result = getAllCustomer();
    require_once '../view/customer.php';
}
include_once '../inc/footer_customer.php';
    
?>