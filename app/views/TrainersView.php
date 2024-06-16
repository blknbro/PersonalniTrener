<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FitForge</title>
</head>
<body>

<?php require_once 'navbar.php'?>

<div class="container d-flex flex-column justify-content-start min-vh-100 mt-5" style="padding-top: 64px">
    <h1 class="text-center text-dark">OUR TRAINERS</h1>
    <div class="container d-flex gap-4 flex-wrap mt-5 justify-content-center justify-content-md-start">

        <?php foreach ($info as $trainer): ?>

            <div class="card train" style="width: 18rem;">
                <img src="<?= ROOT ?>/assets/images/Trainers/jenna.jpg" class="trainer-img" alt="3">
                <div class="card-body text-center">
                    <h5 class="card-title"><?= $trainer['name'] ?></h5>
                    <p class="card-text text-dark"><?= substr($trainer['bio'], 0, strpos($trainer['bio'], '.') + 1) ?></p>
                    <a href="<?= ROOT ?>/home/profile?id=<?= $trainer['email'] ?>" class="btn btn-dark">Check
                        out</a>
                </div>
            </div>

        <?php endforeach; ?>


    </div>

</div>

<footer class="bg-dark py-5 mt-5">

    <div class="container text-light text-center">
        <p>&copy; 2024 Copyright by FitForge. All rights reserved.</p>
    </div>
</footer>


</body>
</html>