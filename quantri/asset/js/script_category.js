/* add-data form */
$(document).ready(function() {

    /* Start: add form */
    $('.open_add_form_category').click(function() {
        // Display the form as a pop-up
       $('#add-modal-category').show();
   });

    $('#add-form-category').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();

            // Serialize form data
            var formData = new FormData( $('#add-form-category')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: '../controller/category.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success)
                        $('.alert').html('<span class="green">Thêm thành công</span>');
                    else $('.alert').html('<span class="red">Thể loại đã tồn tại</span>');
                },
            });
    });
    /* End: add form */

    /* Start: update form */
    $('.open_edit_form_category').click(function(e) {
        e.preventDefault();
        var category_id = $(this).closest('tr').find('.category_id').text();
        $.ajax({
            url: '../controller/category.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'edit_data_category': true,
                'category_id': category_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                $('#edit-form-category input[name="category_id"]').val(obj.idTL);
                $('#edit-form-category input[name="tenTL"]').val(obj.tenTL);
                $('#edit-form-category input[name="trangthai"][value="'+(obj.trangthai)+'"]').prop("checked",true);
                // // Display the edit form as a pop-up
                $('#edit-modal-category').show();
            },
        });
    });

        /* update data */
    $('#edit-form-category').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // Serialize form data
        var formData = new FormData( $('#edit-form-category')[0]);
        // AJAX request to handle form submission
        $.ajax({
            url: '../controller/category.php', // URL to handle form submission
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success) $('.alert').html('<span class="green">Cập nhật thành công</span>');
                else $('.alert').html('<span class="red">Thể loại đã tồn tại</span>');
            },
        });
    });
    /* End: update form */
    
    // Event listener for close button clicks
    $('.close-btn-category').click(function() {
        // Hide the edit form modal
        $('.alert').html('');
        $('#add-modal-category').hide();
        $('#update_file').val('');
        $('#edit-modal-category').hide();
        var curr_page = $('.curr_page').val();
        window.location.href="index.php?page=category&index="+curr_page;
    });

    /* Start: lock */
    $('.lock_category').click(function() {
        // Display the form as a pop-up
        var category_id = $(this).closest('tr').find('.category_id').text();
        $.ajax({
            url: '../controller/category.php', // Replace with the actual PHP endpoint to fetch category details
            type: 'POST',
            data: {
                'lock_category': true,
                'category_id': category_id,
            },
            success: function(response){
                const obj = JSON.parse(response);
                if(obj.success){
                    var curr_page = $('.curr_page').val();
                    window.location.href="index.php?page=category&index="+curr_page;
                }
            },
        });
   });
    /* End: lock */

    /* Start: unlock */
    $('.unlock_category').click(function() {
        // Display the form as a pop-up
        var category_id = $(this).closest('tr').find('.category_id').text();
        $.ajax({
            url: '../controller/category.php', // Replace with the actual PHP endpoint to fetch category details
            type: 'POST',
            data: {
                'unlock_category': true,
                'category_id': category_id,
            },
            success: function(response){
                const obj = JSON.parse(response);
                if(obj.success){
                    var curr_page = $('.curr_page').val();
                    window.location.href="index.php?page=category&index="+curr_page;
                }
            },
        });
   });
    /* End: unlock */

});


