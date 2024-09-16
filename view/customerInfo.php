<?php
include_once 'inc/header_customerInfo.php';
$user_info = getOneCustomerById($_SESSION['user']['id']);
extract($user_info);
?>
                <div class="container-bottom">
                    <div class="container-content-left">
                        <div class="container-content-left-user">
                            <b><?php echo $_SESSION['user']['name']; ?></b>
                        </div>
                        <div class="container-content-left-userInfo">
                            <i class="fa-regular fa-user"></i>
                            <a href="?page=customerInfo" style="text-decoration: none !important; color: green;">Thông tin cá nhân</a>
                        </div>
                        <div class="container-content-left-order">
                            <i class="fa-regular fa-clipboard"></i>
                            <a href="?page=customerOrders" style="text-decoration: none !important; color: green;">Lịch sử đơn hàng</a>
                        </div>
                    </div>
                    <div class="container-content-right">
                        <h3 class="sub-title">Thông tin cá nhân</h3>
                        <h4 class="greeting">Xin chào bạn <span class="username"><?php echo $_SESSION['user']['name'];?></span></h4>
                        <form class="info-list" id="change-info-form" method="POST">
                            <div class="infos">
                                <div class="float-left">Họ và tên</div>
                                <input type="hidden" name="tenTK-org" value="<?=$tenTK?>">
                                <input class="infos-field" type="text" name="tenTK" placeholder="<?php echo $tenTK ?>">           
                            </div>
                            <div class="infos">
                                <div class="float-left">Email</div>
                                <input type="hidden" name="email-org" value="<?=$email?>">
                                <input class="infos-field" type="email" name="email" placeholder="<?php echo $email?>">
                            </div>
                            <div class="infos">
                                <div class="float-left">Số điện thoại</div>
                                <input type="hidden" name="phone-org" value="<?=$dienthoai?>">
                                <input class="infos-field" type="text" name="phone" placeholder="<?php echo $dienthoai?>" pattern="[0]+[0-9]{9}" title="Nhập số điện thoại có 10 chữ số bắt đầu từ số 0">
                            </div>
                            <div class="alert"></div>
                            <div class="submit-button">
                                <input type="hidden" name="submit_info">
                                <button class="buttons" name="submit_info">Lưu thông tin</button>
                            </div>
                        </form>
                        <h4 class="greeting">Đổi mật khẩu</h4>
                        <form class="info-list" id="change-pwd-form" method="POST">
                            <div class="infos">
                                <div class="float-left">Nhập mật khẩu hiện tại</div>
                                <input class="infos-field" type="password" name="c_password" required>           
                            </div>
                            <div class="infos">
                                <div class="float-left">Nhập mật khẩu mới</div>
                                <input class="infos-field" type="password" name="n_password" required>
                            </div>
                            <div class="infos">
                                <div class="float-left">Xác nhận lại mật khẩu mới</div>
                                <input class="infos-field" type="password" name="r_n_password" required>
                            </div>
                            <div class="alert1"></div>
                            <div class="submit-button">
                                    <input type="hidden" name="submit_password">
                                    <button class="buttons" name="submit_password">Lưu mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="asset/js/customer.js"></script>  
<?php
    include_once "inc/footer.php";
?>