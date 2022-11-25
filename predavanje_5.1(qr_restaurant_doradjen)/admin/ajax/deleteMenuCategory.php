<?php
require '../includes/config.php';
require '../includes/db.php';
require '../includes/functions.php';

if (isset($_POST['id'])) {
    $id_menu_category = (int)$_POST['id'];
    deleteMenuCategories($id_menu_category, $connection);
}