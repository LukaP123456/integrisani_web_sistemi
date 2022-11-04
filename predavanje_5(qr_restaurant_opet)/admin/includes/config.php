<?php
define("SERVER","http://localhost/INTEGRISANI_WEB_SISTEMI/predavanje_5(qr_restaurant_opet)");
define("SALT","WhdhuI#jkjOnfj!");
define('DIRPATH','../codes/');

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "root");
define("DATABASE", "qr_restaurant");

$titles = [
    'index.php' => 'Index page',
    'qr_codes.php' => 'Create QR codes',
    'waiters.php' => 'Create waiters',
    'menu_categories.php' => 'Create menu categories',
    'menus.php' => 'Create menus',
    'prices.php' => 'Create prices'
];

$messages = [
    'qr_codes.php' => [
        1 => ['style' => 'danger', 'text' =>'Please, insert number between 1 and 99999.'],
        2 => ['style' => 'danger', 'text' => 'Table with this number already exists. Insert a different number.'],
        3 => ['style' => 'success', 'text' => 'QR code generated successfully.']
    ],
    'menu_categories.php' => [
        1 => ['style' => 'danger', 'text' =>'Please, insert name for menu category.'],
        2 => ['style' => 'danger', 'text' =>'Category with this name already exists. Insert another one.'],
        3 => ['style' => 'success', 'text' => 'Menu category created successfully.']
    ],
    'prices.php' => [
        1 => ['style' => 'danger', 'text' =>'Please, insert name for menu category.'],
        2 => ['style' => 'danger', 'text' =>'Category with this name already exists. Insert another one.'],
        3 => ['style' => 'success', 'text' => 'Menu category created successfully.']
    ],
    'menus.php' => [
        1 => ['style' => 'danger', 'text' =>'Please, insert required fields.'],
        2 => ['style' => 'danger', 'text' =>'Category with this name already exists. Insert another one.'],
        3 => ['style' => 'danger', 'text' => 'Error occurs during image upload. Please try again and upload only JPG images.'],
        4 => ['style' => 'danger', 'text' => 'Something went wrong during image upload. Please try again.'],
        5 => ['style' => 'success', 'text' => 'Menu created successfully, but some values where not inserted.'],
        6 => ['style' => 'success', 'text' => 'Menu created successfully.']
    ]
];
