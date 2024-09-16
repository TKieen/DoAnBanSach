/* add-data form */
$(document).ready(function() {

    /* Start: add form */
    $('.open_add_form_user').click(function() {
        // Display the form as a pop-up
       $('#add-modal-user').show();
   });

    $('#add-form-user').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // validate form
        var ten = $('#add-form-user input[name="ten"]').val();
        var email = $('#add-form-user input[name="email"]').val();
        var dienthoai = $('#add-form-user input[name="dienthoai"]').val();
        var phanquyen = $('#add-form-user select[name="phanquyen"]').val();
        var matkhau = $('#add-form-user input[name="matkhau"]').val();
        var alert = formValidateUser_add(ten, email, dienthoai, matkhau, phanquyen);
        if(alert ===''){
            // Serialize form data
            var formData = new FormData( $('#add-form-user')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: '../controller/user.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success)
                        $('.alert').html('<span class="green">Thêm thành công</span>');
                    else $('.alert').html('<span class="red">Người này đã tồn tại do trùng email hoặc số điện thoại</span>');
                },
            });
        }
        else $('.alert').html(alert);
    });
    /* End: add form */
    
    /* Start: edit form */
    $('.open_edit_form_user').click(function(e) {
        e.preventDefault();
        var user_id = $(this).closest('tr').find('.user_id').text();
        $.ajax({
            url: '../controller/user.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'edit_data_user': true,
                'user_id': user_id,
            },
            success: function(response){
                const obj = JSON.parse(response);
                $('#edit-form-user input[name="user_id"]').val(obj.idTK);
                $('#edit-form-user input[name="ten"]').val(obj.tenTK);
                $('#edit-form-user input[name="email"]').val(obj.email);
                $('#edit-form-user input[name="dienthoai"]').val(obj.dienthoai);
                $('#edit-form-user select[name="phanquyen"]').val(obj.phanquyen);
                $('#edit-form-user input[name="trangthai"][value="'+(obj.trangthai)+'"]').prop("checked",true);
                // // Display the edit form as a pop-up
                $('#edit-modal-user').show();
            },
        });
    });

    /* update data */
    $('#edit-form-user').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // validate form
        var email = $('#edit-form-user input[name="email"]').val();
        var phanquyen = $('#edit-form-user select[name="phanquyen"]').val();
        var alert = formValidateUser_edit(email, phanquyen);
        if(alert ===''){
        // Serialize form data
        var formData = new FormData( $('#edit-form-user')[0]);
        // AJAX request to handle form submission
        $.ajax({
            url: '../controller/user.php', // URL to handle form submission
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success) $('.alert').html('<span class="green">Cập nhật thành công</span>');
                else $('.alert').html('<span class="red">Người này đã tồn tại do trùng email</span>');
            },
        });
    }
    else $('.alert').html(alert);
    });
    /* End: edit form */

    /* Start: view form */
    $('.open_view_form_user').click(function(e) {
        e.preventDefault();
        var user_id = $(this).closest('tr').find('.user_id').text();
        $.ajax({
            url: '../controller/user.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'view_data_user': true,
                'user_id': user_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                $('#view-form-user input[name="ten"]').val(obj.tenTK);
                $('#view-form-user input[name="email"]').val(obj.email);
                $('#view-form-user input[name="dienthoai"]').val(obj.dienthoai);
                $('#view-form-user select[name="phanquyen"]').val(obj.phanquyen);
                $('#view-form-user input[name="trangthai"][value="'+(obj.trangthai)+'"]').prop("checked",true);
                // // Display the edit form as a pop-up
                $('#view-modal-user').show();
            },

        });
    });
    /* End: view form */

    // Event listener for close button clicks
    $('.close-btn-user').click(function() {
        // Hide the edit form modal
        $('.alert').html('');
        $('#add-modal-user').hide();
        $('#edit-modal-user').hide();
        $('#view-modal-user').hide();
        var curr_page = $('.curr_page').val();
        window.location.href="index.php?page=user&index="+curr_page;
    });

    /* Start: lock */
    $('.lock_user').click(function() {
        // Display the form as a pop-up
        var user_id = $(this).closest('tr').find('.user_id').text();
        $.ajax({
            url: '../controller/user.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'lock_user': true,
                'user_id': user_id,
            },
            success: function(response){
                const obj = JSON.parse(response);
                if(obj.success){
                    var curr_page = $('.curr_page').val();
                    window.location.href="index.php?page=user&index="+curr_page;
                }
            },
        });
   });
    /* End: lock */

    /* Start: unlock */
    $('.unlock_user').click(function() {
        // Display the form as a pop-up
        var user_id = $(this).closest('tr').find('.user_id').text();
        $.ajax({
            url: '../controller/user.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'unlock_user': true,
                'user_id': user_id,
            },
            success: function(response){
                const obj = JSON.parse(response);
                if(obj.success){
                    var curr_page = $('.curr_page').val();
                    window.location.href="index.php?page=user&index="+curr_page;
                }
            },
        });
   });
    /* End: unlock */
});

