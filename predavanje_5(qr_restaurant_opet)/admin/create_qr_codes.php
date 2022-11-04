<?php
require 'includes/config.php';
require 'includes/db.php';
require 'includes/functions.php';

$number = (int)trim($_POST['number']);

if (empty($number)) {
    header("location:qr_codes.php?m=1");
    exit();
} else if (dataExists('id_restaurant_table', 'restaurant_tables', 'number', $number,$connection)) {
    header("location:qr_codes.php?m=2");
    exit();
} else {
    $token = generateToken();

    require 'phpqrcode/qrlib.php';

    $fileName = 'code_' . md5(time()) . ".png";
    $pngAbsoluteFilePath = DIRPATH . $fileName;

    if (!file_exists($pngAbsoluteFilePath)) {
        $url = SERVER . "scan.php?t=$token";
        QRcode::png($url, $pngAbsoluteFilePath, QR_ECLEVEL_L, 8);
        $id_restaurant_table = insertIntoRestaurantTable($number, $connection);
        insertIntoQrCodeTable($id_restaurant_table, $url, $fileName, $token, $connection);
        header("location:qr_codes.php?m=3");
        exit();
    }
}