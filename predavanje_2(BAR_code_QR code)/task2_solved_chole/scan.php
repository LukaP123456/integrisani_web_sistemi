<?php

require 'config.php';
require "db.php";
require 'functions.php';

$id_qr_code = codeExists((int)$_GET['code'], $connection);

if (!$id_qr_code) {
    echo "Invalid data, have a good day!";
} else if (!isset($_COOKIE['scan'])) {
    $promoCode = createPromoCode();
    $ipAddress = getIpAddress();
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    insertIntoStatistic($id_qr_code, $userAgent, $ipAddress, $promoCode,$connection);
    setcookie("scan","YES",time()+30);
    //setcookie("scan","YES",time()+15*60);
    echo "<p>Your promo code is $promoCode</p>";
} else {
    echo "<p>Please wait 15 minutes before trying again.</p>";
}
