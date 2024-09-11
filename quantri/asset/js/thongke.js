$(document).ready(function () {
    // $('#chonthoigian').html(createMonthSelectBox());

    function createMonthSelectBox() {
        let selectBox = '<select name="thang" id="xemthang">';
        let month = new Date().getMonth() + 1;
        let year = new Date().getFullYear();
        for (let i = 1; i <= month; i++) {
            for(let j = 2024; j <= year; j++) {
                selectBox += `<option value="${j}-${i}">Tháng ${i}/${j}</option>`;
            }
        }
        selectBox += '</select>';
        return selectBox;
    }

    function createYearSelectBox() {
        let selectBox = '<select name="nam" id="xemnam">';
        let year = new Date().getFullYear();
        for (let i = 2024; i <= year; i++) {
            selectBox += `<option value="${i}">${i}</option>`;
        }
        selectBox += '</select>';
        return selectBox;
    }

    $('#time').change(function() {
        let time = $('#time').val();
        if (time == 'thang') {
            $('#chonthoigian').html(createMonthSelectBox());
        } else if (time == 'nam') {
            $('#chonthoigian').html(createYearSelectBox());
        }
    });
});