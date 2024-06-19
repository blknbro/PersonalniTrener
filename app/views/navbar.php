<nav class="navbar navbar-expand-lg px-2 fs-5 border-body border-bottom dark fixed-top" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= ROOT ?>"><i class="bi fs-5 bi-building-fill"></i>FitForge</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav gap-2">
                <li class="nav-items">
                    <a class="nav-link" href="<?= ROOT ?>/trainers">Trainers</a>
                </li>
                <?php if (isset($_SESSION['type']) && !empty($_SESSION['type'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT ?>/trainings">Workouts</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['type']) && !empty($_SESSION['type']) && $_SESSION['type'] === 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT ?>/admin">Admin</a>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="navbar-nav ms-auto">
                <?php
                if (isset($username) && $username !== "Guest"):
                    $root = ROOT;
                    echo "<a href='$root/home/profile?id=$username'><span class='nav-link' style='cursor: default;'>Hi $username!</span></a>";
                    ?>
                    <a href="<?= ROOT ?>/logout" class="nav-link rounded fs-6"
                       style="border: 1px solid #e5e5e5; color: #000; background-color: #f4f9fb">Logout</a>
                <?php
                else:?>
                    <a href="<?= ROOT ?>/login" class="nav-link rounded fs-6"
                       style="border: 1px solid #e5e5e5; color: #000; background-color: #f4f9fb">Login</a>
                <?php endif; ?>

            </div>
        </div>
    </div>
</nav>