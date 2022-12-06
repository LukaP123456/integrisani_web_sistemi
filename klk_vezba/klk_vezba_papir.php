<?php

// var_dump($_SERVER['HTTP_ACCEPT']);
// var_dump($_SERVER['REMOTE_ADDR']);
// var_dump($_SERVER);
// var_dump($_SERVER['HTTP_USER_AGENT']);
// var_dump($_SERVER['HTTP_ACCEPT_LANGUAGE']);

// $header = "text/html";
// if (isset($_SERVER['HTTP_ACCEPT'])) {
//     $accept = $_SERVER["HTTP_ACCEPT"];
//     if (strpos($accept, $header) === false) {
//         $message = "The first";
//         $color = "#f00";
//     } else {
//         $message = "The second";
//         $color = "#0f0"; //RGB
//     }
// } else {
//     $message = "The third";
//     $color = "#00f";
// }
// echo '<p style="color:' . $color . '">' . $message . '</p>';

// require_once 'config.php';
// require_once 'db_config.php';
// require_once 'functions.php';
// require_once 'Mobile-Detect-2.8.34/Mobile_Detect.php';
// if (!isset($_COOKIE['MOBILE'])) {
    //    $detect = new Mobile_Detect();
    //    $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
    //    $ipAddress = getIpAddress();
    //    $userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "";
    //    insertIntoLog($ipAddress, $deviceType, $userAgent, $connection);
//     setcookie('MOBILE', 'YES', time() + 900, "/php/", "", true, true);
//     $c = "#0f0";
// } else {
//     $c = "#ff0";
// }
// echo '<p style="color:' . $c . '">Welcome to our site</p>';
