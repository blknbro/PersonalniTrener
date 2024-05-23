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

<div class="container d-flex min-vh-100 justify-content-center align-items-center">
        <form action="" method="post" class="w-100 p-5 mt-5 bg-dark rounded-4 shadow" style="max-width: 624px">
            <h1 class="mb-4 text-center">Register</h1>
            <div class="mb-2 text-light form-floating">
                <input type="text" name="name" id="name" placeholder="Name:" class="form-control">
                <label for="name" class="text-dark">Name</label>
            </div>
            <div class="mb-2 text-light form-floating">
                <input type="text" name="surname" id="surname" placeholder="Name:" class="form-control">
                <label for="surname" class="text-dark">Surname</label>
            </div>
            <div class="mb-2 text-light form-floating">
                <input type="email" name="email" id="email" placeholder="Email:" class="form-control">
                <label for="email" class="text-dark">Email</label>
            </div>
            <div class="mb-2 text-light form-floating">
                <input type="tel" name="phone" id="phone" placeholder="Phone:" class="form-control">
                <label for="phone" class="text-dark">Phone</label>
            </div>
            <div class="mb-2 text-light form-floating">
                <input type="password" name="passwd" id="passwd" placeholder="Password:" class="form-control">
                <label for="passwd" class="text-dark">Password</label>
            </div>
            <div class="mb-3 text-light form-floating">
                <input type="password" name="passwdR" id="passwdR" placeholder="Confirm password:" class="form-control">
                <label for="passwdR" class="text-dark">Confirm password</label>
            </div>
            <div class="form-check form-switch mb-5 fs-5">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label text-warning" for="flexSwitchCheckDefault">Trainer?</label>
            </div>
            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-light">Register</button>
            </div>
            <div class="mt-2 text-light">
                <p>Already have account? <a href="<?=ROOT?>/login" class="link-warning">Login</a></p>
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