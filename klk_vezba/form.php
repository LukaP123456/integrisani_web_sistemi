<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
//2.
if (isset($_GET['e'])){
    echo "<p> Molim vas popunite polja i pritisnite taster </p>";
}

?>

<form method="post" action="create_code.php">

    <label for="text">Text: </label>
    <input type="text" id="text" name="text">
    <input type="submit" id="submit" name="submit" value="send">
</form>

</body>
</html>