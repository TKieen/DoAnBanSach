<?php
    $idTK = $_SESSION['user']['id'];
    $result = getOrderByIdTK($idTK);
    $category = getAllCategory_KH();  
    if($result == null) require_once 'view/noOrder.php';
    else require_once 'view/order.php';
?>