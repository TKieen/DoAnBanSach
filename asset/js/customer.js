$(document).ready(function() {
    $('#change-info-form').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
            $('.alert').html(''); // xoa thong bao
            var tenTK = $('#change-info-form input[name="tenTK"]').val();
            var email = $('#change-info-form input[name="email"]').val();
            var phone = $('#change-info-form input[name="phone"]').val();
            if(tenTK != "" || email !="" || phone != ""){
            // Serialize form data
            var formData = new FormData( $('#change-info-form')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/customerInfo.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    console.log(obj);
                    if(obj.success) alert("Đã lưu thông tin");
                    else $('.alert').html('<span style="color: red;">Email hoặc số điện thoại đã tồn tại</span>');
                },
            });
        }
    });

    $('#change-pwd-form').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        $('.alert1').html('');
        var n_password = $('#change-pwd-form input[name="n_password"]').val();
        var r_n_password = $('#change-pwd-form input[name="r_n_password"]').val();
        let matkhauRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*!])[A-Za-z\d@#$%^&*!]{8,}$/;
        if (!matkhauRegex.test(n_password)) {
            $('.alert1').html('<span style="color: red;">Mật khẩu chưa đủ mạnh</span>')  ;    
            return;
        }
        if(n_password == r_n_password){
            // Serialize form data
            var formData = new FormData( $('#change-pwd-form')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/customerInfo.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    console.log(obj);
                    if(obj.success) alert("Đã lưu thông tin");
                    else $('.alert1').html('<span style="color: red;">Mật khẩu hiện tại không đúng</span>');
                },
            });
        }
        else $('.alert1').html('<span style="color: red;">Mật khẩu nhập lại chưa trùng khớp</span>');
    });
    
});