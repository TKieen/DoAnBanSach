<?php
    $total_price = totalPriceInCart();
    if(isset($_POST['orderSubmit']) && ($_POST['orderSubmit'])) {
        //lấy thông tin khách hàng từ form để tạo đơn hàng
        $diachinhan = $_POST['diachinhan'];
        $tongtien =  (int)$_POST['totalPrice'];

        //insert đơn hàng vào database
        $idTK = $_SESSION['user']['id'];
        $trangthai = "cho";
        $sql = "INSERT INTO donhang (idTK, diachigiao, tongtien, trangthai)
                VALUES (?, ?, ?, ?) 
        ";

        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
        if($prepareStmt) {  
            mysqli_stmt_bind_param($stmt, "ssss", $idTK, $diachinhan, $tongtien, $trangthai);
            mysqli_stmt_execute($stmt);
        }
        $orderID = mysqli_insert_id($conn);
    
        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) { 
            $idSach = (int)$_SESSION['cart'][$i][0];
            $soluong = (int)$_SESSION['cart'][$i][5];
            $dongia = (int)$_SESSION['cart'][$i][4];

            $sql = "INSERT INTO ctdonhang(idDH, idSach, soluong, gialucdat)
                VALUES (?, ?, ?, ?);
            ";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
            if($prepareStmt) {  
                mysqli_stmt_bind_param($stmt, "ssss", $orderID, $idSach, $soluong, $dongia);
                mysqli_stmt_execute($stmt);
            }
        } 
        unset($_SESSION['cart']);
        header("location:index.php?page=orderConfirm");
        
    }
    $result = getLimitProductBestSeller(12);
    $category = getAllCategory_KH();
    require_once "view/checkOut.php";
?>