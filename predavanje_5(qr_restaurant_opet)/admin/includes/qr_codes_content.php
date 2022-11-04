<div class="container required">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="text-white"">Home</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page"><?php echo $titles[$page] ?></li>
        </ol>
    </nav>

    <form method="post" action="create_qr_codes.php" novalidate class="row g-3 mt-3 mb-3 p-3" id="qr_code_form">
        <div class="col-md-2">
            <label for="number" class="form-label">Table number</label>
            <input type="number" class="form-control" id="number" name="number" min="1" max="99999"
                   aria-describedby="numberHelp" autofocus>
            <div id="numberHelp" class="form-text text-white">
                Value between 1 and 99999
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Send</button>
            <button type="reset" class="btn btn-primary">Cancel</button>
        </div>
    </form>

    <?php

    if (isset($_GET['m']) and array_key_exists($_GET['m'], $messages[$page])) {
        echo '<div class="alert alert-' . $messages[$page][$_GET['m']]['style'] . ' alert-dismissible fade show" role="alert" id="message">' .
            $messages[$page][$_GET['m']]['text'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
    ?>
</div>

