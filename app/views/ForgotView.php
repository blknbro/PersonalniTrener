<?php
require_once 'head.php';
require_once 'navbar.php'?>

</div>
<div class="container-fluid container-md d-flex min-vh-100 justify-content-center align-items-center">
    <form action="" method="post" class="w-100 p-5 bg-dark rounded-4 shadow-lg" style="max-width: 624px">
        <?php if (!empty($err)): ?>
            <div class="alert alert-danger">
                <?=
                implode("<br>", $err)

                ?>
            </div>
        <?php endif; ?>
        <h1 class="mb-4 text-center">Reset Password</h1>
        <div class="mb-2 text-light form-floating">
            <input type="email" name="email" id="email" class="form-control" placeholder="toto">
            <label for="email" class="form-label text-dark">Email</label>
        </div>
        <div class="d-grid">
            <button type="submit" name="submit" class="btn btn-light">Reset</button>
        </div>
    </form>
</div>




<?php require_once 'footer.php';