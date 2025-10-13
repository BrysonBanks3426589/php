<?php
function priceCalc($price, $quantity) {
    $discounts = [0, 0, 0.05, 0.10, 0.20, 0.25]; // index is quantity

    $index = $quantity;
    if ($index > 5) {
        $index = 5;
    }

    $discount = $discounts[$index];
    $total = $price * $quantity * (1 - $discount);
    
    return round($total, 2);
}
?>
