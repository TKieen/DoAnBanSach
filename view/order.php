<?php
    include_once 'inc/header_order.php';
    extract($result);
    $gialucdat = number_format($gialucdat,0,"",".");
    $tongtien = number_format($tongtien,0,"",".");
?>
<div class="container-bottom">
    <div class="container-content-left">
        <div class="container-content-left-user">
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
            <div class="container-content-right-row3-Orders">
                <div class="container-content-right-row3-Orders-status">
                    <div class="container-content-right-row3-Orders-status-item1">
                        <strong>Trạng thái đơn hàng</strong>
                    </div>
                    <div class="container-content-right-row3-Orders-status-item2">
                        
                        <?php
                            if($trangthaiDH == 0) echo '<span class="green"><i class="fa-solid fa-truck"></i> Đang chờ duyệt</span>';
                            else if($trangthaiDH == 1) echo '<span class="green"><i class="fa-solid fa-truck"></i> Đang vận chuyển</span>';
                            else if($trangthaiDH == 2) echo '<span class="green"><i class="fa-solid fa-truck"></i> Đã giao thành công</span>';
                            else if($trangthaiDH == 3) echo '<span class="red"><i class="fa-solid fa-truck"></i> Hủy bởi bạn</span>';
                            else if($trangthaiDH == 4) echo '<span class="red"><i class="fa-solid fa-truck"></i> Hủy bởi người bán</span>';
                        ?>
                    </div>
                </div>
                
                <div class="container-content-right-row3-Orders-product">
                <?php
                    if($trangthaiSach !== 0){
                ?>
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
                            <a href="?page=orderDetail&idDH=<?=$idDonHang?>">Xem thêm</a>
                        </div>
                    </div>
                <?php
                    }
                    else{
                ?>
                    <div class="container-content-right-row3-Orders-productDetail error">
                        Sản phẩm đã bị ẩn
                    </div>
                <?php
                    }
                ?>

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
        </div>
    </div>
</div>
<?php
    include_once 'inc/footer.php';
?>           