<?php

require 'phpqrcode/qrlib.php';
require 'functions.php';
require 'db_config.php';

$tempDir = "codes/";

for ($i = 0; $i < 4; $i++) {
    $random_int = random_int(0,100);

    $codeContent = 'https://6806-178-221-170-165.eu.ngrok.io/INTEGRISANI_WEB_SISTEMI/predavanje_2(BAR%20code,%20QR%20code)/task2/help/scan.php?code=' . $random_int;

    $TempFileName = 'task_file' . md5($codeContent) . '.png';

    $pngAbsoluteFilePath = $tempDir . $TempFileName;

    $urlRelativeFilePath = 'codes/' . $TempFileName;

    QRcode::png($codeContent, 'codes/' . $i . '_' . $TempFileName . '.png');
    $filename = $i . '_' . $TempFileName . '.png';
    $title = 'mojQR_'.$i;
    insert_into_qr_code(file_name: $filename, title: $title, code: $codeContent, connection: $connection,small_code: $random_int);
}
// displaying
//$data = getQrCodeData( connection: $connection);
getQrCodeData($connection);
//foreach ($data as $key => $value) {
//    echo '<img src="codes/' . $value . '">';
//    echo '<p> ' . $key . ': ' . $value . ' </p>';
//}

