<?php
require 'includes/config.php';
require 'includes/db.php';
require 'includes/functions.php';

$name = mysqli_real_escape_string($connection,trim(strip_tags($_POST['name'])));
$password = mysqli_real_escape_string($connection,trim(strip_tags($_POST['password'])));

if (empty($name) or strlen($password)<8) {
    header("location:waiters.php?m=1");
    exit();
}
else if(dataExists("id_waiter","waiters", ['name'], [$name], $connection)) {
    header("location:waiters.php?m=2");
    exit();
}
else {
    insertIntoWaitersTable($name, $password, $connection);
    header("location:waiters.php?m=3");
    exit();
}