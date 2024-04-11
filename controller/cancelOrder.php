<?php
    if(isset($_GET['idDH']) && isset($_POST['cancel'])){
        $idDH = $_GET['idDH'];
        orderCancelledByCustomer($idDH);
        $category = getAllCategory_KH();
        require_once 'view/orderCancel.php';
    }
?>