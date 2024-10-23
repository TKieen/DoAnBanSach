/* Kiểm tra số lượng người dùng nhập có phải là một số hay không */
function validateInputQty(element) {
    let value = element.value.trim();
    
    if(isNaN(value) || value === '' || value < 1) {
        alert("Vui lòng nhập vào số lượng hợp lệ");
        setTimeout(function() {
            element.value = "1";
            element.focus();
        }, 0);
        return false;
    }
    else {
        element.value = parseInt(value);
        updateQuantity(element);
        return true;
    }

}

function updateQuantity(element) {
    //Lấy ô số lượng
    let inputQty = element.parentNode.querySelector('.input-qty');
    let qtyValue = parseInt(inputQty.value);

    //Lấy index của sản phẩm
    let productIndex = element.dataset.index;   //lấy giá trị của thuộc tính data-index

    //Tăng/ giảm số lượng
    if(element.classList.contains('minus') && (qtyValue > inputQty.min)) {
        qtyValue--;
    }
    else if(element.classList.contains('plus') && (qtyValue < inputQty.max)) {
        qtyValue++;
    }

    //Cập nhật giá trị vào ô số lượng
    inputQty.value = qtyValue;
    //Gửi yêu cầu AJAX
    $(document).ready(function () {
        $.ajax({
            url: "controller/cart.php",
            type: "POST",
            data: {
                "pro_index": productIndex,
                "quantity": qtyValue,
            },
            success: function (response) {
                console.log(response);
                let data = JSON.parse(response);
                if(data.status == 'success') {
                    //Cập nhật tổng số sản phẩm trong giỏ và tổng tiền
                    $('.total-qty').text(data.totalQty);
                    $('.total-price').text(data.totalPrice); 
                }
            },
            // error: function(jqXHR, textStatus, errorThrown) {
            //     console.log(textStatus, errorThrown);
            // }
        });
    });
}

$(document).ready(function() {
    /*Start: sign-in form*/
    $('#addToCart-form').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();

            // Serialize form data
            var formData = new FormData( $('#addToCart-form')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/addToCart.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    console.log(obj);
                    if(obj.success) window.location.href = "?page=cart";
                    else if(obj.direct) window.location.href = "?page=signIn";
                    else alert("Sản phẩm đã hết hàng");
                    
                },
            });
    });
    /* End: sign-in form */
})