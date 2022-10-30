<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app.css">
    <title>Document</title>
</head>
<body>
<?php
require 'functions.php';

$row = showStatistics($connection);
?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">QR Code ID</th>
        <th scope="col">device type</th>
        <th scope="col">ip_address</th>
        <th scope="col">Promo code</th>
        <th scope="col">date and time</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($row as $item) {
        $date = strtotime($item['date_time']);
        echo '<tr">
                 <th scope="row">' . $item['id_qr_code'] . '</th>
                 <td>' . $item['user_agent'] . '</td>
                 <td>' . $item['ip_address'] . '</td>
                 <td>' . $item['promo_code'] . '</td>
                 <td>' .  date('d/M/Y h:i:s',$date). '</td>
            </tr>';
    }
    ?>
    </tbody>
</table>
</body>
</html>

