<?php
include_once '../includes/config.php';
include_once '../includes/db.php';

$sql = "SELECT * FROM menu_categories ORDER BY name ASC";

$result = mysqli_query($connection, $sql) or die("database error:" . mysqli_error($connection));
$number = 1;

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $data[] = [$number, $row['name'], $row['date_time'], '<a class="text-dark" data-bs-toggle="modal" href="#menuCategoriesModal" ><i class="bi bi-pencil-fill editMenuCategories" data-id="'.$row['id_menu_category'].'" title="Edit"></i></a> &nbsp; <i class="bi bi-trash-fill deleteMenuCategories pointer" data-id="'.$row['id_menu_category'].'" data-name="'.$row['name'].'" title="Delete"></i> '];
    $number++;
}

$json_data = [
    "draw" => 1,
    "data" => $data
];

echo json_encode($json_data);