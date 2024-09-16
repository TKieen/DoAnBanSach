<?php
    include '../lib/connect.php';
    require '../model/signUp.php';
    require '../model/customer.php';
    require_once "../lib/session.php";

    $errors = [ 'email' => ['isEmpty' => '', 'invalid' => '', 'existed' => ''],
        'phone' => ['existed' => ''],
        'password' => ['isEmpty' => ''],
        'r_password' => ['isEmpty' => '', 'unmatched' => ''], 
        'fullname' => ['required' => '']
    ];

    if(isset($_POST['sign_up'])) {

        $errors['email']['isEmpty'] =  check_isEmpty($_POST['email']);
        $errors['email']['invalid'] = check_email_is_valid($_POST['email']);
        $errors['email']['existed'] = check_email_is_existed($_POST['email']);

        $errors['phone']['existed'] = check_phone_is_existed($_POST['phone']);
        
        $errors['password']['isEmpty'] =  check_isEmpty($_POST['password']);

        $errors['r_password']['isEmpty'] =  check_isEmpty($_POST['r_password']);
        $errors['r_password']['unmatched'] = check_password_is_unmatched($_POST['password'], $_POST['r_password']);

        $errors['fullname']['isEmpty'] = check_isEmpty($_POST['fullname']);

        $is_able_to_sign_up = true;

        foreach($errors as $error) {
            foreach($error as $error_element) {
                if ($error_element) {
                    $is_able_to_sign_up = false;
                    break;
                }
            }
        }

        if ($is_able_to_sign_up){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];

            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            addCustomer($email, $password_hash, $fullname, $phone);
            echo json_encode(array('success'=>true));
        }
        else echo json_encode(array('success'=>false));
    }
?>