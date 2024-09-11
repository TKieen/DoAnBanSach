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
        <div class="container-content-right-row3"> <!-- productList -->
        <?php 
            foreach($result as $item){
                extract($item);
                $gialucdat = number_format($gialucdat,0,"",".");
                $tongtien = number_format($tongtien,0,"",".");
        ?>
            <div class="container-content-right-row3-Orders">
                <div class="container-content-right-row3-Orders-status">
                    <div class="container-content-right-row3-Orders-status-item1">
                        <strong>Trạng thái đơn hàng</strong>
                    </div>
                    <div class="container-content-right-row3-Orders-status-item2">
                        
                        <?php
                            if($trangthaiDH == 'cho') echo '<span class="green"><i class="fa-solid fa-truck"></i> Đang chờ duyệt</span>';
                            else if($trangthaiDH == 'vc') echo '<span class="green"><i class="fa-solid fa-truck"></i> Đang vận chuyển</span>';
                            else if($trangthaiDH == 'ht') echo '<span class="green"><i class="fa-solid fa-truck"></i> Đã giao thành công</span>';
                            else if($trangthaiDH == 'huykh') echo '<span class="red"><i class="fa-solid fa-truck"></i> Hủy bởi bạn</span>';
                            else if($trangthaiDH == 'huynv') echo '<span class="red"><i class="fa-solid fa-truck"></i> Hủy bởi người bán</span>';
                        ?>
                    </div>
                </div>
                
                <div class="container-content-right-row3-Orders-product">
                    <div class="container-content-right-row3-Orders-productImg">
                        <img src="uploads/uploads_product/<?=$hinhanh?>" alt="">
                    </div>
                    <div class="container-content-right-row3-Orders-productDetail">
                        <div class="container-content-right-row3-Orders-productDetail-productName">
                            <?=$tuasach?>
                        </div>
                        <div class="container-content-right-row3-Orders-productDetail-author">
                            Tác giả: <?=$tacgia?>
                        </div>
                        <div class="container-content-right-row3-Orders-productDetail-quantity">
                            x<?=$soluong?>
                        </div>
                        <div class="container-content-right-row3-Orders-productDetail-price">
                            <?=$gialucdat?>đ
                        </div>
                        <div class="container-content-right-row3-Orders-productDetail-detail">
                            <a href="?page=customerOrderDetail&idDH=<?=$idDonHang?>">Xem thêm</a>
                        </div>
                    </div>
                </div>
                <div class="container-content-right-row3-Orders-totalPrice">
                    <div class="container-content-right-row3-Orders-totalPrice-text">
                        Thành tiền:
                    </div>
                    <div class="container-content-right-row3-Orders-totalPrice-price">
                        <strong><?=$tongtien?>đ</strong>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
    include_once 'inc/footer.php';
?>           