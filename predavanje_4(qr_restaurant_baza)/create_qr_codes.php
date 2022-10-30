<?php
require 'includes/config.php';
require 'includes/functions.php';
require 'phpqrcode/qrlib.php';

if (isset($_POST['tableNumber']) && !empty($_POST['tableNumber'])) {
    $tableNumber = (int)$_POST['tableNumber'];
} else {
    header("location: ./qr_codes.php");
    exit;
}

$token = generateToken();

$random_num = md5(time());
$FileName = 'code_' . $random_num . ".png";
$pngAbsoluteFilePath = DIRPATH . $FileName;

if (!file_exists($pngAbsoluteFilePath)) {
    $code = SERVER . "scan.php?t= $token";
    QRcode::png($code, $pngAbsoluteFilePath, QR_ECLEVEL_L, 4);
//        insertIntoQrTable($FileName, "Title is $random_num", $random_num, $connection);
    echo "<p>Code generated successfully.</p>";
}
