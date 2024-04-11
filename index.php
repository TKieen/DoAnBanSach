<?php
include 'config/config.php';
include 'lib/connect.php';
require 'model/product.php';
require 'model/category.php';
require 'model/order.php';
require 'model/cart.php';
include 'lib/session.php';
require "model/customer.php";

if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){
        case 'home':
            require "controller/home.php";
            break;

        case 'search':
            require_once "controller/search.php";
            break;

        case 'filter':
            require_once "controller/filter.php";
            break;
        
        case 'productDetail':
            require_once "controller/productDetail.php";
            break;

        case 'order':
            require_once "controller/order.php";
            break;

        case 'orderDetail':
            require_once "controller/orderDetail.php";
            break;

        case 'cancelOrder':
            require_once "controller/cancelOrder.php";
            break;
        
        case 'signIn':
            require_once "controller/signIn.php";
            break;

        case 'signUp':
            require_once "controller/signUp.php";
            break;

        case 'signOut':
            require_once "controller/signOut.php";
            break;

        case "forgotPassword1":
            require_once "controller/forgotPassword1.php";
            break;
            
        case 'forgotPassword2':
            require_once "controller/forgotPassword2.php";
            break;
        case 'forgotPassword3':
            require_once "controller/forgotPassword3.php";
            break;

        case 'customerInfo':
            require_once "controller/customerInfo.php";
            break;
            
        case 'customerOrders':
            require_once "controller/customerOrders.php";
            break;

        case 'customerOrderDetail':
            require_once "controller/customerOrderDetail.php";
            break;

        case 'cart':
            $category = getAllCategory_KH();
            require_once "view/cart.php";
            break;
        
        case 'delcart':
            require_once "controller/cart.php";
            break;

        case 'addToCart':
            require_once "controller/addToCart.php";
            break;

        case 'checkOut':
            require_once "controller/checkOut.php";
            break;
        
        case 'orderHandler':
            require_once "controller/orderHandler.php";
            break;

        case 'orderConfirm':
            require_once "controller/orderConfirm.php";
            break;

        default:
            require "controller/home.php";
            break;
    }
}
else{
    header("Location:index.php?page=home");
}
?>