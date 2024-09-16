$(document).ready(function() {
    /*Start: sign-up form*/
    $('#signUp-form').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();

            // Serialize form data
            var formData = new FormData( $('#signUp-form')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/signUp.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    console.log(obj);
                    if(obj.success) window.location.href = "?page=signIn";
                    else $('.alert').html('<span style="color: red;">Thông tin không hợp lệ. Vui lòng kiểm tra lại</span>');
                },
            });
    });
    /* End: sign-up form */
});