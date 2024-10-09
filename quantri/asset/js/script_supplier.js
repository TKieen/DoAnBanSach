/* add-data form */
$(document).ready(function() {

    /* Start: add form */
    $('.open_add_form_supplier').click(function() {
        // Display the form as a pop-up
       $('#add-modal-supplier').show();
   });

    $('#add-form-supplier').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // validate form
        var ten = $('#add-form-supplier input[name="ten"]').val();
        var email = $('#add-form-supplier input[name="email"]').val();
        var dienthoai = $('#add-form-supplier input[name="dienthoai"]').val();
        var diachi = $('#add-form-supplier input[name="diachi"]').val();
        var alert = formValidateSupplier(ten, email, dienthoai,diachi);
        if(alert ===''){
            // Serialize form data
            var formData = new FormData( $('#add-form-supplier')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: '../controller/supplier.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success)
                        $('.alert').html('<span class="green">Thêm thành công</span>');
                    else $('.alert').html('<span class="red">Nhà cung cấp này đã tồn tại do trùng tên, email hoặc số điện thoại</span>');
                },
            });
        }  
        else $('.alert').html(alert);
    });
    /* End: add form */

    /* Start: update form */
    $('.open_edit_form_supplier').click(function(e) {
        e.preventDefault();
        var supplier_id = $(this).closest('tr').find('.supplier_id').text();
        console.log(supplier_id);
        $.ajax({
            url: '../controller/supplier.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'edit_data_supplier': true,
                'supplier_id': supplier_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                $('#edit-form-supplier input[name="supplier_id"]').val(obj.idNCC);
                $('#edit-form-supplier input[name="ten"]').val(obj.tenNCC);
                $('#edit-form-supplier input[name="email"]').val(obj.email);
                $('#edit-form-supplier input[name="dienthoai"]').val(obj.dienthoai);
                $('#edit-form-supplier input[name="diachi"]').val(obj.diachi);
                $('#edit-form-supplier input[name="trangthai"][value="'+(obj.trangthai)+'"]').prop("checked",true);
                // // Display the edit form as a pop-up
                $('#edit-modal-supplier').show();
            },
        });
    });

        /* update data */
    $('#edit-form-supplier').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // validate form
        var diachi = $('#edit-form-supplier input[name="diachi"]').val();
        var alert = formValidateSupplier_edit(diachi);
        if(alert ===''){
        // Serialize form data
        var formData = new FormData( $('#edit-form-supplier')[0]);
        // AJAX request to handle form submission
        $.ajax({
            url: '../controller/supplier.php', // URL to handle form submission
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success) $('.alert').html('<span class="green">Cập nhật thành công</span>');
                else $('.alert').html('<span class="red">Nhà cung cấp này đã tồn tại do trùng email hoặc số điện thoại</span>');
            },
        });
    }
    else $('.alert').html(alert);
    });
    /* End: update form */

    /* Start: view form */
    $('.open_view_form_supplier').click(function(e) {
        e.preventDefault();
        var supplier_id = $(this).closest('tr').find('.supplier_id').text();
        $.ajax({
            url: '../controller/supplier.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'view_data_supplier': true,
                'supplier_id': supplier_id,
            },
            success: function(response){
                const obj = JSON.parse(response);
                $('#view-form-supplier input[name="ten"]').val(obj.tenNCC);
                $('#view-form-supplier input[name="email"]').val(obj.email);
                $('#view-form-supplier input[name="dienthoai"]').val(obj.dienthoai);
                $('#view-form-supplier input[name="diachi"]').val(obj.diachi);
                $('#view-form-supplier input[name="trangthai"][value="'+(obj.trangthai)+'"]').prop("checked",true);
                // // Display the edit form as a pop-up
                $('#view-modal-supplier').show();
            },

        });
    });
    /* End: view form */
    
    // Event listener for close button clicks
    $('.close-btn-supplier').click(function() {
        // Hide the edit form modal
        $('.alert').html('');
        $('#add-modal-supplier').hide();
        $('#edit-modal-supplier').hide();
        $('#view-modal-supplier').hide();
        var curr_page = $('.curr_page').val();
        window.location.href="index.php?page=supplier&index="+curr_page;
    });

    /* Start: lock */
    $('.lock_supplier').click(function() {
        // Display the form as a pop-up
        var supplier_id = $(this).closest('tr').find('.supplier_id').text();
        if(confirm('Bạn có muốn khóa nhà cung cấp có ID là ' + supplier_id + ' không?')){
            
            $.ajax({
                url: '../controller/supplier.php', // Replace with the actual PHP endpoint to fetch supplier details
                type: 'POST',
                data: {
                    'lock_supplier': true,
                    'supplier_id': supplier_id,
                },
                success: function(response){
                    const obj = JSON.parse(response);
                    if(obj.success){
                        var curr_page = $('.curr_page').val();
                        window.location.href="index.php?page=supplier&index="+curr_page;
                    }
                },
            });
        }
        
   });
    /* End: lock */

    /* Start: unlock */
    $('.unlock_supplier').click(function() {
        // Display the form as a pop-up
        var supplier_id = $(this).closest('tr').find('.supplier_id').text();
        if(confirm('Bạn có muốn mở khóa nhà cung cấp có ID là ' + supplier_id + ' không?')){

            $.ajax({
                url: '../controller/supplier.php', // Replace with the actual PHP endpoint to fetch supplier details
                type: 'POST',
                data: {
                    'unlock_supplier': true,
                    'supplier_id': supplier_id,
                },
                success: function(response){
                    const obj = JSON.parse(response);
                    if(obj.success){
                        var curr_page = $('.curr_page').val();
                        window.location.href="index.php?page=supplier&index="+curr_page;
                    }
                },
            });
        }
   });
    /* End: unlock */
});


