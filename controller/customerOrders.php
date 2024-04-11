<?php
    // $result = getLimitProductBestSeller(12);
    // $category = getAllCategory_KH();
    // require_once "view/customerOrders.php";

    $idTK = $_SESSION['user']['id'];
    $result = getOneOrderByIdTK($idTK);
    $category = getAllCategory_KH();   
    require_once 'view/order.php';
?>