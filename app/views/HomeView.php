<?php
require_once 'head.php';
require_once 'navbar.php' ?>

<div class="container-fluid" id="main-page" style="background-image: url('<?= ROOT ?>/assets/images/gym2.jpg');">
    <div class="container fs-1 vh-100 d-flex flex-column justify-content-center gap-5">
        <div class="container">
            <p class="text-start" style="font-size: 56px;">Empower Your Body,<br><span style="font-weight: bold"> Unleash Your Greatness!</span>
            </p>
            <p class="fs-5">Welcome to FitForge, where fitness meets inspiration. Join us on a journey to
                greatness!</p>
            <a href=<?= isset($_SESSION['type']) ? (ROOT . "/trainings") : ROOT . "/login"; ?>>
                <button type="button" class="btn btn-light fs-3 mt-5">Start Now <i
                            class="bi bi-arrow-right text-dark"></i></button>
            </a>
        </div>
    </div>

</div>
<div class="container my-5">
    <h1 class="text-dark text-center my-4">MEET OUR BEST TRAINERS</h1>
    <div class="row gy-3">
        <div class="col-lg-4 col-sm-12">
            <div class="card p-2">
                <img src="<?= ROOT ?>/assets/images/Trainers/jenna.jpg" class="trainer-img" alt="3">
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
                <img src="<?= ROOT ?>/assets/images/Trainers/max.jpg" class="trainer-img" alt="3">
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
                <img src="<?= ROOT ?>/assets/images/Trainers/sarah.jpg" class="trainer-img" alt="3">
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

<?php require_once 'footer.php';