$(document).ready(function () {
    function populateSelect(elementId, defaultText, data, keyId, keyName) {
        const $element = $(`#${elementId}`);
        $element.empty();
        $element.append($('<option>', {
            value: null,
            text: defaultText
        }));
        $.each(data, function(i, item) {
            $element.append($('<option>', {
                value: item[keyId],
                text: item[keyName]
            }));
        });
    }

    function fetchData(url, params, onSuccess) {
        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json',
            data: params,
            success: onSuccess,
            error: function(xhr, textStatus, errorThrown) {
                console.error(`Error fetching data from ${url}:`, errorThrown);
            }
        });
    }

    fetchData('api/getProvinces.php', {}, function(data) {
        populateSelect('tinhdiachi', 'Tỉnh/Thành phố', data, 'id', 'name');
    });

    $('#tinhdiachi').on('change', function() {
        const provinceId = $(this).val();
        populateSelect('huyendiachi', 'Quận/Huyện', [], 'id', 'name');
        populateSelect('xaphuongdiachi', 'Phường/Xã', [], 'id', 'name');

        if (provinceId) {
            fetchData('api/getDistricts.php', { province_id: provinceId }, function(data) {
                populateSelect('huyendiachi', 'Quận/Huyện', data, 'id', 'name');
            });
        }
    });

    $('#huyendiachi').on('change', function() {
        const districtId = $(this).val();
        populateSelect('xaphuongdiachi', 'Phường/Xã', [], 'id', 'name');

        if (districtId) {
            fetchData('api/getWards.php', { district_id: districtId }, function(data) {
                populateSelect('xaphuongdiachi', 'Phường/Xã', data, 'id', 'name');
            });
        }
    });



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