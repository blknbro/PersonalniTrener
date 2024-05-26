<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FitForge</title>
</head>
<body>
<nav class="navbar navbar-expand-lg px-2 fs-5 border-body border-bottom dark fixed-top" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=ROOT?>"><i class="bi fs-5 bi-building-fill"></i>FitForge</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav gap-2">
                <li class="nav-items">
                    <a class="nav-link" href="<?=ROOT?>/trainers">Trainers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=ROOT?>/trainings">Trainings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
            </ul>
            <div class="navbar-nav ms-auto">
                <a href="<?=ROOT?>/login" class="nav-link rounded fs-6" style="border: 1px solid #e5e5e5; color: #000; background-color: #f4f9fb">Login</a>
            </div>
        </div>
    </div>
</nav>

</div>
    <div class="container-fluid container-md d-flex min-vh-100 justify-content-center align-items-center flex-column">
        <form action="" method="post" class="w-100 p-5 bg-dark rounded-4 shadow-lg" style="max-width: 624px">
            <?php if(!empty($err)):?>
                <div class="alert alert-danger">
                    <?=
                    implode("<br>", $err)

                    ?>
                </div>
            <?php endif; ?>
            <h1 class="mb-4 text-center">Login</h1>
            <div class="mb-2 text-light form-floating">
                <input type="text" name="email" id="email" class="form-control" placeholder="toto">
                <label for="email" class="form-label text-dark">Email</label>
            </div>
            <div class="mb-4 text-light form-floating">
                <input type="password" name="passwd" id="passwd" placeholder="Password:" class="form-control">
                <label for="passwd" class="form-label text-dark">Password</label>
            </div>
            <div>
                <p><a href="<?=ROOT?>/forgot" class="link-warning">Forgot your password?</a></p>
            </div>
            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-light">Login</button>
            </div>
            <div class="mt-3 text-light">
                <p>Don't have account? <a href="<?=ROOT?>/register" class="link-warning">Register</a></p>
            </div>
        </form>
    </div>

<footer class="bg-dark py-5 mt-5">

    <div class="container text-light text-center">
        <p>&copy; 2024 Copyright by FitForge. All rights reserved.</p>
    </div>
</footer>





</body>
</html>