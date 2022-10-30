<?php

// 3.php?id=vts

require 'phpqrcode/qrlib.php';

$param = 0;

if(isset($_GET['id'])) {
    $param = (int)$_GET['id'];
}
// 3.php?id=255
// remember to sanitize that - it is user input!

// we need to be sure ours script does not output anything!!!
// otherwise it will break up PNG binary!

ob_start();

// ob_start("callback");

// here DB request or some processing
$codeText = 'DEMO - ' . $param;

// end of processing here
$debugLog = ob_get_contents();
ob_end_clean();

// outputs image directly into browser, as PNG stream
QRcode::png($codeText);