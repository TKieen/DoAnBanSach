$(document).ready(function () {
    $('.exit-checkout-btn').click(function (e) { 
        e.preventDefault();
        window.location.href = '?page=home';
    });

    $('#order-submit').on('click', function () {
        if($('#diachinhan').val() === '') {
            alert("Vui lòng nhập địa chỉ nhận hàng");
            $('#diachinhan').focus();
            return false;
        }
        else {
            return true;
        }
    });

    $.ajax({
        url: 'controller/getProvinces.php', // URL server để lấy danh sách Tỉnh/Thành phố
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $.each(response, function(key, value) {
                $('#tinhdiachi').append('<option value="'+ value.province_id +'">'+ value.province_name +'</option>');
            });
        }
    });

    // Khi chọn Tỉnh/Thành phố
    $('#tinhdiachi').on('change', function() {
        var province_id = $(this).val();
        if(province_id) {
            $.ajax({
                url: 'controller/getDistricts.php', // URL server để lấy Quận/Huyện
                type: 'POST',
                data: {province_id: province_id},
                dataType: 'json',
                success: function(response) {
                    $('#huyendiachi').empty().append('<option value="" disabled selected>Chọn Quận/Huyện</option>');
                    $('#xaphuongdiachi').empty().append('<option value="" disabled selected>Chọn Xã/Phường</option>');
                    $.each(response, function(key, value) {
                        $('#huyendiachi').append('<option value="'+ value.district_id +'">'+ value.district_name +'</option>');
                    });
                }
            });
        }
    });

    // Khi chọn Quận/Huyện
    $('#huyendiachi').on('change', function() {
        var district_id = $(this).val();
        if(district_id) {
            $.ajax({
                url: 'controller/getWards.php', // URL server để lấy Xã/Phường
                type: 'POST',
                data: {district_id: district_id},
                dataType: 'json',
                success: function(response) {
                    $('#xaphuongdiachi').empty().append('<option value="" disabled selected>Chọn Xã/Phường</option>');
                    $.each(response, function(key, value) {
                        $('#xaphuongdiachi').append('<option value="'+ value.ward_id +'">'+ value.ward_name +'</option>');
                    });
                }
            });
        }
    });
});