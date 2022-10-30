<?php
require "config.php";
require "db.php";
require "functions.php";
require 'phpqrcode/qrlib.php';

    for ($i = 0; $i< 4; $i++){
        $random_num = getRandomNumber();
        $FileName = 'code_'.$random_num.".png";
        $pngAbsoluteFilePath = DIRPATH . $FileName;
        if (!file_exists($pngAbsoluteFilePath)) {
            $code = LINK . "scan.php?code=$random_num";
            QRcode::png($code, $pngAbsoluteFilePath,QR_ECLEVEL_L, 4);
            insertIntoQrTable($FileName, "Title is $random_num", $random_num, $connection);
            echo "<p>Code generated successfully.</p>";
        }
        else
            echo "<p>Code already exists.</p>";
    }
