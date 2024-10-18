/* add-data form */
$(document).ready(function() {

    /* open-add form */
   $('.open_add_form_phieunhapkho').click(function(e) {
    e.preventDefault();

        $.ajax({
            url: '../controller/phieunhapkho.php', // Replace with the actual PHP endpoint to fetch product details
            type: 'POST',
            data: {
                'open_phieunhapkho': true,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);

                var options = "";
                if(obj!=null){
                    for(var i=0; i<obj.length; i++)
                        options+=
                    '<option value="'+obj[i].idNCC+'">'+obj[i].tenNCC+'</option>';
                }
                $('#add-form-phieunhapkho select[name="idNCC"]').html(options);
                // // Display the edit form as a pop-up
                $('#add-modal-phieunhapkho').show();
            },
        });
    });

    $('#add-form-phieunhapkho').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        $chietkhau = $('#add-form-phieunhapkho input[name="chietkhau"]').val();
        if($chietkhau <= 0 || $chietkhau >=100) $('.alert').html('<span class="red">Chiết khấu không hợp lệ</span>');
        else{    
            // Serialize form data
        var idNCC = $('#add-form-phieunhapkho select[name="idNCC"]').val();
        window.location.href="?page=add_phieunhapkho&idNCC="+idNCC+"&chietkhau="+$chietkhau;
        }
    });
    /* End: add form */

    /* Start: open add PODUCT PN */
    /* Start: add form */
    $('.open_add_form_product_PN').click(function() {
        // Display the form as a pop-up
        var idNCC = $('.inventory input[name="idNCC"]').val();
        $('#add-form-product select[name="idNCC"]').val(idNCC);
        $('#add-form-product select[name="idNCC"]').prop("disabled",true);
        $('#add-form-product input[name="idNCC_hidden"]').val(idNCC);
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
    var giaban = $('#add-form-product input[name="giaban"]').val();
    var idTL = $('#add-form-product select[name="idTL"]').val();
    var mota = $('#add-form-product textarea[name="mota"]').val();
    var alert = formValidateProduct(tuasach, nxb, idNCC, giabia, tacgia, namxb, giaban, idTL, mota);
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
/* End: product form */

/* Start: view form */
$(document).on('click', '.open_view_form_product', function() {
    var selectedOptionText = $(this).closest('tr').find('select[name="product[]"] option:selected');
    var product_id = selectedOptionText.data('id');
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

/* Start: remove a row */
$(document).on('click', '.delete_row', function() {
    // Find and remove the closest <tr> element
    $(this).closest('tr').remove();
});
/* End: remove a row */

/* Start: add a new row */
$('.add-new-row').click(function(e) {
    e.preventDefault(); // Prevent default link behavior

    // Clone the first row of tbody
    var newRow = $('.template').clone().removeClass('template');

    // Clear input fields in the cloned row
    newRow.find('input[type="number"]').val('');
    newRow.find('input[type="text"]').val('');
    var supplier_id = $('input[name="idNCC"]').val();
    // Update product options
    $.ajax({
        url: '../controller/product.php',
        type: 'POST',
        data:{
            'get_product_by_supplier': true,
            'supplier_id': supplier_id,
        },
        success: function(response) {
            console.log(response);
            const obj = JSON.parse(response);
            // Populate select element with fetched data
            var selectElement = newRow.find('select[name="product[]"]');
            selectElement.empty(); // Clear existing options
            selectElement.append('<option value="-1">---Chọn---</option>'); // Add default option
            $.each(obj, function(index, item) {
                selectElement.append('<option value="' + item.idSach + '" data-giabia="' + item.giabia + '" data-id="' + item.idSach + '">' + item.idSach + ' - ' + item.tuasach + '</option>');
            });
        },
    });

    // Append the cloned row to tbody
    $('tbody').append(newRow);
});

/* End: add a new row */

/* Start: update good receive note */
$('button[name="update_btn"]').click(function(){
    var soluong = $('.inventory input[name="soluong[]"]');
    if(formValidateInventory2(soluong) === true){
        var formData = new FormData( $('#inventory_form')[0]);
        formData.append('update_btn', true);
        $.ajax({
            url: '../controller/phieunhapkho.php', // URL to handle form submission
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success){
                    var tongtien = (obj.tongtien).toLocaleString(
                        undefined, // leave undefined to use the visitor's browser 
                                   // locale or a string like 'en-US' to override it.
                        { maximumFractionDigits: 2 }
                      ).replace(/,/g, '.');
                    tongtien+="đ";
                    $('.tongsoluong').html(obj.tongsoluong);
                    console.log(obj.thanhtien_arr);
                    $('.idNV').html(obj.idNV);
                    $('.tongtien').html(tongtien);
                    $('.ngaycapnhat').html(obj.ngaycapnhat);
                    var i=0;
                    (obj.thanhtien_arr).forEach(element => {
                        element = (element).toLocaleString(undefined,{ maximumFractionDigits: 2 }).replace(/,/g, '.');
                        element+="đ";
                        $('.thanhtien').eq(i++).html(element);
                    });
                    alert("Đã cập nhật thành công");    
                }
            },
        });
    }
});
/* End: update good receive note */

/* Start: complete good receive note */
    $('button[name="complete_btn"]').click(function(){
        console.log("hello");
        var formData = new FormData( $('#inventory_form')[0]);
        formData.append('complete_btn', true);
        $.ajax({
            url: '../controller/phieunhapkho.php', // URL to handle form submission
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success){
                    $('.idNV').html(obj.idNV);
                    alert("Đã cập nhật thành công");
                    window.location.href="?page=phieunhapkho";
                }
            },
        });
    });
