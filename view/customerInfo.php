<?php
include_once 'inc/header_customerInfo.php';
    extract($result);
?>
                <div class="container-bottom">
                    <div class="container-content-left">
                        <div class="container-content-left-user">
                            <b><?php echo $user_info['tenTK'];?></b>
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
                        <form class="info-list" action="?page=customerInfo" method="POST" onSubmit="window.location.reload()">
                            <div class="infos">
                                <div class="float-left">Họ và tên</div>
                                <input class="infos-field" type="text" name="tenTK" placeholder="<?php echo $user_info['tenTK'];?>">           
                            </div>
                            <div class="infos">
                                <div class="float-left">Email</div>
                                <input class="infos-field" type="email" name="email" placeholder="<?php echo $user_info['email'];?>">
                            </div>
                            <div class="infos">
                                <div class="float-left">Số điện thoại</div>
                                <input class="infos-field" type="text" name="phone" placeholder="<?php echo $user_info['dienthoai'];?>" pattern="[0]+[0-9]{9}" title="Nhập số điện thoại có 10 chữ số bắt đầu từ số 0">
                            </div>
                            <div class="submit-button">
                                <button class="buttons" name="submit_info">Lưu thông tin</button>
                            </div>
                        </form>
                        <h4 class="greeting">Đổi mật khẩu</h4>
                        <form class="info-list" action="?page=customerInfo" method="POST">
                            <div class="infos">
                                <div class="float-left">Nhập mật khẩu hiện tại</div>
                                <input class="infos-field" type="password" name="c_password">           
                            </div>
                            <div class="infos">
                                <div class="float-left">Nhập mật khẩu mới</div>
                                <input class="infos-field" type="password" name="n_password">
                            </div>
                            <div class="infos">
                                <div class="float-left">Xác nhận lại mật khẩu mới</div>
                                <input class="infos-field" type="password" name="r_n_password">
                            </div>
                            <div class="submit-button">
                                    <button class="buttons" name="submit_password">Lưu mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<?php
    include_once "inc/footer.php";
?>