<?php
require 'config.php';
require 'db_config.php';


function createPromoCode(): int
{
    $promoCode = "";

    return (int)$promoCode;
}

/**
 * Function detects ip address of the request.
 * It returns valid ip address or unknown word.
 * @return string
 */
function getIpAddress(): string
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

function insertIntoStatistic(string $ipAddress, string $deviceType, string $userAgent, int $id_qr_code, int $promoCode, mysqli $connection)
{

}

//function makeRandomInt(): int
//{
//    $length = mt_rand(4, 6);
//    $down = 0;
//    $up = 9;
//    $i = 0;
//    $code = "";
//    while ($i < $length) {
//        $code .= mt_rand($down, $up);
//        $i++;
//    }
//    return settype($code, "integer");
//}

function insert_into_qr_code(string $file_name, string $title, string $code, $connection, int $small_code)
{
    $sql = "INSERT INTO qr_code(file_name,title,code,small_code)
            VALUES('$file_name','$title','$code','$small_code')";

    mysqli_query($connection, $sql) or die(mysqli_error($connection));
}

function getQrCodeData($connection)
{
//    $data = [];

    $sql = "SELECT title,file_name,code FROM qr_code ";
//    $sql = "SELECT * FROM qr_code ";

    $result = $connection->query($sql);

    while ($row = $result->fetch_assoc()) {
//        $data = $row;
        echo '<img src="codes/' . $row['file_name'] . '">';
        echo '<p> ' . $row['title'] . ' </p>';
        echo '<p> ' . $row['code'] . ' </p>';
    }

//    return $data;
}

function codeExists(mysqli $conection, $code)
{

    $sql = "SELECT code,id_qr_code FROM qr_code where small_code = '$code' ";

    $result = $conection->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $qr_code = $row['id_qr_code'];
        return $qr_code;
    }

    return false;
}

function insertStatistics(mysqli $connection, $qrCodeId, $userAgent, $ipAddress, $promoCode, $date_time)
{
    $sql = "INSERT INTO statistic(id_qr_code,user_agent,ip_address,promo_code,date_time)
            VALUES('$qrCodeId','$userAgent','$ipAddress','$promoCode','$date_time')";

    if (mysqli_query($connection, $sql)) {
        setcookie('scan', 'yes', strtotime('+15 minutes'), '/', false, false);
    } else {
        die('Data inserted already');
    }

}

function showStatistics(mysqli $connection)
{
    $sql = 'SELECT * FROM statistic order by date_time desc ';

    if (mysqli_query($connection, $sql)) {

        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        return $result;
    }
}