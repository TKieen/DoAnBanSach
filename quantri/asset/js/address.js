$(document).ready(function () {
    function populateSelect(selector, defaultText, data, keyId, keyName) {
        const $element = $(selector);
        $element.empty();
        $element.append($('<option>', {
            value: '',
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

    fetchData('../../api/getProvinces.php', {}, function(data) {
        populateSelect('#tinhdiachi', 'Chọn Tỉnh/Thành phố', data, 'id', 'name');
    });

    $('#tinhdiachi').on('change', function() {
        const provinceId = $(this).val();
        populateSelect('#huyendiachi', 'Chọn Quận/Huyện', [], 'id', 'name');
        populateSelect('#xaphuongdiachi', 'Chọn Phường/Xã', [], 'id', 'name');

        if (provinceId || provinceId !== '') {
            fetchData('../../api/getDistricts.php', { province_id: provinceId }, function(data) {
                populateSelect('#huyendiachi', 'Chọn Quận/Huyện', data, 'id', 'name');
            });
        }
    });

    $('#huyendiachi').on('change', function() {
        const districtId = $(this).val();
        populateSelect('#xaphuongdiachi', 'Phường/Xã', [], 'id', 'name');

        if (districtId || districtId !== '') {
            fetchData('../../api/getWards.php', { district_id: districtId }, function(data) {
                populateSelect('#xaphuongdiachi', 'Phường/Xã', data, 'id', 'name');
            });
        }
    });


    // $('#add-form-supplier').on('submit', function (event) {
    //     const validateField = (selector, message) => {
    //         const $field = $(selector);
    //         console.log(selector + ':  ' + $field.val());
    //         if (!$field.val() || $field.val() === '') {
    //             alert(message);
    //             $field.focus();
    //             return false;
    //         }
    //         return true;
    //     }

    //     if (!validateField('#tinhdiachi', 'Vui lòng chọn Tỉnh/Thành phố')
    //         || !validateField('#huyendiachi', 'Vui lòng chọn Quận/Huyện')
    //         || !validateField('#xaphuongdiachi', 'Vui lòng chọn Phường/Xã')
    //         || !validateField('#diachi', 'Vui lòng nhập số nhà, đường')) {

    //         event.preventDefault();
    //     }
    // });

    $.ajax({
        url: '../../controller/getProvinces.php', // URL server để lấy danh sách Tỉnh/Thành phố
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
                url: '../../controller/getDistricts.php', // URL server để lấy Quận/Huyện
                type: 'POST',
                data: {province_id: province_id},
                dataType: 'json',
                success: function(response) {
                    $('#huyendiachi').empty().append('<option value="" selected>Chọn Quận/Huyện</option>');
                    $('#xaphuongdiachi').empty().append('<option value="" elected>Chọn Xã/Phường</option>');
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
                url: '../../controller/getWards.php', // URL server để lấy Xã/Phường
                type: 'POST',
                data: {district_id: district_id},
                dataType: 'json',
                success: function(response) {
                    $('#xaphuongdiachi').empty().append('<option value="" selected>Chọn Xã/Phường</option>');
                    $.each(response, function(key, value) {
                        $('#xaphuongdiachi').append('<option value="'+ value.ward_id +'">'+ value.ward_name +'</option>');
                    });
                }
            });
        }
    });
});