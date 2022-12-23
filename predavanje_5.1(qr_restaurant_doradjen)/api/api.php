<?php
require '../admin/includes/config.php';
require '../admin/includes/db.php';
require '../admin/includes/functions.php';

header("Content-type: application/json; charset=UTF-8");
http_response_code(200);
$method = $_SERVER["REQUEST_METHOD"];
if (strtolower($_SERVER["REQUEST_METHOD"]) == "get") {
    $data = getCategories($connection);
    $message = "Statistics data fetched successfully";
    $status = 200;
} else {
    $message = $_SERVER['REQUEST_METHOD'] . " method is not allowed. Only get is allowed.";
    $data = null;
    $status = 405;
}

echo json_encode([
    "message" => $message,
    "data" => $data,
    "status" => $status
]);
