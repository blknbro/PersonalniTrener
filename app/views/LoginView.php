<?php
require_once 'head.php';
require_once 'navbar.php' ?>

</div>
<div class="container-fluid container-md d-flex min-vh-100 justify-content-center align-items-center flex-column">
    <form action="" method="post" class="w-100 p-5 bg-dark rounded-4 shadow-lg" style="max-width: 624px" id="loginForm">
        <?php if (!empty($err)): ?>
            <div class="alert alert-danger">
                <?=
                implode("<br>", $err)

                ?>
            </div>
        <?php endif; ?>
        <h1 class="mb-4 text-center">Login</h1>
        <div class="mb-2 text-light form-floating">
            <input type="text" name="email" id="email" class="form-control" placeholder="toto" style="outline: none">
            <label for="email" class="form-label text-dark">Email</label>
        </div>
        <div class="mb-4 text-light form-floating">
            <input type="password" name="passwd" id="passwd" placeholder="Password:" class="form-control">
            <label for="passwd" class="form-label text-dark">Password</label>
        </div>
        <div>
            <p><a href="<?= ROOT ?>/forgot" class="link-warning">Forgot your password?</a></p>
        </div>
        <div class="d-grid">
            <button type="submit" name="submit" class="btn btn-light">Login</button>
        </div>
        <div class="mt-3 text-light">
            <p>Don't have account? <a href="<?= ROOT ?>/register" class="link-warning">Register</a></p>
        </div>
    </form>
</div>

    <script src="<?= ROOT ?>/assets/scripts/login.js"></script>

<?php require_once 'footer.php'?>