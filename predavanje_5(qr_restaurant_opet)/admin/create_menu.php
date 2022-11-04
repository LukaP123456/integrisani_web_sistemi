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

if (empty($name) or empty($id_menu_category) or empty($price[0]) or empty($size[0])) {
    header("location:menus.php?m=1");
    exit();
} else if (dataExists('id_menu', 'menus', ['name'], [$name], $connection)) {
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

    $all_values_correct = true;

    for ($i = 0; $i < count($price); $i++) {
        if (!empty($price[$i]) or !empty($size[$i] and !dataExists('id_price', 'prices', ['id_menu', 'size'], [$id_menu, $size[$i]], $connection))) {
            insertIntoPricesTable($id_menu, $size[$i], $price[$i], $connection);
        } else {
            $all_values_correct = false;
        }
    }
    if (!$all_values_correct) {
        header("location:menus.php?m=5");
        exit();
    }

    header("location:menus.php?m=6");
    exit();


}