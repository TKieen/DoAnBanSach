<?php
include '../../lib/connect.php';
include '../../lib/session.php';
require '../model/user.php';
require '../model/supplier.php';
require '../model/discount.php';
require '../model/category.php';
require '../model/order.php';
require '../model/product.php';
require '../model/phieunhapkho.php';


$aside = "../inc/aside_chuDN.php";
$quyentaikhoan = "Chủ DN";
if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){
        /* product */
        case 'product':
            $result = getAllProduct();
            $pageTitle = "product";
            require_once '../view/product.php';
            break;

        // phần này là để lọc tìm kiếm, chọn thể loại, giá từ --- đến --- và sort số lượng tồn kho
        case 'searchProduct1':
            $pageTitle = "searchProduct1";
            if(isset($_POST['admin-controller-product'])){
                require_once '../controller/filterProduct.php';
            }
            else $result = $_SESSION['searchResult'];
            require_once '../view/product.php';
            break;

        // phần này là để lọc cái thanh màu cam phía trên, gồm có tất cả, đang bán, hết hàng, bị ẩn
        case 'searchProduct2':
            $pageTitle = "searchProduct2";
            if(isset($_POST['admin-controller-product'])){
                require_once '../controller/filterProduct.php';
            }
            else $result = $_SESSION['searchResult'];
            require_once '../view/product.php';
            break;
        /* product */

        /* user */
        case 'user':
            $result = getAllUser();
            $pageTitle = "user";
            require_once '../view/user.php';
            break;

        case 'searchUser':
            $pageTitle = "searchUser";
            if(isset($_POST['admin-controller-user'])){
                require_once '../controller/filterUser.php';
            }
            else $result = $_SESSION['searchResult'];
            require_once '../view/user.php';
            break;
        /* user */

        /* supplier */
        case 'supplier':
            $result = getAllSupplier();
            $pageTitle = "supplier";
            require_once '../view/supplier.php';
            break;

        case 'searchSupplier':
            // $action = 'search';
            $pageTitle = "searchSupplier";
            if(isset($_POST['admin-controller-supplier'])){
                require_once '../controller/filterSupplier.php';
            }
            else $result = $_SESSION['searchResult'];
            require_once '../view/supplier.php';
            break; 
        /* supplier */

        /* discount */
        case 'discount':
            $pageTitle = "discount";
            $result = getAllDiscount();
            require_once '../view/discount.php';
            break;
        
        case 'searchDiscount':
            $pageTitle = "searchDiscount";
            if(isset($_POST['admin-controller-discount'])){
                require_once '../controller/filterDiscount.php';
            }
            else $result = $_SESSION['searchResult'];
            require_once '../view/discount.php';
            break;
        /* discount */

        /* category */
        case 'category':
            $pageTitle = "category";
            $result = getAllCategory();
            require_once '../view/category.php';
            break;
        
        case 'searchCategory':
            $pageTitle = "searchCategory";
            if(isset($_POST['admin-controller-category'])){
                require_once '../controller/filterCategory.php';
            }
            else $result = $_SESSION['searchResult'];
            require_once '../view/category.php';
            break;
        /* category */

        /* order */
        case 'order':
            $result = getAllOrder();
            $pageTitle = "order";
            require_once '../view/order.php';
            break;

        case 'searchOrder':
            $pageTitle = "searchOrder";
            if(isset($_POST['admin-controller-order'])){
                require_once '../controller/filterOrder.php';
            }
            else $result = $_SESSION['searchResult'];
            require_once '../view/order.php';
            break;
        /* order */

        /* phieunhapkho */
        case 'phieunhapkho':
            $result = getAllPhieuNhap();
            $pageTitle = "phieunhapkho";
            require_once '../view/phieunhapkho.php';
            break;

        case 'searchPhieunhapkho':
            // $action = 'search';
            $pageTitle = "searchPhieunhapkho";
            if(isset($_POST['admin-controller-phieunhapkho'])){
                require_once '../controller/filterPhieunhapkho.php';
            }
            else $result = $_SESSION['searchResult'];
            require_once '../view/phieunhapkho.php';
            break; 
        
        case 'detail_phieunhapkho':
            if(isset($_GET['idPN'])){
                $phieunhap = getPhieuNhapByID($_GET['idPN']);
                $ctphieunhap = getDetailPhieuNhapByID($_GET['idPN']);
                require_once '../view/detail_phieunhapkho.php';
            }
            break;

        case 'add_phieunhapkho':
            if(isset($_GET['idNCC'])){
                $supplier = getSupplierByID($_GET['idNCC']);
                $ngaytao = date("Y-m-d");
                $chietkhau = $_GET['chietkhau'];
                require_once '../view/add_phieunhapkho.php';   
            }
            break;

        case 'edit_phieunhapkho':
            if(isset($_GET['idPN'])){
                $phieunhap = getPhieuNhapByID($_GET['idPN']);
                $ctphieunhap = getDetailPhieuNhapByID($_GET['idPN']);
                require_once '../view/edit_phieunhapkho.php';
            }
            break;
        /* phieunhapkho */

        /* thong ke nhap kho */
        case 'tknhapkho':
            require_once '../view/tknhapkho.php';
            break;
        /* thong ke nhap kho */

        /* thong ke loi nhuan */
        case 'tkloinhuan':
            require_once '../view/tkloinhuan.php';
            break;
        /* thong ke loi nhuan */

        /* thong ke doanh thu */
        case 'tkdoanhthu':
            require_once '../view/tkdoanhthu.php';
            break;
        /* thong ke doanh thu */

        /* info */
        case 'editInfo':
            require_once "../view/edit_info.php";
            break;
        /* info */
        
        case 'signOut':
            admin_login_session_unset();
            header("Location:../index.php?page=home");
            break;

        default:
        //require homepage
        $pageTitle = "product";
        $result = getAllProduct();
        require_once '../view/product.php';
        break;
    }
}
else{
    //require homepage
    $pageTitle = "product";
    $result = getAllProduct();
    require_once '../view/product.php';
}
?>