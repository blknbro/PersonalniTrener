<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/styles/style.css">
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
    <div class="container-fluid" id="main-page" style="background-image: url('<?= ROOT?>/assets/images/gym2.jpg');">
        <div class="container fs-1 vh-100 d-flex flex-column justify-content-center gap-5">
            <div class="container">
                <p class="text-start" style="font-size: 56px;">Empower Your Body,<br><span style="font-weight: bold"> Unleash Your Greatness!</span>
                </p>
                <p class="fs-5">Welcome to FitForge, where fitness meets inspiration. Join us on a journey to
                    greatness!</p>
                <button type="button" class="btn btn-light fs-3 mt-5">Start Now <i
                            class="bi bi-arrow-right text-dark"></i></button>
            </div>
        </div>

    </div>
    <div class="container my-5">
        <h1 class="text-dark text-center my-4">MEET OUR BEST TRAINERS</h1>
        <div class="row gy-3">
            <div class="col-lg-4 col-sm-12">
                <div class="card p-2">
                    <img src="<?= ROOT?>/assets/images/Trainers/jenna.jpg" class="trainer-img" alt="3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jenna Parker</h5>
                        <p class="card-text text-dark">Jenna is a certified personal trainer with a passion for holistic
                            fitness.Get ready to discover your inner strength with Jenna's empowering guidance.</p>
                        <a href="#" class="btn btn-dark">Check out</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="card p-2">
                    <img src="<?= ROOT?>/assets/images/Trainers/max.jpg" class="trainer-img" alt="3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Max Reynolds</h5>
                        <p class="card-text text-dark">Max is an ex-athlete turned personal trainer, dedicated to
                            helping clients push past their limits and achieve their fitness goals. Train with Max and
                            unleash your full potential.</p>
                        <a href="#" class="btn btn-dark">Check out</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="card p-2">
                    <img src="<?=ROOT?>/assets/images/Trainers/sarah.jpg" class="trainer-img" alt="3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Sarah Nguyen</h5>
                        <p class="card-text text-dark">Sarah is a dedicated fitness coach with a background in sports
                            psychology. She believes in the power of mindset and motivation to fuel physical
                            transformation. Join Sarah's sessions and embark on a journey of self-discovery and
                            empowerment.</p>
                        <a href="#" class="btn btn-dark">Check out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<footer class="bg-dark py-5 mt-5">

    <div class="container text-light text-center">
        <p>&copy; 2024 Copyright by FitForge. All rights reserved.</p>
    </div>
</footer>





</body>
</html>