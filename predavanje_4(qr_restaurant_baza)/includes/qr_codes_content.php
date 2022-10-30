<div class="container-fluid ">
    <div class="row">
        <div class="col-12">
            <h1 class="display-3">Welcome</h1>
<!--            Create qr code form-->
            <form class="w-50" method="post" action="./create_qr_codes.php">
                <div class="mb-3">
                    <label for="tableNumber" class="form-label">Insert table number</label>
                    <input
                            name="tableNumber"
                            type="text"
                            class="form-control"
                            id="tableNumber"
                            aria-describedby="emailHelp">
                </div>
                <button type="reset" class="btn btn-primary">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php
            //                $token = sha1(time().'-'.mt_rand(100,1000).'-'.date("N").'-'.SALT);
            //                var_dump($token);

            ?>
        </div>
    </div>
</div>
