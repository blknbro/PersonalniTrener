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

<?php require_once 'navbar.php'?>

<div class="container-fluid container-md d-flex min-vh-100 justify-content-center align-items-center">
    <form action="" method="post" class="w-100 p-5 bg-dark rounded-4 shadow-lg" style="max-width: 624px">
        <?php if(!empty($err)):?>
            <div class="alert alert-danger">
                <?=
                implode("<br>", $err)

                ?>
            </div>
        <?php endif; ?>
        <h1 class="mb-4 text-center">Reset Password</h1>
        <div class="mb-2 text-light form-floating">
            <input type="password" name="passwdR" id="passwdRs" class="form-control" placeholder="toto">
            <label for="passwdR" class="form-label text-dark">Password</label>
        </div>
        <div class="mb-2 text-light form-floating">
            <input type="password" name="passwdRConfirm" id="passwdRsConfirm" class="form-control" placeholder="toto">
            <label for="passwdRConfirm" class="form-label text-dark">Password repeat</label>
        </div>
        <div class="d-grid">
            <button type="submit" name="submit" class="btn btn-light">Reset</button>
        </div>
    </form>
</div>


<?php require_once 'footer.php';