function validateSignUp(){
    let ten = $('#signUp-form input[name="fullname"]').val();
    let email = $('#signUp-form input[name="email"]').val();
    let n_password = $('#signUp-form input[name="password"]').val();
    let r_n_password = $('#signUp-form input[name="r_password"]').val();
    let phone = $('#signUp-form input[name="phone"]').val();
    let alert = '';
    let tenRegex = /^[\p{L} ]+$/u;
    let phoneRegex = /^0[0-9]{9}$/;
    let emailRegex = /^(?=.{10,254}$)[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/;
    let matkhauRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*!])[A-Za-z\d@#$%^&*!]{8,20}$/;

     //Fullname
     if(ten === '') {   //nếu tên rỗng
        alert = '<span style="color: red;">Vui lòng nhập họ tên.</span>';
        return alert;
    }
    if(ten.length < 3){
        alert = '<span style="color: red;">Vui lòng nhập họ tên nhiều hơn 3 ký tự.</span>';
        return alert;
    }
    if (!tenRegex.test(ten)) {
        alert = '<span style="color: red;">Tên không hợp lệ. Vui lòng chỉ sử dụng chữ cái.</span>';
        return alert;
    }

    //Email
    if(email === ''){
        alert = '<span style="color: red;">Vui lòng nhập email.</span>';
        return alert;
    }
    else if(!emailRegex.test(email)){
        alert = '<span style="color: red;">Email phải có độ dài từ 10 đến 20 kí tự. vd: thaovy3724@gmail.com</span>';
        return alert;
    } 

    //Password
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

    //Phone number
    if(phone === ''){
        alert = '<span style="color: red;">Vui lòng nhập số điện thoại.</span>';
        return alert;
    }
    else if (phone.length !== 10 || !phoneRegex.test(phone)){
        alert = '<span style="color: red;">Sai định dạng số điện thoại.</span>';
        return alert;
    }   
    return alert;
}

$(document).ready(function() {
    /*Start: sign-up form*/
    $('#signUp-form').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        let msg = validateSignUp();
        if(msg==''){
            // Serialize form data
            var formData = new FormData( $('#signUp-form')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/signUp.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        alert(response.message);
                        window.location.href = "?page=signIn";
                    } else {
                        $('.alert').html('<span style="color: red;">'+response.message+'</span>')
                    }
                },
                error: function(error) {
                    alert("error");
                }
            });
        } else $('.alert').html(msg);
    });
    /* End: sign-up form */
});