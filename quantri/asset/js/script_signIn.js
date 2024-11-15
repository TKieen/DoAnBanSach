$(document).ready(function() {
    /*Start: sign-in form*/
    $('#signIn-form').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();

            // Serialize form data
            var formData = new FormData( $('#signIn-form')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/signIn.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    console.log(obj);
                    if(obj.success === false) {
                        $('.alert').html('<span class="red">' + obj.message + '</span>');
                        return;
                    }
                    switch(obj.phanquyen){
                        case 'AD':
                            window.location.href = "Admin/index.php";
                            break;

                        case "BH":
                            window.location.href = "BanHang/index.php";
                            break;

                        case "TK":
                            window.location.href = "ThuKho/index.php";
                            break;

                        case "DN":
                            window.location.href = "ChuDN/index.php";
                            break;
                    }
                },
            });
    });
    /* End: sign-in form */

    /*Start: forgot-pwd form*/
    $('#forgotPwd1-form').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();

            // Serialize form data
            var formData = new FormData( $('#forgotPwd1-form')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/signIn.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    console.log(obj);
                    if(obj.success) window.location.href = "?page=forgotPassword2";
                    else $('.alert').html('<span class="red">Email không đúng</span>');
                },
            });
    });
    /*End: forgot-pwd form*/

    /* Start: OTP verify */
    $('#forgotPwd2-form').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();

            // Serialize form data
            var formData = new FormData( $('#forgotPwd2-form')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/signIn.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    console.log(obj);
                    if(obj.success) window.location.href = "?page=forgotPassword3";
                    else $('.alert').html('<span class="red">Mã xác thực không đúng</span>');
                },
            });
    });
    /* End: OTP verify */

    /* Start: reset pwd */
    $('#forgotPwd3-form').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();

            var password = $('#forgotPwd3-form input[name="password"]').val();
            var r_password = $('#forgotPwd3-form input[name="r_password"]').val();
            if(password === r_password){
            // Serialize form data
            var formData = new FormData( $('#forgotPwd3-form')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/signIn.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    console.log(obj);
                    if(obj.success) window.location.href = "?page=signIn";
                },
            });
        }
        else $('.alert').html('<span class="red">Mật khẩu không trùng khớp</span>');
    });
    /* End: reset pwd */
});