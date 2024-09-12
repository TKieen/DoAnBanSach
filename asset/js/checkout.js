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
});