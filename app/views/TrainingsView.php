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
    <div class="container d-flex flex-column justify-content-start min-vh-100 mt-5" style="padding-top: 64px">
        <div class="d-flex  flex-column gap-3">
            <form class="d-flex" role="search">
                <input class="form-control me-5 round" type="search" placeholder="Search" aria-label="Search">
            </form>
            <div class="container">
                <h3 class="text-dark">Filters</h3>
                <div class="d-flex flex-wrap gap-2">
                    <button class="badge rounded-pill text-bg-warning filter fs-5">HIIT</button>
                    <button class="badge rounded-pill text-bg-warning filter fs-5">Strength</button>
                    <button class="badge rounded-pill text-bg-warning filter fs-5">Cardio</button>
                    <button class="badge rounded-pill text-bg-warning filter fs-5">Yoga</button>
                    <button class="badge rounded-pill text-bg-warning filter fs-5">Pilates</button>
                    <button class="badge rounded-pill text-bg-warning filter fs-5">CrossFit</button>
                    <button class="badge rounded-pill text-bg-warning filter fs-5">Rehabilitation</button>
                </div>
            </div>
        </div>
        <div class="container d-flex gap-4 flex-wrap mt-5 justify-content-center justify-content-md-start">
            <div class="card train" style="width: 18rem;">
                <img src="https://images.unsplash.com/photo-1470468969717-61d5d54fd036?q=80&w=1944&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                     class="card-img-top train-img" alt="text">
                <div class="card-body">
                    <h2 class="text-center">HIIT Blast</h2>
                    <p class="text-dark">High-intensity interval training program for maximum calorie burn and fitness
                        gains.</p>
                    <div class="d-flex flex-wrap gap-1 ">
                        <p class="badge rounded-pill text-bg-warning fs-6">HIIT</p>
                    </div>
                    <div class="d-flex gap-1 justify-content-end align-items-center my-auto">
                        <i class="bi bi-alarm-fill text-dark"></i>
                        <div class="d-flex gap-2">
                            <span class="text-dark fw-bold">Duration</span>
                            <span class="text-dark">4 weeks</span>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-end">
                        <span class="text-dark">Made by</span>
                        <a href="#" class="link-secondary">Jenna Parker</a>
                    </div>
                </div>
            </div>

            <div class="card train" style="width: 18rem;">
                <img src="<?=ROOT?>/assets/images/Train/1.jpg" class="card-img-top train-img" alt="text">
                <div class="card-body">
                    <h2 class="text-center">Quick Start Fitness</h2>
                    <p class="text-dark">Beginner-friendly program to kickstart your fitness journey and establish
                        healthy habits.</p>
                    <div class="d-flex flex-wrap gap-1 ">
                        <p class="badge rounded-pill text-bg-warning fs-6">Strength</p>
                    </div>
                    <div class="d-flex gap-1 justify-content-end align-items-center my-auto">
                        <i class="bi bi-alarm-fill text-dark"></i>
                        <div class="d-flex gap-2">
                            <span class="text-dark fw-bold">Duration</span>
                            <span class="text-dark">3 weeks</span>
                        </div>

                    </div>
                    <div class="d-flex gap-2 justify-content-end">
                        <span class="text-dark">Made by</span>
                        <a href="#" class="link-secondary">Max Reynolds</a>
                    </div>
                </div>
            </div>
            <div class="card train" style="width: 18rem;">
                <img src="https://images.unsplash.com/photo-1594381898411-846e7d193883?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                     class="card-img-top train-img" alt="text">
                <div class="card-body">
                    <h2 class="text-center">Flow & Go Cardio</h2>
                    <p class="text-dark">A program that blends cardiovascular conditioning with the mindful movements of
                        yoga for a balanced approach to fitness and stress relief.</p>
                    <div class="d-flex flex-wrap gap-1 ">
                        <p class="badge rounded-pill text-bg-warning fs-6">Cardio</p>
                        <p class="badge rounded-pill text-bg-warning fs-6">Yoga</p>
                    </div>
                    <div class="d-flex gap-1 justify-content-end align-items-center my-auto">
                        <i class="bi bi-alarm-fill text-dark"></i>
                        <div class="d-flex gap-2">
                            <span class="text-dark fw-bold">Duration</span>
                            <span class="text-dark">4 weeks</span>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-end">
                        <span class="text-dark">Made by</span>
                        <a href="#" class="link-secondary">Sarah Nguyen</a>
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