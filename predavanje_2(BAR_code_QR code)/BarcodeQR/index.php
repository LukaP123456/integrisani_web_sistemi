<?php
// https://www.shayanderson.com/php/php-qr-code-generator-class.htm
// include BarcodeQR class
include "BarcodeQR.php";

// set BarcodeQR object
$qr = new BarcodeQR();
$number = mt_rand(100,200);
// create URL QR code
$qr->url("https://a092-147-91-199-142.ngrok.io/iws/site.php?number=$number");

//$qr->draw(450);

$file = date('Y.m.d.');
$qr->draw(450, "qr.png");
$qr->draw(450, "$file.png");

echo '<img src="qr.png" alt="qr code">';
echo '<p>'.date("Y.m.d.").'</p>';

echo '<img src="'.$file.'.png" alt="qr code">';
echo "<p>$file</p>";

?>