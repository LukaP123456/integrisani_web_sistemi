<div class="container ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="link-dark"">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $titles[$page] ?></li>
        </ol>
    </nav>


    <form method="post" action="create_restaurant_tables_waiters.php" novalidate class="row g-3 mt-3 mb-3 p-3"
          id="tables_waiters_form">

        <div class="col-md-2 required">
            <label for="restaurant_table" class="form-label">Restaurant table</label>
            <select class="form-select" aria-label="Default select example" id="restaurant_table"
                    name="restaurant_table">
                <?php
                $tables = getRestaurantTables($connection);
                echo '<option value="choose" selected>choose</option>' . PHP_EOL;
                foreach ($tables as $table) {
                    echo '<option value="' . $table['id_restaurant_table'] . '">' . $table['number'] . '</option>' . PHP_EOL;
                }
                ?>
            </select>
        </div>

        <div class="col-md-2 required">
            <label for="waiter" class="form-label">Waiter</label>
            <select class="form-select" aria-label="Default select example" id="waiter" name="waiter">
                <?php
                $waiters = getWaiters($connection);
                echo '<option value="choose" selected>choose</option>' . PHP_EOL;
                foreach ($waiters as $waiter) {
                    echo '<option value="' . $waiter['id_waiter'] . '">' . $waiter['name'] . '</option>' . PHP_EOL;
                }
                ?>
            </select>
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

