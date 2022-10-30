<?php
require_once 'config.php';
require_once 'db_config.php';
require_once 'functions.php';
require_once 'vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php';

if (isset($_COOKIE['dataCollected'])) {
    header('Location: https://c292-91-150-110-173.eu.ngrok.io/INTEGRISANI_WEB_SISTEMI/predavanje_1/task1/data_collected.php');
    exit();
}

$ip_address = getIpAddress();
$detect = new Mobile_Detect;

if ($detect->isMobile()) {
    $device_type = "mobile";
} else {
    $device_type = "PC";
}

//if ($detect->isTablet()) {
//    $device_type = "tablet";
//} else {
//    $device_type = "PC";
//}

$user_agent = $detect->getUserAgent();

insertIntoLog($ip_address, $device_type, $user_agent, $connection);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Roboto:wght@300;500&display=swap"
          rel="stylesheet">

    <!--My css-->
    <link rel="stylesheet" href="app.css">

    <title>Document</title>
</head>
<body>

<a href="show_logs.php">Show logs</a>

</body>
</html>

