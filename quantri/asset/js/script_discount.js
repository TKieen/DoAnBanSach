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
        var phantram = $('#add-form input[name="phantram"]').val();
        var ngaybatdau = $('#add-form input[name="ngaybatdau"]').val();
        var ngayketthuc = $('#add-form input[name="ngayketthuc"]').val();
        var alert = formValidateDiscount(phantram, ngaybatdau, ngayketthuc);
        if(alert ===''){
            // Serialize form data
            var formData = new FormData( $('#add-form')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: '../controller/discount.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success)
                        $('.alert').html('<span class="green">Thêm thành công</span>');
                    else $('.alert').html('<span class="red">Mã giảm giá đã tồn tại</span>');
                },
            });
        }
        else $('.alert').html(alert);
    });
    /* End: add form */

    /* Start: update form */
    $('.open_edit_form').click(function(e) {
        e.preventDefault();
        var discount_id = $(this).closest('tr').find('.discount_id').text();
        $.ajax({
            url: '../controller/discount.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'edit_data': true,
                'discount_id': discount_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                $('#edit-form input[name="discount_id"]').val(obj.idMGG);
                $('#edit-form input[name="phantram"]').val(obj.phantram);
                $('#edit-form input[name="ngaybatdau"]').val(obj.ngaybatdau);
                $('#edit-form input[name="ngayketthuc"]').val(obj.ngayketthuc);
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
        var phantram = $('#edit-form input[name="phantram"]').val();
        var ngaybatdau = $('#edit-form input[name="ngaybatdau"]').val();
        var ngayketthuc = $('#edit-form input[name="ngayketthuc"]').val();
        var alert = formValidateDiscount(phantram, ngaybatdau, ngayketthuc);
        if(alert ===''){
        // Serialize form data
        var formData = new FormData( $('#edit-form')[0]);
        // AJAX request to handle form submission
        $.ajax({
            url: '../controller/discount.php', // URL to handle form submission
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success) $('.alert').html('<span class="green">Cập nhật thành công</span>');
            },
        });
    }
    else $('.alert').html(alert);
    });
    /* End: update form */
    
    // Event listener for close button clicks
    $('.close-btn').click(function() {
        // Hide the edit form modal
        $('.alert').html('');
        $('#add-modal').hide();
        $('#update_file').val('');
        $('#edit-modal').hide();
        var curr_page = $('.curr_page').val();
        window.location.href="index.php?page=discount&index="+curr_page;
    });
});


