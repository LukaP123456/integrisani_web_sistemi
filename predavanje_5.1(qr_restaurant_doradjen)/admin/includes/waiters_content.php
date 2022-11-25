<div class="container ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="link-dark"">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $titles[$page] ?></li>
        </ol>
    </nav>

    <form method="post" action="create_waiters.php" novalidate class="row g-3 mt-3 mb-3 p-3" id="waiters_form">
        <div class="col-md-2">
            <label for="name" class="form-label required">Name</label>
            <input type="text" class="form-control" id="name" name="name" autofocus>
        </div>
        <div class="col-md-2">
            <label for="password" class="form-label required">Password</label>
            <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp">
            <div id="passwordHelp" class="form-text">
                Minimum length is 8 characters!
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Send</button>
            <button type="reset" class="btn btn-primary">Cancel</button>
        </div>
    </form>
    <?php
    if (isset($_GET['m']) and array_key_exists($_GET['m'], $messages[$page])) {
        echo '<div class="alert alert-' . $messages[$page][$_GET['m']]['style'] . ' alert-dismissible fade show" role="alert" id="message">' . $messages[$page][$_GET['m']]['text'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
    ?>
</div>

