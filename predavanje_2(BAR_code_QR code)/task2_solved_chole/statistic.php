<?php
require "config.php";
require_once "db.php";
require_once "functions.php";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            font-family: Calibri;
        }
        .legend span{
            padding: .25rem;
            margin: 0 .2rem 0 .2rem;
        }
        th{background-color: #f8f8f8}
        td, th{
            border: 1px solid black;
        }
    </style>
</head>
<body>

<h1>Logs</h1>
<table>
    <tr>
        <th>No</th>
        <th>ID QR code</th>
        <th>User agent</th>
        <th>Ip address</th>
        <th>Promo code</th>
        <th>Date time</th>
    </tr>
<?php
$counter = 1;
$res = getStatisticData($connection);

foreach ($res as $row){
    echo "<tr>
<td>$counter.</td>
<td>{$row['id_qr_code']}</td>
<td>{$row['user_agent']}</td>
<td>{$row['ip_address']}</td>
<td>{$row['promo_code']}</td>
<td>{$row['date_time']}</td></tr>";

    $counter++;
}

?>
</table>
</body>
</html>
