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
<body class="bg-black text-light">

<?php require_once 'navbar.php'; ?>

<div class="container align-items-center text-center mx-auto min-vh-100 p-5 bg-dark rounded-2 w-100" style="margin-top: 64px;">
    <?php if(!empty($_GET['s'])):?>
    <div class="alert alert-success">
        Success!
    </div>
    <?php endif;?>
    <?php if (!isset($_SESSION['email']) || $info[0]['email'] !== $_SESSION['email']): ?>
        <div class="row align-items-center">
            <div class="col-md-8 d-flex flex-column gap-4">
                <h2 class="fs-1"><?= htmlspecialchars($info[0]['name']) . " " . htmlspecialchars($info[0]['surname']) ?></h2>
                <div class="d-flex fs-4 gap-2">
                    <strong>Name:</strong>
                    <p><?= htmlspecialchars($info[0]['name']) ?></p>
                </div>
                <div class="d-flex fs-4 gap-2">
                    <strong>Surname:</strong>
                    <p><?= htmlspecialchars($info[0]['surname']) ?></p>
                </div>
                <div class="d-flex fs-4 gap-2">
                    <strong>Email:</strong>
                    <p><?= htmlspecialchars($info[0]['email']) ?></p>
                </div>
                <div class="d-flex fs-4 gap-2">
                    <strong>Phone:</strong>
                    <p><?= htmlspecialchars($info[0]['phone']) ?></p>
                </div>
                <div class="d-flex flex-column fs-4">
                    <strong>Bio:</strong>
                    <p><?= htmlspecialchars($info[0]['bio']) ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <img src="<?= ROOT ?>/assets/images/Trainers/jenna.jpg" class="img-fluid img-thumbnail" alt="JENNA" style="width: 100%; height: auto; max-height: 600px;">
            </div>
        </div>
    <?php else: ?>
        <div class="d-flex flex-column flex-md-row">
            <div class="d-flex flex-column gap-4 flex-grow-1">
                <h2 class="fs-1">Your profile</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label fs-4">Name:</label>
                        <input type="text" name="name" class="form-control" id="name" value="<?= htmlspecialchars($info[0]['name']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label fs-4">Surname:</label>
                        <input type="text" name="surname" class="form-control" id="surname" value="<?= htmlspecialchars($info[0]['surname']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fs-4">Email:</label>
                        <input type="text" class="form-control" id="email" disabled value="<?= htmlspecialchars($info[0]['email']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label fs-4">Phone:</label>
                        <input type="tel" name="phone" class="form-control" id="phone" value="<?= htmlspecialchars($info[0]['phone']) ?>">
                    </div>
                    <?php if($_SESSION['type'] === 'trainer'):?>
                    <div class="mb-3">
                        <label for="bio" class="form-label fs-4">Bio:</label>
                        <textarea name="bio" id="bio" class="form-control" style="min-height: 200px; resize: none;"><?= htmlspecialchars($info[0]['bio']) ?></textarea>
                    </div>
                    <?php endif;?>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-light">Update</button>
                    </div>
                </form>
            </div>
            <div class="ms-md-5">
                <img src="<?= ROOT ?>/assets/images/Trainers/jenna.jpg" class="img-fluid img-thumbnail" alt="JENNA" style="max-height: 600px;">
            </div>
        </div>
    <?php endif; ?>
</div>

<?php require_once 'footer.php'; ?>

