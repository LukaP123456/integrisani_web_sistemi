<div class="container ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="text-white"">Home</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page"><?php echo $titles[$page] ?></li>
        </ol>
    </nav>

    <form method="post" action="create_waiters.php" novalidate class="row g-3 mt-3 mb-3 p-3" id="waiters_form">
        <div class="col-md-2">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" autofocus>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Send</button>
            <button type="reset" class="btn btn-primary">Cancel</button>
        </div>
    </form>
</div>

