<?php
require 'includes/config.php';
require 'includes/db.php';
require 'includes/functions.php';

$name = mysqli_real_escape_string($connection, trim(strip_tags($_POST['name'])));
$id_menu_category = (int)$_POST['id_menu_category'];
$image = $_FILES['image'];
$description = mysqli_real_escape_string($connection, trim(strip_tags($_POST['description'])));

$price = array_map(function ($price) use ($connection) {
    return mysqli_real_escape_string($connection, trim(strip_tags($price)));
}, $_POST['price']);

$size = array_map(function ($size) use ($connection) {
    return mysqli_real_escape_string($connection, trim(strip_tags($size)));
}, $_POST['size']);

$newFileName = "";

if (empty($name) or empty($id_menu_category)) {
    header("location:menus.php?m=1");
    exit();
} else if (menuExists($name, $connection)) {
    header("location:menus.php?m=2");
    exit();
} elseif (!empty($image['name']) and !imageReady($image)) {
    header("location:menus.php?m=3");
    exit();
} else {
    if (!empty($image['name'])) {
        $directory = "../menus/";
        $extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        $newFileName = time() . '-' . $id_menu_category . '-' . mt_rand(10, 100) . '.' . $extension;

        if (!move_uploaded_file($image['tmp_name'], $directory . $newFileName)) {
            header("Location:menus.php?m=4");
            exit();
        }
    }
    $id_menu = insertIntoMenusTable($name, $id_menu_category, $connection, $description, $newFileName);
    // need to implement insert into prices table
    // check if both data exists in every iteration
    header("location:menus.php?m=5");
    exit();
}