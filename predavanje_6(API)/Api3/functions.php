<?php
/**Function detects ip address of the request.
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

/**Function inserts data in to log table
 * @param string $ipAddress
 * @param string $deviceType
 * @param string $userAgent
 * @param mysqli $connection
 */
function insertIntoLog(string $ipAddress, string $deviceType, string $userAgent, string $country, mysqli $connection)
{
    $sql = "INSERT INTO log(user_agent,device_type,ip_address,country, date_time)
            VALUES ('$userAgent','$deviceType','$ipAddress','$country',now())";

    mysqli_query($connection, $sql) or die(mysqli_error($connection));

}

function getCurlData($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}


//function getLogData(mysqli $connection):array
function getLogData(): array
{
    $data = [];

    $sql = "SELECT user_agent, ip_address, country, DATE_FORMAT(date_time, '%d.%m.%Y. %T') as date_time, device_type
            FROM log
            ORDER BY date_time DESC";

    $result = mysqli_query($GLOBALS['connection'], $sql) or die(mysqli_error($GLOBALS['connection']));

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $data[] = $row;
    }

    return $data;
}