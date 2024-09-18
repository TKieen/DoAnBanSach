/* add-data form */
$(document).ready(function() {

    /* Start: edit form */
    $('.open_edit_form_order').click(function(e) {
        e.preventDefault();
        var order_id = $(this).closest('tr').find('.order_id').text();
        $.ajax({
            url: '../controller/order.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'edit_data_order': true,
                'order_id': order_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                var ctdonhang = obj.order_details;
                console.log(ctdonhang);
                var flag = true;
                var result = 
                '<tr class="title">'+
                    '<th>ID</th>'+
                    '<th>Sản phẩm</th>'+
                    '<th>Số lượng</th>'+
                    '<th>Đơn giá</th>'+
                    '<th>Thành tiền</th>'+
                '</tr>';
                for(var i=0; i<ctdonhang.length; i++){
                    var thanhtien = (parseInt(ctdonhang[i].thanhtien)).toLocaleString(
                        undefined, // leave undefined to use the visitor's browser 
                                   // locale or a string like 'en-US' to override it.
                        { maximumFractionDigits: 2 }
                      ).replace(/,/g, '.');
                    var gialucdat = (parseInt(ctdonhang[i].gialucdat)).toLocaleString(
                    undefined, // leave undefined to use the visitor's browser 
                                // locale or a string like 'en-US' to override it.
                    { maximumFractionDigits: 0 }
                    ).replace(/,/g, '.');
                    result+=
                    '<tr>'+
                    '<td class="product_id">'+ctdonhang[i].idSach+'</td>'+
                    '<td>'+ctdonhang[i].tuasach+'</td>'+
                    '<td>'+ctdonhang[i].soluong+'</td>'+
                    '<td>'+gialucdat+'đ</td>'+
                    '<td>'+thanhtien+'đ</td>'+
                '</tr>';
                }
                $(".ctdonhang").html(result);
                
                var donhang = obj.order_info;
                $('#edit-form-order input[name="order_id"]').val(donhang.idDH);
                var khachhang = "#"+donhang.idTK+" - "+donhang.tenTK;
                $('#edit-form-order input[name="khachhang"]').val(khachhang);
                $('#edit-form-order input[name="dienthoai"]').val(donhang.dienthoai);
                $('#edit-form-order input[name="diachigiao"]').val(donhang.diachigiao);
                $('#edit-form-order input[name="ngaytao"]').val(donhang.ngaytao);
                $('#edit-form-order input[name="ngaycapnhat"]').val(donhang.ngaycapnhat);
                $('#edit-form-order input[name="tongsanpham"]').val(donhang.tongsanpham);
                var tongtien = (parseInt(donhang.tongtien)).toLocaleString(
                    undefined, // leave undefined to use the visitor's browser 
                                // locale or a string like 'en-US' to override it.
                    { maximumFractionDigits: 0 }
                    ).replace(/,/g, '.');
                $('#edit-form-order input[name="tongtien"]').val(tongtien+"đ");

                // cho duyet: huy, cap nhat
                // dang giao: cap nhat
                // da giao: ko co
                // huy : ko co
                if(donhang.trangthai == "dagiao"){
                    $('#edit-form-order select[name="trangthai"]').append($("<option>").val("ht").text("Hoàn tất"));
                    $('#edit-form-order select[name="trangthai"]').prop("disabled",true);
                }
                else if(donhang.trangthai == "huykh"){
                    $('#edit-form-order select[name="trangthai"]').append($("<option>").val("huykh").text("Hủy bởi khách hàng"));
                    $('#edit-form-order select[name="trangthai"]').prop("disabled",true);
                }
                else if(donhang.trangthai == "huynv"){
                    $('#edit-form-order select[name="trangthai"]').append($("<option>").val("huynv").text("Hủy bởi người bán"));
                    $('#edit-form-order select[name="trangthai"]').prop("disabled",true);
                }
                else if(donhang.trangthai == "vc"){
                    $('#edit-form-order select[name="trangthai"]').append($("<option>").val("vc").text("Đang vận chuyển"));
                    $('#edit-form-order select[name="trangthai"]').append($("<option>").val("ht").text("Hoàn tất"));
                }
                else if(donhang.trangthai == "cho"){
                        $('#edit-form-order select[name="trangthai"]').append($("<option>").val("cho").text("Chờ duyệt"));
                        $('#edit-form-order select[name="trangthai"]').append($("<option>").val("vc").text("Đang vận chuyển"));
                        $('#edit-form-order select[name="trangthai"]').append($("<option>").val("huynv").text("Hủy bởi người bán"));
                    }

                $('#edit-form-order select[name="trangthai"]').val(donhang.trangthai);
                $('#edit-form-order input[name="idNV"]').val(donhang.idNV);
                // // Display the edit form as a pop-up
                $('#edit-modal-order').show();
            },

        });
    });
    /* End: edit form */

        /* update data */
    $('#edit-form-order').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // Serialize form data
        var formData = new FormData( $('#edit-form-order')[0]);
        // AJAX request to handle form submission
        $.ajax({
            url: '../controller/order.php', // URL to handle form submission
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success) {
                    
                    $('.alert').html('<span class="green">Cập nhật thành công</span>');
                }
            },
        });
    });
    /* End: update form */

    /* Start: view form */
    $('.open_view_form_order').click(function(e) {
        e.preventDefault();
        var order_id = $(this).closest('tr').find('.order_id').text();
        $.ajax({
            url: '../controller/order.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'view_data_order': true,
                'order_id': order_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                var ctdonhang = obj.order_details;
                console.log(ctdonhang);
                var result = 
                '<tr class="title">'+
                    '<th>ID</th>'+
                    '<th>Sản phẩm</th>'+
                    '<th>Số lượng</th>'+
                    '<th>Đơn giá</th>'+
                    '<th>Thành tiền</th>'+
                '</tr>';
                for(var i=0; i<ctdonhang.length; i++){
                    var thanhtien = (parseInt(ctdonhang[i].thanhtien)).toLocaleString(
                        undefined, // leave undefined to use the visitor's browser 
                                   // locale or a string like 'en-US' to override it.
                        { maximumFractionDigits: 2 }
                      ).replace(/,/g, '.');
                    var gialucdat = (parseInt(ctdonhang[i].gialucdat)).toLocaleString(
                    undefined, // leave undefined to use the visitor's browser 
                                // locale or a string like 'en-US' to override it.
                    { maximumFractionDigits: 0 }
                    ).replace(/,/g, '.');
                    result+=
                    '<tr>'+
                    '<td class="product_id">'+ctdonhang[i].idSach+'</td>'+
                    '<td>'+ctdonhang[i].tuasach+'</td>'+
                    '<td>'+ctdonhang[i].soluong+'</td>'+
                    '<td>'+gialucdat+'đ</td>'+
                    '<td>'+thanhtien+'đ</td>'+
                '</tr>';
                }
                $(".ctdonhang").html(result);

                var donhang = obj.order_info;
                var khachhang = donhang.tenTK+" - #"+donhang.idTK;
                $('#view-form-order input[name="khachhang"]').val(khachhang);
                $('#view-form-order input[name="dienthoai"]').val(donhang.dienthoai);
                $('#view-form-order input[name="diachigiao"]').val(donhang.diachigiao);
                $('#view-form-order input[name="ngaytao"]').val(donhang.ngaytao);
                $('#view-form-order input[name="ngaycapnhat"]').val(donhang.ngaycapnhat);
                $('#view-form-order input[name="tongsanpham"]').val(donhang.tongsanpham);
                var tongtien = (parseInt(donhang.tongtien)).toLocaleString(
                    undefined, // leave undefined to use the visitor's browser 
                                // locale or a string like 'en-US' to override it.
                    { maximumFractionDigits: 0 }
                    ).replace(/,/g, '.');
                $('#view-form-order input[name="tongtien"]').val(tongtien+"đ");
                $('#view-form-order select[name="trangthai"]').val(donhang.trangthai);
                $('#view-form-order input[name="idNV"]').val(donhang.idNV);
                // // Display the edit form as a pop-up
                $('#view-modal-order').show();
            },

        });
    });
    /* End: view form */

    // Event listener for close button clicks
    $('.close-btn-order').click(function() {
        // Hide the edit form modal
        $('.alert').html('');
        $('#edit-modal-order').hide();
        $('#view-modal-order').hide();
        $('#view-modal-product').hide();
        var curr_page = $('.curr_page').val();
        window.location.href="index.php?page=order&index="+curr_page;
    });
});



