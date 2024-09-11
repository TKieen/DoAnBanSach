<?php
    if(isset($_GET['idDH'])){
        $idDH = $_GET['idDH'];
        $idTK = $_SESSION['user']['id'];
        $customer = getOneCustomerById($idTK);
        $detail = getDetailOrderByIdDH($idDH);
        $order = getOrderByIdDH($idDH);
        $category = getAllCategory_KH();   
        require_once 'view/orderDetail.php';
    }
?>