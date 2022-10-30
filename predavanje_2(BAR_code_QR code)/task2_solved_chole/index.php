<!DOCTYPE html>
<html lang="en">
<head>
    <title>WEB PAGE</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
        }

        #box {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        p {
            margin: 80px;
        }
    </style>
</head>
<body>
<h1>QR CODE PROMOTIONS!</h1>
<div id="box">
<?php
require 'config.php';
require 'db.php';
require 'functions.php';

$qrCodes = getQrData($connection);

foreach ($qrCodes as $qrCode) {
    echo "<p>";
    echo '<img src="codes/' . $qrCode['file_name'] . '" alt="' . $qrCode['title'] . '">';
    echo "<br><b>" . $qrCode['title'] . "</b>";
    echo "</p>";
}

?>
</div>
</body>
</html>