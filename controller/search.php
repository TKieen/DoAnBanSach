<?php
    if(isset($_GET['kyw'])){
        $kyw = $_GET['kyw'];
        if($kyw !== ""){
            if(isset($_GET['btn']) && $_GET['btn'] == "filter"){
                $minPrice = $_GET['minPrice'];
                $maxPrice = $_GET['maxPrice'];

                $result = filterProductByKeyword($kyw, $minPrice, $maxPrice);
                $pageTitle = "&kyw=".$kyw."&minPrice=".$minPrice."&maxPrice=".$maxPrice."&btn=filter";
            }
            else{
                $result = searchProduct($kyw);
                $pageTitle = "&kyw=".$kyw."&search=submit";
            }
            $category = getAllCategory_KH();
            $title = $kyw;
            
            if($result!=null) require_once 'view/search.php';
            else require_once 'view/noFound.php';
        }
        else header("Location: ?page=home");
    }
    if(isset($_GET['category'])){
        if($_GET['category'] == "bestseller"){
            if(isset($_GET['btn']) && $_GET['btn'] == "filter"){
                $minPrice = $_GET['minPrice'];
                $maxPrice = $_GET['maxPrice'];

                $result = filterBestsellerProduct($minPrice, $maxPrice);
                $pageTitle = "&category=bestseller&minPrice=".$minPrice."&maxPrice=".$maxPrice."&btn=filter";
            }
            else{
                $pageTitle = "&category=bestseller";
                $result = getAllProductBestSeller();
            }
            $category = getAllCategory_KH();
            $title = "Sách Bán Chạy";
    
            if($result!=null) require_once 'view/search.php';
            else require_once 'view/noFound.php';
        }
        else if(isset($_GET['idTL'])){
            $idTL = $_GET['idTL'];
            if(isset($_GET['btn']) && $_GET['btn'] == "filter"){
                $minPrice = $_GET['minPrice'];
                $maxPrice = $_GET['maxPrice'];

                $result = filterCategoryProduct($idTL, $minPrice, $maxPrice);
                $pageTitle = "&category=".$_GET['category']."&idTL=".$_GET['idTL']."&minPrice=".$minPrice."&maxPrice=".$maxPrice."&btn=filter";
            }
            else{
                $pageTitle = "&category=".$_GET['category']."&idTL=".$idTL;
                $result = getAllProductByCategory($idTL);
            }
            // thong tin the loai can tim
            $categorySearch = getCategoryByID($idTL);
            $title = $categorySearch['tenTL'];
            $category = getAllCategory_KH();
            if($result!=null) require_once 'view/search.php';
            else require_once 'view/noFound.php';
        }
    }
?>