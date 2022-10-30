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

    if (!filter_var($ip, FILTER_VALIDATE_IP)) {
        $ip = "unknown";
    }

    return $ip;
}

function insertIntoLog($ipAddress, $deviceType, $userAgent, $connection)
{
    $sql = "INSERT INTO log_data(user_agent,device_type,ip_address,date_time)
            VALUES ('$userAgent','$deviceType','$ipAddress',now())";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        setcookie('dataCollected', true, strtotime('+15 seconds'), '/', false, false);
}

function getLogData($connection)
{
    $sql = "SELECT * FROM log_data;";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    return $result;
}