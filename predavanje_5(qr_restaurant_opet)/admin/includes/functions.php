<?php

/**
 * Function generates token for QR code.
 * @return string
 */
function generateToken(): string
{
    return sha1(time() . "-" . mt_rand(100, 1000) . "-" . date("N") . "-" . SALT);
}

/**
 * Function returns actual script name with extension
 * @return string
 */
function getCurrentPage(): string
{
    return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
}

/**
 * @param int $number
 * @param mysqli $connection
 * @return int
 */
function insertIntoRestaurantTable(int $number, mysqli $connection): int
{
    $sql = "INSERT INTO restaurant_tables(number) VALUES ($number)";
    mysqli_query($connection, $sql) or die(mysqli_error($connection));
    return (int)mysqli_insert_id($connection);
}

/**
 * @param int $id_restaurant_table
 * @param string $url
 * @param string $fileName
 * @param string $token
 * @param mysqli $connection
 * @return void
 */
function insertIntoQrCodeTable(int $id_restaurant_table, string $url, string $fileName, string $token, mysqli $connection): void
{
    $sql = "INSERT INTO qr_codes(id_restaurant_table, url, file_name, token) VALUES ($id_restaurant_table,'$url','$fileName','$token')";
    mysqli_query($connection, $sql) or die(mysqli_error($connection));
}


/**
 * @param string $name
 * @param mysqli $connection
 * @return void
 */
function insertIntoMenuCategoriesTable(string $name, mysqli $connection): void
{
    $sql = "INSERT INTO menu_categories(name) VALUES ('$name')";
    mysqli_query($connection, $sql) or die(mysqli_error($connection));
}

/**
 * @param string $name
 * @param int $id_menu_category
 * @param mysqli $connection
 * @param string $description
 * @param string $image
 * @return int
 */
function insertIntoMenusTable(string $name, int $id_menu_category, mysqli $connection, string $description = "", string $image = ""): int
{

    $sql = "INSERT INTO menus(id_menu_category, name, description, image) VALUES ($id_menu_category,'$name','$description','$image')";
    mysqli_query($connection, $sql) or die(mysqli_error($connection));
    return (int)mysqli_insert_id($connection);
}

function insertIntoPricesTable(int $id_menu, string $size, int $price, mysqli $connection): void
{
    $sql = "INSERT INTO prices(id_menu, size, price) VALUES ($id_menu,'$size',$price)";
    mysqli_query($connection, $sql) or die(mysqli_error($connection));
}


/**
 * Checks if category name exists in menu_categories table
 * @param string $name
 * @param mysqli $connection
 * @return bool
 */
function menuCategoryExists(string $name, mysqli $connection): bool
{
    $sql = "SELECT id_menu_category FROM menu_categories WHERE name = '$name'";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    return mysqli_num_rows($result) > 0 ? true : false;
}

/**
 * Checks if data exists in a selected table for inputted value
 * @param string $selectField
 * @param string $selectTable
 * @param string $whereField
 * @param string $whereValue
 * @param mysqli $connection
 * @return bool
 */
function dataExists(string $selectField, string $selectTable, array $whereFields, array $whereValues, mysqli $connection): bool
{
    $sql = "SELECT $selectField FROM $selectTable ";

    $where = "WHERE $whereFields[0] = '$whereValues[0]'";

    for ($i = 1; $i < count($whereFields); $i++) {
        $where .= " AND $whereFields[$i] = '$whereValues[$i]'";
    }

    $sql .= $where;

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    return mysqli_num_rows($result) > 0 ? true : false;
}

/**
 * Checks if menu name exists in menus table
 * @param string $name
 * @param mysqli $connection
 * @return bool
 */
function menuExists(string $name, mysqli $connection): bool
{
    $sql = "SELECT id_menu_category FROM menus WHERE name = '$name'";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    return mysqli_num_rows($result) > 0 ? true : false;
}

/**
 * @param mysqli $connection
 * @return array
 */
function getCategories(mysqli $connection): array
{

    $data = [];
    $sql = "SELECT id_menu_category, name FROM menu_categories ORDER BY name ASC";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    return $data;
}

/**
 * Checks if any error happened during image upload, if file is uploaded with HTTP POST and if file type is JPG
 * @param array $image
 * @return bool
 */
function imageReady(array $image): bool
{
    return ($image['error'] > 0 or !is_uploaded_file($image['tmp_name']) or exif_imagetype($image['tmp_name']) !== 2) ? false : true;
}