/* add-data form */
$(document).ready(function() {

    /* Start: add form */
    $('.open_add_form_customer').click(function() {
        // Display the form as a pop-up
       $('#add-modal-customer').show();
   });

    $('#add-form-customer').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // validate form
        var ten = $('#add-form-customer input[name="ten"]').val();
        var email = $('#add-form-customer input[name="email"]').val();
        var dienthoai = $('#add-form-customer input[name="dienthoai"]').val();
        var matkhau = $('#add-form-customer input[name="matkhau"]').val();
        var alert = formValidate_add(ten, email, dienthoai, matkhau);
        if(alert ===''){
            // Serialize form data
            var formData = new FormData( $('#add-form-customer')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: '../controller/customer.php', // URL to handle form submission
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

    /* Start: update form */
    $('.open_edit_form_customer').click(function(e) {
        e.preventDefault();
        var user_id = $(this).closest('tr').find('.user_id').text();
        $.ajax({
            url: '../controller/customer.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'edit_data_customer': true,
                'user_id': user_id,
            },
            success: function(response){
                const obj = JSON.parse(response);
                $('#edit-form-customer input[name="user_id"]').val(obj.idTK);
                $('#edit-form-customer input[name="ten"]').val(obj.tenTK);
                $('#edit-form-customer input[name="email"]').val(obj.email);
                $('#edit-form-customer input[name="dienthoai"]').val(obj.dienthoai);
                $('#edit-form-customer input[name="trangthai"][value="'+(obj.trangthai)+'"]').prop("checked",true);
                // // Display the edit form as a pop-up
                $('#edit-modal-customer').show();
            },
        });
    });

        /* update data */
    $('#edit-form-customer').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // validate form
        var ten = $('#edit-form-customer input[name="ten"]').val();
        var email = $('#edit-form-customer input[name="email"]').val();
        var dienthoai = $('#edit-form-customer input[name="dienthoai"]').val();
        var alert = formValidate(ten, email, dienthoai);
        if(alert ===''){
        // Serialize form data
        var formData = new FormData( $('#edit-form-customer')[0]);
        // AJAX request to handle form submission
        $.ajax({
            url: '../controller/customer.php', // URL to handle form submission
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success) $('.alert').html('<span class="green">Cập nhật thành công</span>');
                else $('.alert').html('<span class="red">Người này đã tồn tại do trùng email hoặc số điện thoại</span>');
            },
        });
    }
    else $('.alert').html(alert);
    });
    /* End: update form */

    /* Start: view form */
    $('.open_view_form_customer').click(function(e) {
        e.preventDefault();
        var user_id = $(this).closest('tr').find('.user_id').text();
        $.ajax({
            url: '../controller/customer.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'view_data_customer': true,
                'user_id': user_id,
            },
            success: function(response){
                const obj = JSON.parse(response);
                $('#view-form-customer input[name="ten"]').val(obj.tenTK);
                $('#view-form-customer input[name="email"]').val(obj.email);
                $('#view-form-customer input[name="dienthoai"]').val(obj.dienthoai);
                $('#view-form-customer input[name="trangthai"][value="'+(obj.trangthai)+'"]').prop("checked",true);
                // // Display the edit form as a pop-up
                $('#view-modal-customer').show();
            },

        });
    });
    /* End: view form */
    
    // Event listener for close button clicks
    $('.close-btn-customer').click(function() {
        // Hide the edit form modal
        $('.alert').html('');
        $('#add-modal-customer').hide();
        $('#edit-modal-customer').hide();
        $('#view-modal-customer').hide();
        var curr_page = $('.curr_page').val();
        window.location.href="index.php?page=customer&index="+curr_page;
    });

    /* Start: lock */
    $('.lock_customer').click(function() {
        // Display the form as a pop-up
        var user_id = $(this).closest('tr').find('.user_id').text();
        $.ajax({
            url: '../controller/customer.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'lock_customer': true,
                'user_id': user_id,
            },
            success: function(response){
                const obj = JSON.parse(response);
                if(obj.success){
                    var curr_page = $('.curr_page').val();
                    window.location.href="index.php?page=customer&index="+curr_page;
                }
            },
        });
   });
    /* End: lock */

    /* Start: unlock */
    $('.unlock_customer').click(function() {
        // Display the form as a pop-up
        var user_id = $(this).closest('tr').find('.user_id').text();
        $.ajax({
            url: '../controller/customer.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'unlock_customer': true,
                'user_id': user_id,
            },
            success: function(response){
                const obj = JSON.parse(response);
                if(obj.success){
                    var curr_page = $('.curr_page').val();
                    window.location.href="index.php?page=customer&index="+curr_page;
                }
            },
        });
   });
    /* End: unlock */
});


