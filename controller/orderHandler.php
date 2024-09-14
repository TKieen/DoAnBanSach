<?php
    require "model\location.php";
    if(isset($_POST['orderSubmit']) && ($_POST['orderSubmit'])) {
        //lấy thông tin khách hàng từ form để tạo đơn hàng
        $diachinhan = $_POST['diachinhan'];
        $tinh_id = $_POST['tinhdiachi'];
        $huyen_id = $_POST['huyendiachi'];
        $xa_id = $_POST['xaphuongdiachi'];
        // Truy vấn để lấy tên của tỉnh/thành phố dựa trên tinh_id
        $tinh = getProvinceNameById($tinh_id);

        // Truy vấn để lấy tên của quận/huyện dựa trên huyen_id
        $huyen = getDistrictNameById($huyen_id);

        // Truy vấn để lấy tên của xã/phường dựa trên xa_id
        $xa = getWardNameById($xa_id);

        // Ghép các phần lại thành 1 chuỗi địa chỉ đầy đủ
        $diachiDayDu = $diachinhan . ', ' . $xa . ', ' . $huyen . ', ' . $tinh;

        $tongtien =  (int)$_POST['totalPrice'];

        //insert đơn hàng vào database
        $orderId = createOrder($_SESSION['user']['id'], $diachiDayDu, $tongtien, date('Y-m-d'), date('Y-m-d'));
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