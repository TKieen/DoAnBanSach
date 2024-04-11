<?php
    include_once 'inc/header_search.php';
    extract($result);
?>
    <section class="container-bottom">
        <div class="container-bottom-left">
        <?php
            include_once 'inc/filter.php';
        ?>
        </div>
        <div class="container-bottom-right">
            <div class="container-bottom-right-content">
                <div class="container-bottom-right-content-top">
                    Kết quả tìm kiếm: 
                    <span id="searchResult" name=""><?=$title?></span>
                </div>
                <div class="container-bottom-right-content-bottom">
                <?php 
                    //chia mang result thanh tung trang
                    $num_per_page = 2; //total records each page
                    $curr_page = getPage();
                    $start = ($curr_page-1)*$num_per_page; //start divide for this page
                    $total_records = count($result);
                    echo '<input type="hidden" name="curr_page" class="curr_page" value="'.$curr_page.'">';

                    $keys = array_keys($result);
                    for($i=$start; $i<$start+$num_per_page && $i<$total_records; $i++){
                        extract($result[$keys[$i]]);
                        $giaban = number_format($giaban,0,"",".");
                        $giabia = number_format($giabia,0,"",".");
                ?>
                    <a class="container-bottom-right-content-bottom-product" href="?page=productDetail&idSach=<?=$idSach?>">
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
                <div class="container-bottom-right-pagination container-bottom-right-spaceUpper">
                <?php           
                    $total_pages = ceil($total_records/$num_per_page);

                    if($curr_page>1)
                        echo '<a href="?page=search'.$pageTitle.'&index='.($curr_page-1).'">&laquo;</a>';
                    else echo '<a href="?page=search'.$pageTitle.'&index=1">&laquo;</a>';

                    for($i=1; $i<=$total_pages; $i++){
                        if($curr_page==$i)
                            echo '<a href="?page=search'.$pageTitle.'&index='.$i.'" class="active">'.$i.'</a>';
                        else echo '<a href="?page=search'.$pageTitle.'&index='.$i.'">'.$i.'</a>';
                    }

                    if($curr_page>1)
                        echo '<a href="?page=search'.$pageTitle.'&index='.($curr_page+1).'">&raquo;</a>';
                    else echo '<a href="?page=search'.$pageTitle.'&index='.$total_pages.'">&raquo;</a>';
                ?>
                </div>
            </div>
        </div>
    </section>
<?php
    include_once 'inc/footer.php';
?>