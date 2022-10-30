<?php
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


/**
 * Returns data from qr_code table
 * @param mysqli $connection
 * @return array
 */
function getQrData(mysqli $connection): array
{
    $data = [];
    $sql = "SELECT file_name, title FROM qr_code";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = $row;
        }
    }
    return $data;
}


/**
 * Checks if code exists in qr_code table. If exists it returns id_qr_code for that code. If not exists it returns false
 * @param int $code
 * @param mysqli $connection
 * @return int|false
 */
function codeExists(int $code, mysqli $connection): int|false
{
    $sql = "SELECT id_qr_code FROM qr_code WHERE code = '$code' LIMIT 0,1";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return (int)$row['id_qr_code'];
    } else {
        return false;
    }
}


/**
 * Generates random number from 3 to 7 numbers long
 * @return int
 */
function createPromoCode(): int
{
    return mt_rand(100, 9999999);
}

/**
 * Inserts data into statistic table
 * @param int $id_qr_code
 * @param string $userAgent
 * @param string $ipAddress
 * @param string $promoCode
 * @param mysqli $connection
 * @return void
 */
function insertIntoStatistic(int $id_qr_code, string $userAgent, string $ipAddress, string $promoCode, mysqli $connection): void
{

    $sql = "INSERT INTO statistic(id_qr_code, user_agent,ip_address,promo_code,date_time)
            VALUES ('$id_qr_code','$userAgent','$ipAddress', '$promoCode',now())";

    mysqli_query($connection, $sql) or die(mysqli_error($connection));
}


/**
 * Inserts data in qr_code table
 * @param string $file_name
 * @param string $title
 * @param string $code
 * @param $connection
 * @return void
 */
function insertIntoQrTable(string $file_name, string $title, string $code, $connection): void
{
    $sql = "INSERT INTO qr_code(file_name,title,code) VALUES ('$file_name','$title','$code')";
    mysqli_query($connection, $sql) or die(mysqli_error($connection));
}

/**
 * Generates random from 4 to 6 numbers long
 * @return int
 */
function getRandomNumber(): int
{
    $length = mt_rand(4, 6);
    $down = 0;
    $up = 9;
    $i = 0;
    $code = "";
    while ($i < $length) {
        $code .= mt_rand($down, $up);
        $i++;
    }
    settype($code, "integer");
    return $code;
}

/**
 * Returns data from statistic table
 * @param mysqli $connection
 * @return array
 */
function getStatisticData(mysqli $connection): array
{
    $data = [];
    $sql = "SELECT * FROM statistic";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = $row;
        }
    }
    return $data;
}