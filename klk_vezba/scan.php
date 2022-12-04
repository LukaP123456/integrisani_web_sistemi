<?php
require "config.php";
require "functions.php";
require "db_config.php";
require_once 'Mobile-Detect-2.8.39/Mobile_Detect.php';

if (isset($_GET['id']) and isset($_GET['h'])) {
    $hash = $_GET['h'];
    $id = $_GET['id'];
    $connection = databaseConnect();

    if (!codeExists(hash: $hash, id: $id, connection: $connection)) {
        insertIntoError($hash, $id, $connection);
        echo "No valid data";
    }

    if (!isset($_COOKIE['scan'])) {
        $ip = getIpAddress();
        $detect = new Mobile_Detect();
        $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? "";
        $accept = $_SERVER['HTTP_ACCEPT'];
        insertIntoScanLog(
            id_qr_code: $id,
            http_user_agent: $userAgent,
            http_accept: $accept,
            device_type: $deviceType,
            ip_address: $ip,
            connection: $connection
        );
        setcookie('scan', md5("True"), strtotime("20 seconds"), "/","",true,true);

        $data = getQrData($connection);
        foreach ($data as $item) {
            $img = $item['image'];
            $text = $item['text'];
            $date_time = $item['date_time_created'];
            echo "<img src='codes/$img' alt='qrKod'>
            Text: <p>$text</p><br>
            Date & Time: <p>$date_time</p>
            ";
        }

    }



}