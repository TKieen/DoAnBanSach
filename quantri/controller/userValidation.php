<?php
/**
 * Biểu thức chính quy để xác thực tên.
 * Cho phép các chữ cái và khoảng trắng.
 */
$nameRegex = '/^[\p{L} ]+$/u';

/**
 * Biểu thức chính quy để xác thực số điện thoại.
 * Cho phép số 10 chữ số bắt đầu bằng 0.
 */
$phoneRegex = '/^0[0-9]{9}$/';

/**
 * Biểu thức chính quy để xác thực địa chỉ email.
 */
$emailRegex = '/^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/';

/**
 * Xác thực tên được cung cấp.
 *
 * @param string $name Tên cần xác thực.
 * @throws Exception Nếu tên trống, quá ngắn hoặc chứa ký tự không hợp lệ.
 */
function validateName($name) {
    global $nameRegex;
    if (empty($name)) {
        throw new Exception("Tên không được để trống!");
    }
    if (strlen($name) < 3) {
        throw new Exception('Vui lòng nhập họ tên nhiều hơn 3 ký tự!');
    }
    if (!preg_match($nameRegex, $name)) {
        throw new Exception("Tên không hợp lệ. Vui lòng chỉ sử dụng chữ cái!");
    }
}

/**
 * Xác thực địa chỉ email được cung cấp.
 *
 * @param string $email Địa chỉ email cần xác thực.
 * @throws Exception Nếu email trống hoặc không hợp lệ.
 */
function validateEmail($email) {
    global $emailRegex;
    if (empty($email)) {
        throw new Exception("Vui lòng nhập email!");
    }
    if (!preg_match($emailRegex, $email)) {
        throw new Exception("Email không hợp lệ. Vui lòng kiểm tra lại!");
    }
}

/**
 * Xác thực mật khẩu được cung cấp.
 *
 * @param string $password Mật khẩu cần xác thực.
 * @param string $rePassword Xác nhận mật khẩu cần xác thực.
 * @throws Exception Nếu mật khẩu trống, quá ngắn, quá dài hoặc không đáp ứng yêu cầu phức tạp.
 */
function validatePassword($password, $rePassword = '') {
    if (empty($password)) {
        throw new Exception("Vui lòng nhập mật khẩu!");
    }
    if (strlen($password) < 8 || strlen($password) > 20) {
        throw new Exception("Mật khẩu phải có độ dài từ 8 đến 20 ký tự!");
    }
//    if (!preg_match('/[A-Z]/', $password)) {
//        throw new Exception("Mật khẩu phải chứa ít nhất một chữ cái viết hoa!");
//    }
//    if (!preg_match('/\d/', $password)) {
//        throw new Exception("Mật khẩu phải chứa ít nhất một chữ số!");
//    }
//    if (!preg_match('/[@#$%^&*!]/', $password)) {
//        throw new Exception("Mật khẩu phải chứa ít nhất một ký tự đặc biệt!");
//    }
    if (!empty($rePassword) && !hash_equals($rePassword, $password)) {
        throw new Exception('Xác nhận mật khẩu và mật khẩu không khớp!');
    }
}

/**
 * Xác thực số điện thoại được cung cấp.
 *
 * @param string $phone Số điện thoại cần xác thực.
 * @throws Exception Nếu số điện thoại trống hoặc không hợp lệ.
 */
function validatePhone($phone) {
    global $phoneRegex;
    if (empty($phone)) {
        throw new Exception("Vui lòng nhập số điện thoại!");
    }
    if (!preg_match($phoneRegex, $phone)) {
        throw new Exception("Sai định dạng số điện thoại!");
    }
}

/**
 * Xác thực vai trò được cung cấp.
 *
 * @param int $role Vai trò cần xác thực.
 * @throws Exception Nếu vai trò không hợp lệ.
 */
function validateRole($role) {
    if ($role == -1) {
        throw new Exception("Vui lòng phân quyền cho người dùng!");
    }
}