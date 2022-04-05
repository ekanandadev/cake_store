<?php
require_once '../../config/midtrans-php-master/Midtrans.php';
\Midtrans\Config::$serverKey = 'SB-Mid-server-8b4NPzEaHwF8JPbXXbpbhIQ0';
\Midtrans\Config::$isProduction = false;
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

$params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => 15000,
    ),
    'customer_details' => array(
        'first_name' => 'budi',
        'last_name' => 'pratama',
        'email' => 'budi.pra@example1.com',
        'phone' => '0811113222333',
    ),
);

$snapToken = \Midtrans\Snap::getSnapToken($params);
header('Location: https://app.sandbox.midtrans.com/snap/v2/vtweb/'. $snapToken);
