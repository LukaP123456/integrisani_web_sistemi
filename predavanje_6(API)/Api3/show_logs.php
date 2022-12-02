<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
    <title>Show logs</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>

        body {
            font-family: 'Roboto', sans-serif;
        }

        th {
            background-color: #a5a5a5;
        }

        .phone {
            background-color: #0f0;
        }

        .computer {
            background-color: #0ff;
        }

        .tablet {
            background-color: #fffacd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        span {
            padding: 5px;
        }

        table {
            border: 1px solid #000;
        }
    </style>

</head>
<body>
<h1>Logs</h1>
<p>legend: <span class="phone">phone</span>
    <span class="computer">computer</span>
    <span class="tablet">tablet</span>
</p>

<?php
require_once 'config.php';
require_once 'db_config.php';
require_once 'functions.php';

//$logs = getLogData($connection);
$logs = getLogData();

if ($logs) {
    echo '<table>';
    echo '<tr><th>No</th><th>User agent</th><th>Ip address</th><th>Country</th><th>Date time</th><th>Device type</th></tr>';
    $no = 1;
    foreach ($logs as $log) {
        echo '<tr class="' . $log['device_type'] . '">';
        echo '<td>' . $no . '.</td>';
        echo '<td>' . $log['user_agent'] . '</td>';
        echo '<td>' . $log['ip_address'] . '</td>';
        echo '<td>' . $log['country'] . '</td>';
        echo '<td>' . $log['date_time'] . '</td>';
        echo '<td>' . $log['device_type'] . '</td>';
        echo '</tr>';
        $no++;
    }

    echo '</table>';
} else {
    echo '<p>No data!</p>';
}
?>

</body>
</html>