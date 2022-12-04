<?php

require "config.php";
require "functions.php";
require "db_config.php";
$connection = databaseConnect();

$data = getQrData($connection);
foreach ($data as $item) {
    $img = $item['image'];
    $text = $item['text'];
    echo "<img src='codes/$img' alt='qrKod'>
            <p>$text</p>";
}
