<?php
    function totalPriceInCart() {
        $total_price = 0;
        if(isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $total_price += $item[4] * $item[5];
            }
        }
        return $total_price;
    }
?>