<?php
    include_once 'inc/header_order.php';
?>
<div class="container-bottom">
    <div class="container-content-left">
        <div class="container-content-left-user">
            <b><?php echo $_SESSION['user']['name'];?></b>
        </div>
        <a href="?page=customerInfo" class="container-content-left-userInfo">
            <i class="fa-regular fa-user"></i>
            Thông tin cá nhân
        </a>
        <a href="?page=customerOrders" class="container-content-left-order">
            <i class="fa-regular fa-clipboard"></i>
            Lịch sử đơn hàng
        </a>
    </div>
    <div class="container-content-right">
    <i class="fa-solid fa-magnifying-glass"></i>  Không tìm thấy đơn hàng.
    </div>
</div>
<?php
    include_once 'inc/footer.php';
?>           