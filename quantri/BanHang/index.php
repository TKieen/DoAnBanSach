<?php
include '../../lib/session.php';
include '../../lib/connect.php';
require '../model/customer.php';
require '../model/order.php';

$aside = "../inc/aside_banhang.php";
$quyentaikhoan = "Người bán";
if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){
        case 'order':
            $result = getAllOrder();
            $pageTitle = "order";
            require_once '../view/order.php';
            break;

        case 'searchOrder':
            $pageTitle = "searchOrder";
            if(isset($_POST['admin-controller-order'])){
                require_once '../controller/filterOrder.php';
            }
            else $result = $_SESSION['searchResult'];
            require_once '../view/order.php';
            break;

        case 'customer':
            $result = getAllCustomer();
            $pageTitle = "customer";
            require_once '../view/customer.php';
            break;

        case 'searchCustomer':
            $pageTitle = "searchCustomer";
            if(isset($_POST['admin-controller-customer'])){
                require_once '../controller/filterCustomer.php';
            }
            else $result = $_SESSION['searchResult'];
            require_once '../view/customer.php';
            break;   
        
        /* thong ke doanh thu */
        case 'tkdoanhthu':
            require_once '../view/tkdoanhthu.php';
            break;
        /* thong ke doanh thu */

        case 'editInfo':
            require_once "../controller/editInfo.php";
            break;     
            
        case 'signOut':
            admin_login_session_unset();
            header("Location:../index.php?page=home");
            break;
    
        default:
        //require homepage
        $result = getAllOrder();
        $pageTitle = "order";
        require_once '../view/order.php';
        break;
    }
}
else{
    //require homepage
    $result = getAllOrder();
    $pageTitle = "order";
    require_once '../view/order.php';
}

    
?>