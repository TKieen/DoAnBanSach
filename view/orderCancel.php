<?php
    include_once 'inc/header_order.php';
?>
<div class="container-bottom">
    <div class="container-content-left">
        <div class="container-content-left-user">
            <!-- lấy session để gắn tên vô, tương tự cho order với orderDetail -->
            <b>VYLE</b>
        </div>
        <a class="container-content-left-userInfo">
            <i class="fa-regular fa-user"></i>
            Thông tin cá nhân
        </a>
        <a href="?page=customerOrders" class="container-content-left-order">
            <i class="fa-regular fa-clipboard"></i>
            Lịch sử đơn hàng
        </a>
    </div>
    <div class="container-content-right">
        <div class="container-content-right-row3"> <!-- productList -->
            <div class="notification">
                <i class="fa-solid fa-circle-check"></i>
                <div class="container-content-text1"><strong>Bạn Đã Hủy Đơn Hàng Thành Công!</strong></div>
                <div class="container-content-text2">Cảm ơn bạn đã tin tưởng về chất lượng sản phẩm và dịch vụ của chúng tôi.</div>
            </div>
        </div>
    </div>
</div>
<?php
    include_once 'inc/footer.php';
?>
