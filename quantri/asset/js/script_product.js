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
        var tuasach = $('#add-form input[name="tuasach"]').val();
        var nxb = $('#add-form input[name="nxb"]').val();
        var idNCC = $('#add-form select[name="idNCC"]').val();
        var giabia = $('#add-form input[name="giabia"]').val();
        var tacgia = $('#add-form input[name="tacgia"]').val();
        var namxb = $('#add-form input[name="namxb"]').val();
        var giaban = $('#add-form input[name="giaban"]').val();
        var idTL = $('#add-form select[name="idTL"]').val();
        var mota = $('#add-form textarea[name="mota"]').val();
        var alert = formValidateProduct(tuasach, nxb, idNCC, giabia, tacgia, namxb, giaban, idTL, mota);
        if(alert ===''){
            // Serialize form data
            var formData = new FormData( $('#add-form')[0]);
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
    $('.open_edit_form').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('tr').find('.product_id').text();
        $.ajax({
            url: '../controller/product.php', // Replace with the actual PHP endpoint to fetch product details
            type: 'POST',
            data: {
                'edit_data': true,
                'product_id': product_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                var img = "../../uploads/uploads_product/"+obj.hinhanh;
                $('#edit-form #update_pic').attr('src', img);
                $('#edit-form input[name="curr_img"]').val(obj.hinhanh);
                $('#edit-form input[name="product_id"]').val(obj.idSach);
                $('#edit-form input[name="tuasach"]').val(obj.tuasach);
                $('#edit-form input[name="nxb"]').val(obj.nxb);
                $('#edit-form input[name="tacgia"]').val(obj.tacgia);
                $('#edit-form input[name="namxb"]').val(obj.namxb);
                $('#edit-form input[name="giaban"]').val(obj.giaban);
                $('#edit-form input[name="giabia"]').val(obj.giabia);
                $('#edit-form select[name="idTL"]').val(obj.idTL);
                $('#edit-form select[name="idNCC"]').val(obj.idNCC);
                $('#edit-form select[name="idMGG"]').val(obj.idMGG);
                $('#edit-form textarea[name="mota"]').html(obj.mota);
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
        var tuasach = $('#edit-form input[name="tuasach"]').val();
        var nxb = $('#edit-form input[name="nxb"]').val();
        var idNCC = $('#edit-form select[name="idNCC"]').val();
        var giabia = $('#edit-form input[name="giabia"]').val();
        var tacgia = $('#edit-form input[name="tacgia"]').val();
        var namxb = $('#edit-form input[name="namxb"]').val();
        var giaban = $('#edit-form input[name="giaban"]').val();
        var idTL = $('#edit-form select[name="idTL"]').val();
        var mota = $('#edit-form textarea[name="mota"]').val();
        var alert = formValidateProduct(tuasach, nxb, idNCC, giabia, tacgia, namxb, giaban, idTL, mota);
        if(alert ===''){
            var idMGG = $('#edit-form select[name="idMGG"]');
            if(idMGG.val() != -1){
                var phantram = parseInt(idMGG.find(":selected").text());
                //var phantram = Number(idMGG.html());
                giaban = giaban * (1- phantram/100.0);
                $('#edit-form input[name="giaban"]').val(giaban);
            }
            // Serialize form data
            var formData = new FormData( $('#edit-form')[0]);
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
                },
            });
        }
        else $('.alert').html(alert);
    });
    /* End: update form */

    /* Start: view form */
    $('.open_view_form').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('tr').find('.product_id').text();
        console.log(product_id);
        $.ajax({
            url: '../controller/product.php', // Replace with the actual PHP endpoint to fetch product details
            type: 'POST',
            data: {
                'view_data': true,
                'product_id': product_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                var img = "../../uploads/uploads_product/"+obj.hinhanh;
                $('#view-form #view_pic').attr('src', img);
                $('#view-form input[name="tuasach"]').val(obj.tuasach);
                $('#view-form input[name="nxb"]').val(obj.nxb);
                $('#view-form input[name="idNCC"]').val(obj.idNCC);
                $('#view-form input[name="tacgia"]').val(obj.tacgia);
                $('#view-form input[name="namxb"]').val(obj.namxb);
                $('#view-form input[name="giaban"]').val(obj.giaban);
                $('#view-form input[name="giabia"]').val(obj.giabia);
                $('#view-form input[name="idTL"]').val(obj.idTL);
                $('#view-form input[name="idMGG"]').val(obj.idMGG);
                $('#view-form textarea[name="mota"]').html(obj.mota);
                $('#view-form input[name="trangthai"][value="'+(obj.trangthai)+'"]').prop("checked",true);
                // // Display the view form as a pop-up
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
        window.location.href="index.php?page=product&index="+curr_page;
    });
});


