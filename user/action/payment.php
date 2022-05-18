<?php
require_once '../../config/midtrans-php-master/Midtrans.php';
\Midtrans\Config::$serverKey = 'SB-Mid-server-8b4NPzEaHwF8JPbXXbpbhIQ0';
\Midtrans\Config::$isProduction = false;
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;


$params = array(
    'transaction_details' => array(
        'order_id' => $_POST['order_id'],
        'gross_amount' => $_POST['total_price'],
    ),
    'customer_details' => array(
        'first_name' => $_POST['customer_name'],
        'phone' => $_POST['phone_number'],
    ),
);

$snapToken = \Midtrans\Snap::getSnapToken($params);
header('Location: https://app.sandbox.midtrans.com/snap/v2/vtweb/'. $snapToken);
