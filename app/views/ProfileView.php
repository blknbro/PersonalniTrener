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
<body class="bg-black">
<?php require_once 'navbar.php'; ?>


<div class='container text-center mx-auto p-5 bg-black rounded-2 w-100' style=' margin-top: 64px;'  data-bs-theme="dark">
    <?php
    if (!isset($_SESSION['email']) || $info[0]['email'] !== $_SESSION['email']):
        ?>
        <div class='container d-flex flex-column flex-md-row'>
            <div class="d-flex flex-column gap-5" style="flex: 0.6">
                <h2 class="fs-1"><?= $info[0]['name'] . " " . $info[0]['surname'] ?></h2>
                <div class="d-flex fs-2 gap-5">
                    <p>Name:</p>
                    <p><?= $info[0]['name'] ?></p>
                </div>
                <div class="d-flex fs-2 gap-5">
                    <p>Surname:</p>
                    <p><?= $info[0]['surname'] ?></p>
                </div>
                <div class="d-flex fs-2 gap-5">
                    <p>Email:</p>
                    <p><?= $info[0]['email'] ?></p>
                </div>
                <div class="d-flex fs-2 gap-5">
                    <p>Phone:</p>
                    <p><?= $info[0]['phone'] ?></p>
                </div>
                <div class="container d-flex flex-column fs-2 gap-5">
                    <p class="text-start">Bio:</p>
                    <p><?= $info[0]['bio'] ?></p>
                </div>
            </div>
            <img src="<?= ROOT ?>/assets/images/Trainers/jenna.jpg" class='img-fluid img-thumbnail' alt="JENNA"
                 style="max-height: 600px; flex: 0.4">
        </div>
    <?php else: ?>
        <div class='container d-flex flex-column flex-md-row'>
            <div class="d-flex flex-column gap-5" style="flex: 0.6">
                <h2 class="fs-1">Your profile</h2>
                <form action="" method="post">
                    <div class="d-inline-flex fs-2 gap-5 w-1">
                        <label class="form-label">Name:</label>
                        <input type="text" name="name" class="form-control" value="<?= $info[0]['name'] ?>" style=" box-shadow: black !important; outline: black">
                    </div>
                    <div class="d-inline-flex fs-2 gap-5">
                        <label class="form-label ">Surname:</label>
                        <input type="text" name="surname" class="form-control" value="<?= $info[0]['surname'] ?>">
                    </div>
                    <div class="d-flex fs-2 gap-5">
                        <label class="form-label ">Email:</label>
                        <input type="text" name="email" class="form-control" disabled value="<?= $info[0]['email'] ?>">
                    </div>
                    <div class="d-flex fs-2 gap-5">
                        <label class="form-label ">Phone:</label>
                        <input type="tel" name="phone" class="form-control" value="<?= $info[0]['phone'] ?>">
                    </div>
                    <div class="d-flex flex-column fs-2 gap-2">
                        <label class="form-label" for="bio">Bio:</label>
                        <textarea name="bio" id="bio" class="form-control"
                                  style="min-height: 350px;resize: none"><?= $info[0]['bio'] ?></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-light">Update</button>
                    </div>
                </form>
            </div>
            <img src="<?= ROOT ?>/assets/images/Trainers/jenna.jpg" class='img-fluid img-thumbnail' alt="JENNA"
                 style="max-height: 600px; flex: 0.4">
        </div>
    <?php endif; ?>
</div>


<?php require_once 'footer.php';