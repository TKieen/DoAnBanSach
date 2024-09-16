<?php
include '../../lib/session.php';
include '../../lib/connect.php';
require '../model/user.php';

$aside = "";
$quyentaikhoan = "Admin";
if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){
        case 'home':
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
        
            case 'editInfo':
                require_once "../view/edit_info.php";
                break;

        case 'signOut':
            admin_login_session_unset();
            header("Location:../index.php?page=home");
            break;

        default:
        //require homepage
        $result = getAllUser();
        $pageTitle = "user";
        require_once '../view/user.php';
        break;
    }
}
else{
    //require homepage
    $result = getAllUser();
    $pageTitle = "user";
    require_once '../view/user.php';
}

    
?>