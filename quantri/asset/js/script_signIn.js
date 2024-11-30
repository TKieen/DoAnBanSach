function validateResetPassword(n_password, r_n_password){
    let alert = '';
    let matkhauRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*!])[A-Za-z\d@#$%^&*!]{8,20}$/;
    if(n_password == ''){
        alert = '<span style="color: red;">Vui lòng nhập mật khẩu.</span>';
        return alert;
    }
    else if(!matkhauRegex.test(n_password)){
        alert = '<span style="color: red;">Mật khẩu phải có 8-20 kí tự, gồm chữ thường, chữ hoa, số và kí tự đặc biệt</span>';
        return alert;
    }

    if(r_n_password == ''){
        alert = '<span style="color: red;">Vui lòng nhập mật khẩu nhập lại.</span>';
        return alert;
    }
    else if(n_password != r_n_password){
        alert = '<span style="color: red;">Mật khẩu nhập lại không trùng khớp.</span>';
        return alert;
    }
    return alert;
}
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
        let msg = validateResetPassword(password, r_password);
        if(msg == ''){
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
    else $('.alert').html(msg);
    });
    /* End: reset pwd */
});