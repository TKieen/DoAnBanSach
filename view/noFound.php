<?php
    include_once 'inc/header_search.php';
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
                <i class="fa-solid fa-magnifying-glass"></i>  Không tìm thấy dữ liệu.
                </div>
            </div>
        </div>
    </section>
<?php
    include_once 'inc/footer.php';
?>