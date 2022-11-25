<div class="container ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="link-dark"">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $titles[$page] ?></li>
        </ol>
    </nav>

    <form method="post" action="create_menu.php" novalidate class="row g-3 mt-3 mb-3 p-3" id="menus_form"
          enctype="multipart/form-data">
        <div class="col-md-2 required">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" autofocus>
        </div>
        <div class="col-md-2 required">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" id="category" name="id_menu_category">
                <?php
                $categories = getCategories($connection);
                echo '<option value="choose" selected>choose</option>' . PHP_EOL;
                foreach ($categories as $category) {
                    echo '<option value="' . $category['id_menu_category'] . '">' . $category['name'] . '</option>' . PHP_EOL;
                }
                ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" aria-describedby="imageHelp"
                   accept="image/jpeg">
            <div id="imageHelp" class="form-text">
                Upload only JPG images!
            </div>
        </div>
        <div class="col-12">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
        </div>
        <div class="row pt-3 prices">
            <div class="col-md-2 required">
                <label for="size" class="form-label">Size</label>
                <input type="text" class="form-control" id="size" name="size[]">
            </div>
            <div class="col-md-2 required">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price[]" min="1" max="10000">
            </div>
            <div class="col-md-2 pt-4">
                <button type="button" class="btn btn-primary addPrice">
                    <i class="bi bi-plus"></i>
                </button>
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

