<?php
require 'includes/config.php';
require 'includes/db.php';
require 'includes/functions.php';

$name = mysqli_real_escape_string($connection,trim(strip_tags($_POST['name'])));

if (empty($name)) {
    header("location:menu_categories.php?m=1");
    exit();
}
else if(dataExists('id_menu_category','menu_categories',['name'],[$name], $connection)) {
    header("location:menu_categories.php?m=2");
    exit();
}
else {
    insertIntoMenuCategoriesTable($name, $connection);
    header("location:menu_categories.php?m=3");
    exit();
}