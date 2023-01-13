<?php
header("Content-type: application/json; charset=UTF-8");

define("TOKEN", "217658fhjUjnJkpSLSLSok9948x7238Mnknfhu4721");
require_once "db_config.php";
require_once "functions.php";

$data = $token = $userAgent = $messageUser = "";

$json_temp = file_get_contents("php://input");

$json = json_decode($json_temp, true);

http_response_code(200);

if (strtolower($_SERVER['REQUEST_METHOD']) == "post" and !empty($json) and $json['token'] == TOKEN) {

    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
    }

    $messageUser = urldecode(strip_tags(trim($json['message'])));
    $ipAddress = getIpAddress();
    $country = getCountryByIp($ipAddress);

    $id_device = insertIntoDevice($userAgent, $ipAddress, $country);

    insertIntoMessage($id_device, $messageUser);

    echo json_encode([
        "status" => 200,
        "message" => "Message was sent to server."
    ]);

} else {
    echo json_encode([
        "status" => 405,
        "message" => $_SERVER['REQUEST_METHOD'] . " method is not allowed. Only post method is allowed."
    ]);
}
?>