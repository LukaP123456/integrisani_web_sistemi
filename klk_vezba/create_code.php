<?php
if (!isset($_POST['text']) or empty($_POST['text'])) {
    header("Location:form.php?e=1");
    exit();
}

require "config.php";
require "db_config.php";
require "phpqrcode/qrlib.php";
$connection = databaseConnect();

$HASH = '';
for ($i = 0; $i <= 5; $i++) {
    $HASH .= mt_rand(0, 9);
}

$HASH = sha1($HASH);

$text = mysqli_real_escape_string($connection, $_POST['text']);
$sql = "INSERT INTO qr_code(text,hash) VALUES ('$text','$HASH')";
mysqli_query($connection, $sql) or die(mysqli_error($connection));

$id = mysqli_insert_id($connection);

//4.
$file_name = md5(time()) . ".png";

$pngAbsoluteFilePath = DIRPATH . $file_name;
$code = LINK . "scan.php?id=$id&h=$HASH";
QRcode::png($code, $pngAbsoluteFilePath, QR_ECLEVEL_L, 8);

$sql = "UPDATE qr_code set image='$file_name' where id_qr_code='$id'";
mysqli_query($connection, $sql) or die(mysqli_error($connection));