function validateCustomer(ten, email, dienthoai){
    let alert = '';
    let tenRegex = /^[\p{L} ]+$/u;
    let phoneRegex = /^0[0-9]{9}$/;
    let emailRegex = /^(?=.{10,254}$)[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/;

     //Fullname
     if(ten != '') {   //nếu tên rỗng
        if(ten.length < 3){
            alert = '<span style="color: red;">Vui lòng nhập họ tên nhiều hơn 3 ký tự.</span>';
            return alert;
        }
        if (!tenRegex.test(ten)) {
            alert = '<span style="color: red;">Tên không hợp lệ. Vui lòng chỉ sử dụng chữ cái.</span>';
            return alert;
        }
     }

    //Email
    if(email != ''){
        if(!emailRegex.test(email)){
        alert = '<span style="color: red;">Email phải có độ dài từ 10 đến 20 kí tự. vd: thaovy3724@gmail.com</span>';
        return alert;
        }
    }

    //Phone number
    if(dienthoai != ''){
         if (dienthoai.length !== 10 || !phoneRegex.test(dienthoai)){
        alert = '<span style="color: red;">Sai định dạng số điện thoại.</span>';
        return alert;
        }
    }    
    return alert;
}

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
    $('#change-info-form').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        $('.alert').html(''); // xoa thong bao
        var tenTK = $('#change-info-form input[name="tenTK"]').val();
        var email = $('#change-info-form input[name="email"]').val();
        var phone = $('#change-info-form input[name="phone"]').val();
        var msg = validateCustomer(tenTK, email, phone);
        if(msg == ''){
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
        else  $('.alert').html(msg);
    });

    $('#change-pwd-form').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        $('.alert1').html('');
        var n_password = $('#change-pwd-form input[name="n_password"]').val();
        var r_n_password = $('#change-pwd-form input[name="r_n_password"]').val();
        let msg = validateResetPassword(n_password, r_n_password);
        if(msg == ''){
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
        else $('.alert1').html(msg);
    });
    
});