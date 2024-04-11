<?php
    $idTK = 1;
    $result = getOneOrderByIdTK($idTK);
    $category = getAllCategory_KH();   
    require_once 'view/order.php';
?>