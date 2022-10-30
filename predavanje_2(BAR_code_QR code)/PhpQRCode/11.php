<?php

require 'phpqrcode/qrlib.php';

require 'config.php';


$tempDir = EXAMPLE_TMP_SERVERPATH;

// here our data
$phoneNo = '(069)0333312-345-678';

// we building raw data
$codeContents = 'sms:' . $phoneNo;

// generating
QRcode::png($codeContents, $tempDir . '11.png', QR_ECLEVEL_L, 6);

// displaying
echo '<img src="' . EXAMPLE_TMP_URLRELPATH . '11.png" alt="qr code">';