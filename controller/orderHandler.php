<?php
    require "model\location.php";
    if(isset($_POST['orderSubmit']) && ($_POST['orderSubmit'])) {
        //lấy thông tin khách hàng từ form để tạo đơn hàng
        $tinh = getProvinceNameById($_POST['tinhdiachi']);

        // Truy vấn để lấy tên của quận/huyện dựa trên huyen_id
        $quan = getDistrictNameById($_POST['huyendiachi']);

        // Truy vấn để lấy tên của xã/phường dựa trên xa_id
        $xaphuong = getWardNameById($_POST['xaphuongdiachi']);

        $commaPos = strpos($_POST['diachinhan'], ',');

        if ($commaPos !== false) {
            $substring = substr($_POST['diachinhan'], 0, $commaPos);
        } else {
            // If no comma is found, return the entire string
            $substring = $_POST['diachinhan'];
        }
        $diachinhan = $substring.','.$xaphuong.','.$quan.','.$tinh;
        $tongtien =  (int)$_POST['totalPrice'];


        //insert đơn hàng vào database
        $orderId = createOrder($_SESSION['user']['id'], $diachinhan, $tongtien, date('Y-m-d'), date('Y-m-d'));
        //insert chi tiết đơn hàng vào database
        $tongsanpham = 0;
        for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 
            $idSach = (int)$_SESSION['cart'][$i][0];
            $soluong = (int)$_SESSION['cart'][$i][5];
            $tongsanpham += $soluong;
            $dongia = (int)$_SESSION['cart'][$i][4];
            createOrderDetail($orderId, $idSach, $soluong, $dongia);
            updateOrderDetail_tonkho($idSach,$soluong);
        } 
        updateOrder_tongsanpham($orderId, $tongsanpham);
        
        //show confirm đơn hàng
        header("location: index.php?page=orderConfirm");
        //unset session giỏ hàng sau khi đặt hàng thành công
        unset($_SESSION['cart']);
    }
?>