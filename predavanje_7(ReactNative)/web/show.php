<?php
require_once "db_config.php";
require_once "functions.php";

$data = getMessage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>E-WALL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">

        html, body {
            height: 100%;
        }

        .blockquote {
            font-size: 2.5rem;
        }

    </style>
</head>
<body>


<section class="h-100">
    <header class="container h-100">
        <div class="d-flex align-items-center justify-content-center h-100">
            <div class="d-flex flex-column">
                <blockquote class="blockquote text-center animated infinite pulse delay-1s">
                    <p class="mb-0" id="message">
                        <?php echo $data['message'] ?>
                    </p>
                    <footer class="blockquote-footer" id="footer"><?php echo $data['footer'] ?>
                    </footer>
                </blockquote>
            </div>
        </div>
    </header>
</section>

<script src="script.js"></script>

</body>
</html>


