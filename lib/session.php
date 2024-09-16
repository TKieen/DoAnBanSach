<?php
    session_start();
    if(!isset($_SESSION)) {
        $_SESSION['user'] = ['id' => '', 'email' => '', 'name' => '', 'phanquyen' => ''];
        $_SESSION['admin'] = ['id' => '', 'email' => '', 'name' => '', 'phanquyen' => ''];
        $_SESSION['cart'] = array();
    }
    function login_session($inputID, $inputEmail, $inputFullName, $phanquyen) {
        $temp = explode(' ', $inputFullName);
        $_SESSION['user']['id'] = $inputID;
        $_SESSION['user']['email'] = $inputEmail;
        $_SESSION['user']['name'] = $temp[sizeof($temp) - 1];
        $_SESSION['user']['phanquyen'] = $phanquyen;
    }
    function login_session_set_name($inputFullName) {
        $temp = explode(' ', $inputFullName);
        $_SESSION['user']['name'] = $temp[sizeof($temp) - 1];
    }
    function login_session_set_email($inputEmail) {
        $_SESSION['user']['email'] = $inputEmail;
    }

    function login_session_unset() {
        $_SESSION['user'] = ['id' => '', 'email' => '', 'name' => '', 'phanquyen' => ''];
    }

    function cart_session_unset() {
        if(isset($_SESSION['cart'])) unset($_SESSION['cart']);
    }

    function admin_login_session($inputID, $inputEmail, $inputFullName, $phanquyen) {
        $temp = explode(' ', $inputFullName);
        $_SESSION['admin']['id'] = $inputID;
        $_SESSION['admin']['email'] = $inputEmail;
        $_SESSION['admin']['name'] = $temp[sizeof($temp) - 1];
        $_SESSION['admin']['phanquyen'] = $phanquyen;
    }
    function admin_login_session_set_name($inputFullName) {
        $temp = explode(' ', $inputFullName);
        $_SESSION['admin']['name'] = $temp[sizeof($temp) - 1];
    }
    function admin_login_session_set_email($inputEmail) {
        $_SESSION['admin']['email'] = $inputEmail;
    }
    
    function admin_login_session_unset() {
        $_SESSION['admin'] = ['id' => '', 'email' => '', 'name' => '', 'phanquyen' => ''];
    }

    function reset_password_session($inputEmail) {
        $_SESSION['reset_password'] = ['email' => '', 'verify_code' => ''];
        $_SESSION['reset_password']['email'] = $inputEmail;
        $randomize = random_int(100000, 999999);
        $_SESSION['reset_password']['verify_code'] = strval($randomize);
        $_SESSION['reset_password']['verified'] = false;
    }
    function reset_password_session_unset() {
        $_SESSION['reset_password'] = ['email' => '', 'verify_code' => ''];
    }
    function advance_search_session($idCategory, $priceFrom, $priceTo) {
        $_SESSION['advance_search']['idCategory'] = $idCategory;
        $_SESSION['advance_search']['priceFrom'] = $priceFrom;
        $_SESSION['advance_search']['priceTo'] = $priceTo;
    }
?>