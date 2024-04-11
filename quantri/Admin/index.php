<?php
//not include controller
include '../../config/config.php';
include '../../lib/connect.php';
require '../model/user.php';

include_once '../inc/header.php';
if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){
        case 'home':
            $result = getAllUser();
            require_once '../view/user.php';
            break;

        default:
        //require homepage
        $result = getAllUser();
        require_once '../view/user.php';
        break;
    }
}
else{
    //require homepage
    $result = getAllUser();
    require_once '../view/user.php';
}
include_once '../inc/footer_admin.php';
    
?>