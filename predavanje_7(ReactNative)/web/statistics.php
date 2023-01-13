<?php
require_once "db_config.php";
require_once "functions.php";

$data = getStatisticData();
$number = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Statistics</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Message</th>
        <th scope="col">Date</th>
        <th scope="col">User agent</th>
        <th scope="col">Ip address</th>
        <th scope="col">Country</th>
    </tr>
    </thead>
    <tbody>

    <?php
    foreach ($data as $info) {
        echo '<tr>
            <th scope="row">';
        echo $number;
        echo '</th>';

        echo '<td>' . $info['message'] . '</td>';
        echo '<td>' . $info['date_time'] . '</td>';
        echo '<td>' . $info['user_agent'] . '</td>';
        echo '<td>' . $info['ip_address'] . '</td>';
        echo '<td>' . $info['country'] . '</td>';

        echo '</tr>';

        $number++;

    }

    ?>
    </tbody>
</table>
</body>
</html>


