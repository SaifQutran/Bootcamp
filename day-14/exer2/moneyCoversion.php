<?php
$rate = rand(100, 135) / 100;
$amount = isset($_GET['amount']) && $_GET['amount'] > 0 ? $_GET['amount'] : 1   ;
$money = [
    'USD' => round($amount * 1710 * $rate, 2),
    'SR' => round($amount * 450 * $rate, 2)
];
if (isset($_GET['currency']))
    echo json_encode($money[$_GET['currency']]);
else
    echo json_encode($money);
