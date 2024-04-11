<?php
    // $sql = "SELECT * FROM taikhoan where idTK='".$_SESSION['user']['id']."' LIMIT 1";
    // $result = mysqli_query($conn, $sql);
    // $user_info = mysqli_fetch_array($result);
    //
        
    //
    // $result = getLimitProductBestSeller(12);
    // $category = getAllCategory_KH();
    // require_once "view/customerOrderDetail.php";

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