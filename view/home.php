<?php
    include_once 'inc/header_home.php';
    extract($result);
?>
<section class="container-bottom">
    <div class="container-bottom-content1">
        <div class="container-bottom-content1-banner">
            <div class="container-bottom-content1-banner-listImage">
                <?php
                    foreach($result as $item){
                        extract($item);
                ?>
                <img class="nature" src="uploads/uploads_product/<?=$hinhanh?>" alt="">
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="container-bottom-content2 space">
        <div class="container-bottom-content2-title">
            <strong>Sách Bán Chạy</strong>
        </div>
        <div class="container-bottom-content-productList">
            <?php
                foreach($result as $item){
                    extract($item);
                    $giaban = number_format($giaban,0,"",".");
            ?>
            <a class="container-bottom-right-content-bottom-product" href="?page=productDetail&idSach=<?=$idSach?>&idTL=<?=$idTL?>">
                <img src="uploads/uploads_product/<?=$hinhanh?>" alt="">
                <div class="container-bottom-right-content-bottom-product-text1">
                    <?=$tuasach?>
                </div>
                <div class="container-bottom-right-content-bottom-product-text2">
                    <?=$tacgia?>
                </div>
                <div class="container-bottom-right-content-bottom-product-text2 luotban">
                    <?=$luotban?> lượt bán
                </div>
                <?php
                    if($giaban != $giabia){
                        $giabia = number_format($giabia,0,"",".");
                        echo 
                        '<div class="container-bottom-right-content-bottom-product-price discount">'.$giabia.'đ</div>';
                    }
                ?>
                <div class="container-bottom-right-content-bottom-product-price">
                    <?=$giaban?>đ
                </div>
            </a>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="container-bottom-content2-seeMore">
        <span class="seeMoreTxt"> <a href="?page=bestseller">Xem thêm &gt;&gt;</a></span>
    </div>
</section>
<?php
    include_once 'inc/footer.php';
?>