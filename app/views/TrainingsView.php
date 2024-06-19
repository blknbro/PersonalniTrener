<?php
require_once 'head.php';
require_once 'navbar.php' ?>
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
                <?php if ($_SESSION['type'] === 'trainer' && $_SESSION['permission'] === 'approved'):?>
                <div class="my-4">
                    <a href="<?= ROOT ?>/trainings/make">
                        <button class="btn btn-dark"><i class="bi bi-caret-right-fill"></i> Make
                            workout
                        </button>
                    </a>
                </div>
                <?php endif;?>
            </div>
        </div>
        <div class="container d-flex gap-4 flex-wrap mt-5 justify-content-start ">
            <?php foreach ($info as $workout): ?>

                <div class="card train train-hover shadow" style="width: 18rem; text-decoration: none;">
                    <a href="<?= ROOT ?>/trainings/workout?id=<?= $workout['workout_id'] ?>">
                        <img
                                src="https://images.unsplash.com/photo-1470468969717-61d5d54fd036?q=80&w=1944&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="card-img-top train-img" alt="text">
                        <div class="card-body">
                            <h2 class="text-center text-dark"><?= $workout['title'] ?></h2>
                            <p class="text-dark"><?= substr($workout['description'], 0, strpos($workout['description'], '.') + 1) ?></p>
                            <div class="d-flex flex-wrap gap-1 ">
                                <p class="badge rounded-pill text-bg-warning fs-6"><?= $workout['category_name'] ?></p>
                            </div>
                            <div class="d-flex gap-1 justify-content-end align-items-center my-auto">
                                <i class="bi bi-alarm-fill text-dark"></i>
                                <div class="d-flex gap-2">
                                    <span class="text-dark fw-bold">Duration</span>
                                    <span class="text-dark"><?= $workout['duration_value'] . " " . $workout['duration_unit'] ?></span>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-end">
                                <span class="text-dark">Made by</span>
                                <a href="<?= ROOT ?>/home/profile?id=<?= $workout['email'] ?>"
                                   class="link-secondary"><?= $workout['name'] . " " . $workout['surname'] ?></a>
                            </div>
                        </div>
                </div>
                </a>
            <?php endforeach; ?>
            <div class="card train" style="width: 18rem;">
                <img src="<?= ROOT ?>/assets/images/Train/1.jpg" class="card-img-top train-img" alt="text">
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

    <script src="<?= ROOT ?>/assets/scripts/search.js"></script>
<?php require_once 'footer.php';