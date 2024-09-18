/* add-data form */
$(document).ready(function() {
    /* Start: add form */
    $('.open_add_form_product').click(function() {
        // Display the form as a pop-up
       $('#add-modal-product').show();
   });

    $('#add-form-product').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
    
        // validate form
        var tuasach = $('#add-form-product input[name="tuasach"]').val();
        var nxb = $('#add-form-product input[name="nxb"]').val();
        var idNCC = $('#add-form-product select[name="idNCC"]').val();
        var giabia = $('#add-form-product input[name="giabia"]').val();
        var tacgia = $('#add-form-product input[name="tacgia"]').val();
        var namxb = $('#add-form-product input[name="namxb"]').val();
        var idTL = $('#add-form-product select[name="idTL"]').val();
        var mota = $('#add-form-product textarea[name="mota"]').val();
        var alert = formValidateProduct(tuasach, nxb, idNCC, giabia, tacgia, namxb, idTL, mota);
        if(alert ===''){
            // Serialize form data
            var formData = new FormData( $('#add-form-product')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: '../controller/product.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success)
                        $('.alert').html('<span class="green">Thêm thành công.</span>');
                    else $('.alert').html('<span class="red">Sách này đã tồn tại.</span>');
                },
            });
        }
        else $('.alert').html(alert);
    });
    /* End: add form */

    /* Start: update form */
    $('.open_edit_form_product').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('tr').find('.product_id').text();
        $.ajax({
            url: '../controller/product.php', // Replace with the actual PHP endpoint to fetch product details
            type: 'POST',
            data: {
                'edit_data_product': true,
                'product_id': product_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                var img = "../../uploads/uploads_product/"+obj.hinhanh;
                $('#edit-form-product #update_pic').attr('src', img);
                $('#edit-form-product input[name="curr_img"]').val(obj.hinhanh);
                $('#edit-form-product input[name="product_id"]').val(obj.idSach);
                $('#edit-form-product input[name="tuasach"]').val(obj.tuasach);
                $('#edit-form-product input[name="nxb"]').val(obj.nxb);
                $('#edit-form-product input[name="tacgia"]').val(obj.tacgia);
                $('#edit-form-product input[name="namxb"]').val(obj.namxb);
                $('#edit-form-product input[name="giaban"]').val(obj.giaban);
                $('#edit-form-product input[name="giabia"]').val(obj.giabia);
                if(obj.trangthaiTL == 0){
                    var newOption = $('<option>', {
                        value: obj.idTL,
                        text: obj.tenTL
                    });
                    $('#edit-form-product select[name="idTL"]').append(newOption);
                }
                $('#edit-form-product select[name="idTL"]').val(obj.idTL);
                $('#edit-form-product select[name="idNCC"]').val(obj.idNCC);
                $('#edit-form-product select[name="idMGG"]').val(obj.idMGG);
                //ma giam gia dang hoat dong 
                $('#edit-form-product select[name="idMGG"]').html(obj.optionsMGG);
                $('#edit-form-product textarea[name="mota"]').html(obj.mota);
                $('#edit-form-product input[name="trangthai"][value="'+(obj.trangthai)+'"]').prop("checked",true);
    
                //Display the edit form as a pop-up
                $('#edit-modal-product').show();
            },
        });
    });

        /* update data */
    $('#edit-form-product').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        // validate form
        var mota = $('#edit-form-product textarea[name="mota"]').val();
        var alert = formValidateProduct_edit(mota);
        if(alert ===''){
            // Serialize form data
            var formData = new FormData( $('#edit-form-product')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: '../controller/product.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success) $('.alert').html('<span class="green">Cập nhật thành công</span>');
                    else $('.alert').html('<span class="red">Sách này đã tồn tại.</span>');
                },
            });
        }
        else $('.alert').html(alert);
    });
    /* End: update form */

    /* Start: view form */
    $('.open_view_form_product').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('tr').find('.product_id').text();
        console.log(product_id);
        $.ajax({
            url: '../controller/product.php', // Replace with the actual PHP endpoint to fetch product details
            type: 'POST',
            data: {
                'view_data_product': true,
                'product_id': product_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                var img = "../../uploads/uploads_product/"+obj.hinhanh;
                $('#view-form-product #view_pic').attr('src', img);
                $('#view-form-product input[name="tuasach"]').val(obj.tuasach);
                $('#view-form-product input[name="nxb"]').val(obj.nxb);
                $('#view-form-product input[name="idNCC"]').val(obj.idNCC);
                $('#view-form-product input[name="tacgia"]').val(obj.tacgia);
                $('#view-form-product input[name="namxb"]').val(obj.namxb);
                $('#view-form-product input[name="giaban"]').val(obj.giaban);
                $('#view-form-product input[name="giabia"]').val(obj.giabia);
                $('#view-form-product input[name="idTL"]').val(obj.idTL);
                $('#view-form-product input[name="idMGG"]').val(obj.idMGG);
                $('#view-form-product textarea[name="mota"]').html(obj.mota);
                $('#view-form-product input[name="trangthai"][value="'+(obj.trangthai)+'"]').prop("checked",true);
                // // Display the view form as a pop-up
                $('#view-modal-product').show();
            },

        });
    });
    /* End: view form */
    
    // Event listener for close button clicks
    $('.close-btn-product').click(function() {
        // Hide the edit form modal
        $('.alert').html('');
        $('#add-modal-product').hide();
        $('#update_file').val('');
        $('#edit-modal-product').hide();
        $('#view-modal-product').hide();
        var curr_page = $('.curr_page').val();
        window.location.href="index.php?page=product&index="+curr_page;
    });

    /* Start: lock */
    $('.lock_product').click(function() {
        console.log("hello");
        // Display the form as a pop-up
        var product_id = $(this).closest('tr').find('.product_id').text();
        $.ajax({
            url: '../controller/product.php', // Replace with the actual PHP endpoint to fetch product details
            type: 'POST',
            data: {
                'lock_product': true,
                'product_id': product_id,
            },
            success: function(response){
                const obj = JSON.parse(response);
                if(obj.success){
                    var curr_page = $('.curr_page').val();
                    window.location.href="index.php?page=product&index="+curr_page;
                }
            },
        });
   });
    /* End: lock */

    /* Start: unlock */
    $('.unlock_product').click(function() {
        // Display the form as a pop-up
        var product_id = $(this).closest('tr').find('.product_id').text();
        $.ajax({
            url: '../controller/product.php', // Replace with the actual PHP endpoint to fetch product details
            type: 'POST',
            data: {
                'unlock_product': true,
                'product_id': product_id,
            },
            success: function(response){
                const obj = JSON.parse(response);
                if(obj.success){
                    var curr_page = $('.curr_page').val();
                    window.location.href="index.php?page=product&index="+curr_page;
                }
            },
        });
   });
    /* End: unlock */
});