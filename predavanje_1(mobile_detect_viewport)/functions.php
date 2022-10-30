<?php

function getIpAddress()
{

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    $ip = "43434";

    if(!filter_var($ip, FILTER_VALIDATE_IP)) {
        $ip = "unknown";
    }

    return $ip;
}

function insertIntoLog($ipAddress, $deviceType, $userAgent, $connection)
{
    $sql = "INSERT INTO log(user_agent,device_type,ip_address,date_time)
            VALUES ('$userAgent','$deviceType','$ipAddress',now())";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
}