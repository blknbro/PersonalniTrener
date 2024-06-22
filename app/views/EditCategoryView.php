<?php


require_once 'head.php';

require_once 'navbar.php';?>

    <div class="container-fluid container-md d-flex min-vh-100 justify-content-center align-items-center">
        <form action="" method="post" class="w-100 p-5 bg-dark rounded-4 shadow-lg" style="max-width: 624px">
            <?php if(!empty($err)):?>
                <div class="alert alert-danger">
                    <?=
                    implode("<br>", $err)

                    ?>
                </div>
            <?php endif; ?>
            <h1 class="mb-4 text-center">Change Category details</h1>
            <div class="mb-2 text-light form-floating">
                <input type="text" name="categoryName" id="categoryName" class="form-control" placeholder="cName" value="<?=htmlspecialchars($category['name'])?>">
                <label for="categoryName" class="form-label text-dark">Category name</label>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-light">Make changes</button>
            </div>
        </form>
    </div>











<?php require_once 'footer.php';
