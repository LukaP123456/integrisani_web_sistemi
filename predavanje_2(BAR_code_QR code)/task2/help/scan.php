<?php
require 'functions.php';
require 'Mobile-Detect-2.8.39/Mobile_Detect.php';

$code = (int)$_GET['code'];

if (is_integer($code) and codeExists($connection, code: $_GET['code'])) {
    if (!isset($_COOKIE['scan'])) {
        $qrCodeId = codeExists($connection, $_GET['code']);

        $ip_address = getIpAddress();
        $promo_code = random_int(100, 1000000);

        $detect = new Mobile_Detect;
        $user_agent = $detect->getUserAgent();

        $date_time = date('Y-m-d H:i:s');

        echo '<h1>Your promo code is: ' . $promo_code . '</h1>';

        insertStatistics(connection: $connection, qrCodeId: $qrCodeId, userAgent: $user_agent, ipAddress: $ip_address, promoCode: $promo_code, date_time: $date_time);
    }else{
        echo '<h1> QR code invalid come back in 15 minutes </h1>';
    }
} else {
    echo '<h1> Invalid data, have a good day! </h1>';
}