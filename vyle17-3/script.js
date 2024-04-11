// Genrate random password
function generatePassword() {
    let length = 6;
    let charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+";
    let password = "";
    for(let i = 0; i < length; i++) {
        let randomIndex = Math.floor(Math.random() * charset.length);
        password += charset[randomIndex];
    }
    document.getElementById('password').value = password;
    document.getElementById('password').disabled = true;
}

// Start: Form validate
function formValidate() {
    let fullname = document.getElementById('fullname').value;
    let phonenumber = document.getElementById('phonenumber').value;
    let email = document.getElementById('email').value;
    let address = document.getElementById('address').value;
    let password = document.getElementById('password').value;
    let role = document.getElementById('role').value;
    let status;
    let activeRadio = document.getElementById('active');
    let lockedRadio = document.getElementById('locked');
    if(activeRadio.checked) {
        status = 1;
    }
    else if(lockedRadio.checked) {
        status = 0;
    }

    //Kiểm tra hợp lệ
    let phoneRegex = /^0[0-9]{9}$/;
    let emailRegex = /^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/;

    //Fullname
    if(fullname === '') {   //nếu tên rỗng
        document.querySelector('.form-message-name').innerHTML = "Vui lòng nhập họ tên!";
        document.getElementById('fullname').focus();
        return false;
    }
    else if(fullname.length < 3) {
        document.querySelector('.form-message-name').innerHTML = "Vui lòng nhập nhiều hơn 3 ký tự!";
        document.getElementById('fullname').focus();
        return false;
    }
    else {
        document.querySelector('.form-message-name').innerHTML = "";
    }
    //Phone number
    if(phonenumber === '') {
        document.querySelector('.form-message-phone').innerHTML = "Vui lòng số điện thoại!";
        document.getElementById('phonenumber').focus();
        return false;
    }
    else if (phonenumber.length !== 10 || !phoneRegex.test(phonenumber)) {
        document.querySelector('.form-message-phone').innerHTML = "Sai định dạng số điện thoại";
        document.getElementById('phonenumber').value = '';
        document.getElementById('phonenumber').focus();
        return false;
    }
    else {
        document.querySelector('.form-message-phone').innerHTML = "";
    }
    //Email
    if(email === '') {
        document.querySelector('.form-message-email').innerHTML = "Vui lòng email của bạn!";
        document.getElementById('email').focus();
        return false;
    }
    else if(!emailRegex.test(email)) {
        document.querySelector('.form-message-email').innerHTML = "Email không hợp lệ!";
        document.getElementById('email').value = '';
        document.getElementById('email').focus();
        return false;
    }
    else {
        document.querySelector('.form-message-email').innerHTML = "";
    }

    return true;
}

let createAccountBtn = document.getElementById("save-form-btn");
createAccountBtn.addEventListener('click', () => {
    event.preventDefault();
    if(formValidate()) {
        alert("Tạo tài khoản thành công");
    }
});