/* End: complete good receive note */

/* Start: cancel good receive note */
$('button[name="cancel_btn"]').click(function(){
    console.log("hello");
    var formData = new FormData( $('#inventory_form')[0]);
    formData.append('cancel_btn', true);
    $.ajax({
        url: '../controller/phieunhapkho.php', // URL to handle form submission
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            const obj = JSON.parse(response);
            if(obj.success){
                $('.idNV').html(obj.idNV);
                alert("Đã hủy thành công");
                window.location.href="index.php?page=phieunhapkho";
            }
        },
    });
});
/* End: cancel good receive note */

/* Start: search product */
$(document).on('change', '.inventory select[name="product[]"]', function(){
    var selectedOption = $(this).find('option:selected');
    var tr = $(this).closest('tr');
    var giabia = selectedOption.data('giabia');
    // gia nhap
    var chietkhau = $('.inventory input[name="chietkhau"]').val();
    console.log(chietkhau);
    var gianhap = ((100-chietkhau)/100)*giabia;
    console.log(tr.find('input[name="gianhap[]"]'));
    tr.find('input[name="gianhap[]"]').val(gianhap);
    console.log(gianhap);
    gianhap = gianhap.toLocaleString(
        undefined, // leave undefined to use the visitor's browser 
                   // locale or a string like 'en-US' to override it.
        { maximumFractionDigits: 2 }
      ).replace(/,/g, '.');
    gianhap +="đ";
    // gia bia
    giabia = giabia.toLocaleString(
        undefined, // leave undefined to use the visitor's browser 
                   // locale or a string like 'en-US' to override it.
        { maximumFractionDigits: 2 }
      ).replace(/,/g, '.');
    giabia +="đ";
    tr.find('.giabia').html(giabia);
    tr.find('.gianhap').html(gianhap);
});
/* End: search product */

/* Start: add inventory form */
$('.inventory').submit(function(event) {
    // Prevent the default form submission
    event.preventDefault();
    
    // validate form
    var sanpham = $('.inventory select[name="product[]"]').not(':first');
    var soluong = $('.inventory input[name="soluong[]"]').not(':first');
    if(formValidateInventory(sanpham, soluong) === true){
        // Serialize form data
        var formData = new FormData( $('.inventory')[0]);
        // AJAX request to handle form submission
        $.ajax({
            url: '../controller/phieunhapkho.php', // URL to handle form submission
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success){
                    var tongtien = (obj.tongtien).toLocaleString(
                        undefined, // leave undefined to use the visitor's browser 
                                   // locale or a string like 'en-US' to override it.
                        { maximumFractionDigits: 2 }
                      ).replace(/,/g, '.');
                    tongtien+="đ";
                    $('.tongsoluong').html(obj.tongsoluong);
                    console.log(obj.thanhtien_arr);
                    $('.tongtien').html(tongtien);
                    var i=1;
                    (obj.thanhtien_arr).forEach(element => {
                        element = (element).toLocaleString(undefined,{ maximumFractionDigits: 2 }).replace(/,/g, '.');
                        element+="đ";
                        $('.thanhtien').eq(i++).html(element);
                    });
                    alert("Đã thêm thành công"); 
                    window.location.href="index.php?page=phieunhapkho";
                }
                            
            },
        });
    }
});
/* End: add inventory form */
    /* End: open add product PN */
    // Event listener for close button clicks
    $('.close-btn-phieunhapkho').click(function() {
        // Hide the edit form modal
        $('.alert').html('');
        $('#add-modal-phieunhapkho').hide();
    });

     // Event listener for close button clicks
     $('.close-btn-product').click(function() {
        // Hide the edit form modal
        $('.alert').html('');
        $('#add-modal-product').hide();
        $('#view-modal-product').hide();
    });
});