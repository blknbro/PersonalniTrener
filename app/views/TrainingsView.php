<?php
require_once 'head.php';
require_once 'navbar.php' ?>
    <div class="container d-flex flex-column justify-content-start min-vh-100 mt-5" style="padding-top: 64px">
        <div class="d-flex flex-column gap-3" id="searchForm" role="search">
            <input id="searchInput" class="form-control me-5 round text-dark" type="search" placeholder="Search"
                   aria-label="Search">
            <div class="container">
                <h3 class="text-dark">Filters</h3>
                <div class="d-flex flex-wrap gap-2" id="filterButtons">
                    <?php foreach ($categories as $category): ?>
                        <button class="badge rounded-pill text-bg-warning filter fs-5" data-category="<?= $category['name'] ?>"><?= $category['name'] ?></button>
                    <?php endforeach; ?>
                    <button id="resetFilters" class="badge rounded-pill text-bg-info fs-5">Reset Filters</button>
                </div>
                <?php if (($_SESSION['type'] === 'trainer' && $_SESSION['permission'] === 'approved') || ($_SESSION['type'] === 'user')): ?>
                    <div class="my-4">
                        <a href="<?= ROOT ?>/trainings/make" class="btn btn-dark">
                            <i class="bi bi-caret-right-fill"></i> Make workout

                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="container d-flex gap-4 flex-wrap mt-5 justify-content-start" id="workoutContainer">
        </div>
    </div>
    <script>
        const ROOT_URL = '<?= ROOT ?>'
    </script>
    <script src="<?= ROOT ?>/assets/scripts/mainWorkout.js"></script>

<?php require_once 'footer.php';