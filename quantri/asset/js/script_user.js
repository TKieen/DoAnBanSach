/* add-data form */
$(document).ready(function() {

    /* Start: add form */
    $('.open_add_form').click(function() {
        // Display the form as a pop-up
       $('#add-modal').show();
   });

    $('#add-form').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // validate form
        var ten = $('#add-form input[name="ten"]').val();
        var email = $('#add-form input[name="email"]').val();
        var dienthoai = $('#add-form input[name="dienthoai"]').val();
        var phanquyen = $('#add-form select[name="phanquyen"]').val();
        var alert = formValidateUser(ten, email, dienthoai, phanquyen);
        if(alert ===''){
            // Serialize form data
            var formData = new FormData( $('#add-form')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: '../controller/user.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
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
    $('.open_edit_form').click(function(e) {
        e.preventDefault();
        var user_id = $(this).closest('tr').find('.user_id').text();
        $.ajax({
            url: '../controller/user.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'edit_data': true,
                'user_id': user_id,
            },
            success: function(response){
                const obj = JSON.parse(response);
                var img = "../../uploads/uploads_user/"+obj.avatar;
                $('#edit-form #update_pic').attr('src', img);
                $('#edit-form input[name="curr_img"]').val(obj.avatar);
                $('#edit-form input[name="id"]').val(obj.ID);
                $('#edit-form input[name="ten"]').val(obj.ten);
                $('#edit-form input[name="email"]').val(obj.email);
                $('#edit-form input[name="dienthoai"]').val(obj.dienthoai);
                $('#edit-form input[name="diachi"]').val(obj.diachi);
                $('#edit-form select[name="phanquyen"]').val(obj.phanquyen);
                $('#edit-form input[name="trangthai"][value="'+(obj.trangthai)+'"]').prop("checked",true);
                // // Display the edit form as a pop-up
                $('#edit-modal').show();
            },
        });
    });

    /* update data */
    $('#edit-form').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // validate form
        var ten = $('#edit-form input[name="ten"]').val();
        var email = $('#edit-form input[name="email"]').val();
        var dienthoai = $('#edit-form input[name="dienthoai"]').val();
        var phanquyen = $('#edit-form select[name="phanquyen"]').val();
        var alert = formValidateUser(ten, email, dienthoai, phanquyen);
        if(alert ===''){
        // Serialize form data
        var formData = new FormData( $('#edit-form')[0]);
        // AJAX request to handle form submission
        $.ajax({
            url: '../controller/user.php', // URL to handle form submission
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                const obj = JSON.parse(response);
                if(obj.success) $('.alert').html('<span class="green">Cập nhật thành công</span>');
            },
        });
    }
    else $('.alert').html(alert);
    });
    /* End: edit form */

    /* Start: view form */
    $('.open_view_form').click(function(e) {
        e.preventDefault();
        var user_id = $(this).closest('tr').find('.user_id').text();
        $.ajax({
            url: '../controller/user.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'view_data': true,
                'user_id': user_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                var img = "../../uploads/uploads_user/"+obj.avatar;
                $('#view-form #view_pic').attr('src', img);
                $('#view-form input[name="ten"]').val(obj.ten);
                $('#view-form input[name="email"]').val(obj.email);
                $('#view-form input[name="dienthoai"]').val(obj.dienthoai);
                $('#view-form input[name="diachi"]').val(obj.diachi);
                $('#view-form select[name="phanquyen"]').val(obj.phanquyen);
                $('#view-form input[name="trangthai"][value="'+(obj.trangthai)+'"]').prop("checked",true);
                // // Display the edit form as a pop-up
                $('#view-modal').show();
            },

        });
    });
    /* End: view form */

    // Event listener for close button clicks
    $('.close-btn').click(function() {
        // Hide the edit form modal
        $('.alert').html('');
        $('#add-modal').hide();
        $('#update_file').val('');
        $('#edit-modal').hide();
        $('#view-modal').hide();
        var curr_page = $('.curr_page').val();
        window.location.href="index.php?page=user&index="+curr_page;
    });
});

