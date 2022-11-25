<div class="container ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="link-dark"">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $titles[$page] ?></li>
        </ol>
    </nav>

    <table id="menuCategories" class="table table-hover display" style="width:100%">
        <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Date time</th>
            <th>Options</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Date time</th>
            <th>Options</th>
        </tr>
        </tfoot>
    </table>

    <div class="modal fade" id="menuCategoriesModal" aria-hidden="true" aria-labelledby="menuCategoriesModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Modal body
                </div>
                <div class="modal-footer">
                   Modal footer
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET['m']) and array_key_exists($_GET['m'], $messages[$page])) {
        echo '<div class="alert alert-' . $messages[$page][$_GET['m']]['style'] . ' alert-dismissible fade show" role="alert" id="message">' . $messages[$page][$_GET['m']]['text'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
    ?>
</div>

