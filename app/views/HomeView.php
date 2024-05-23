
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Kristijan Dulic"/>
    <meta name="description" content="New hope - dom za udovljavanje pasa i macaka"/>
    <meta name="robots" content="noindex"/>
    <link href=<?=ROOT . "/assets/styles/style.css"?>  type="text/css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;300;400;500;700;800&family=Roboto+Condensed:wght@100;200;300;400;500;700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>New hope</title>
</head>
<div class="page">
    <header class="header-wrapper">
        <div class="header">
            <div class="header-links">
                <a href="<?= ROOT?>">Katalog</a>
                <a href="<?= ROOT?>/contact">Kontakt</a>
                <a href="<?= ROOT?>/about">O nama</a>
                <a href="<?= ROOT?>/admin" style="font-weight: bold">Admin</a>
            </div>
            <div class="header-name">
                <a href="<?= ROOT?>">New hope</a>
            </div>
        </div>
    </header>
    <body>

    <main class="main" style="align-items: flex-start">
        <div class="catalog">
            <form method="post" style="justify-content: center">
                <input placeholder="Pretraga..." name="search" value=''>
            </form>
<!--            <div class="catalog-content">-->
<!--                --><?php
//                while ($animal = $result->fetch_assoc()) {
//                    echo "
//                <div class='animals-info' style='width: 100%'>
//                <div class='animal-info' style='width: 100%'>
//                <img src='Images/animals/${animal['photo']}' alt='Images/animals/${animal['photo']}' style='width: 100%; border-radius: 8px'>
//                <p style='text-align: left'>{$animal['name']}</p>
//                </div>
//
//
//                <div class='adopt-main'>
//                <form action='adopt.php' method='get'>
//                <input type='hidden' value='{$animal['id']}' name='id'>
//                <button class='button-adopt'>
//                Udomi
//                <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-home' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
//  <path stroke='none' d='M0 0h24v24H0z' fill='none' />
//  <path d='M5 12l-2 0l9 -9l9 9l-2 0' />
//  <path d='M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7' />
//  <path d='M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6' />
//</svg>
//                </div >
//                </button >
//                </form>
//</div >
//    ";
//                }
//                ?>
<!--            </div>-->
        </div>

    </main>

    </body>
</div>
</html>

