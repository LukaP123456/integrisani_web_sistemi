<?php
require_once 'config.php';
require_once 'db_config.php';
require_once 'functions.php';
require_once 'vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>

    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Roboto:wght@300;500&display=swap"
          rel="stylesheet">

    <!--My css-->
    <link rel="stylesheet" href="app.css">

    <title>Document</title>
</head>
<body>

<?php
$row = getLogData($connection);

?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">user_agent</th>
        <th scope="col">device type</th>
        <th scope="col">ip_address</th>
        <th scope="col">date and time</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($row as $item) {
        $date = strtotime($item['date_time']);
        echo '<tr class="'.$item['device_type'].'">
                 <th scope="row">' . $item['id'] . '</th>
                 <td>' . $item['user_agent'] . '</td>
                 <td>' . $item['device_type'] . '</td>
                 <td>' . $item['ip_address'] . '</td>
                 <td>' .  date('d/M/Y h:i:s',$date). '</td>
            </tr>';
    }
    ?>
    </tbody>
</table>

</body>
</html>