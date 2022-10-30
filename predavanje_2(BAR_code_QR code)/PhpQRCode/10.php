<?php

require 'phpqrcode/qrlib.php';

require 'config.php';


// how to build raw content - QRCode to call phone number

$tempDir = EXAMPLE_TMP_SERVERPATH;

// here our data
$url = 'http://a30bae871128.ngrok.io/emobil_2020/04/qr_task/qr.php?id=1';

// we building raw data
$codeContents = 'url:' . $url;

// generating
QRcode::png($codeContents, $tempDir . '1.png', QR_ECLEVEL_L, 6);

// displaying
echo '<img src="' . EXAMPLE_TMP_URLRELPATH . '10.png" alt="qr code">';