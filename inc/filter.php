<div class="container-bottom-left-filter">
    <div class="container-bottom-left-filter-category">
        <div style="font-size: 16px" class="container-bottom-left-filter-category-content1">
            <b>TÌM SÁCH THEO DANH MỤC SÁCH</b>
        </div>
        <div class="container-bottom-left-filter-category-content">
            <a href="?page=search&category=bestseller">Sách Bán Chạy</a>
        </div>
        <?php
            foreach($category as $item){
                extract($item);
        ?>
        <div class="container-bottom-left-filter-category-content">
            <a href="?page=search&category=<?=$tenTL?>&idTL=<?=$idTL?>"><?=$tenTL?></a>
        </div>
        <?php
            }
        ?>
    </div>
    <div class="container-bottom-left-filter-price">
        <div style="font-size: 16px" class="container-bottom-left-filter-category-content1">
            <b>TÌM SÁCH THEO GIÁ TIỀN</b>
        </div>
        <form class="container-bottom-left-filter-price-range" id="filter-form">
            <input type="hidden" name="page" value="search">
            <!-- ?page=search&kyw=khoc&btn=submit -->
            <?php
                if(isset($_GET['kyw']))
                    echo '<input type="hidden" name="kyw" value="'.$_GET['kyw'].'">';
                else if(isset($_GET['category']))
                    if($_GET['category']=="bestseller") 
                        echo '<input type="hidden" name="category" value="bestseller">';
                    else{
                        echo '<input type="hidden" name="category" value="'.$_GET['category'].'">';
                        echo '<input type="hidden" name="idTL" value="'.$_GET['idTL'].'">';
                    }
            ?>
            <!-- ?page=search&category=bestseller -->
            <!-- ?page=search&category=van%20hoc&idTL=1 -->
            <i>Nhập vào khoảng giá cần tìm</i>
                <div class="container-bottom-left-filter-price-range-input">
                    <input type="text" name="minPrice" id="minPrice">
                    --
                    <input type="text" name="maxPrice" id="maxPrice">
                </div>
                <div id="alert"></div>
                <button type="submit" name="btn" value="filter" class="filter-btn" onclick="return checkFilterForm();">Tìm kiếm</button>
        </form>
    </div>
</div>