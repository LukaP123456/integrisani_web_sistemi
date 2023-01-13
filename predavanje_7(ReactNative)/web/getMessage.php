<?php
require_once "db_config.php";
require_once "functions.php";

echo json_encode(getMessage(), true);