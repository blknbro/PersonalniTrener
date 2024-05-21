
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
                <a href="<?= ROOT?>/catalog">Katalog</a>
                <a href="<?= ROOT?>/contact">Kontakt</a>
                <a href="<?= ROOT?>/about">O nama</a>
                <a href="<?= ROOT?>/admin" style="font-weight: bold">Admin</a>
            </div>
            <div class="header-name">
                <a href="<?= $_SERVER["REQUEST_URI"]?>">New hope</a>
            </div>
        </div>
    </header>
    <body>

    <main class="main" style="justify-content: center">
        <div class="about-main">
            <div class="about-up">
                <div class="about-info">
                    <h1 style="font-size: 44px">O nama</h1>
                    <p>New Hope je nastao iz ljubavi prema životinjama i želje da pružimo novu nadu napuštenim psima i mačkama. Osnovan 2018. godine, naš dom je postao sigurno utočište za brojne ljubimce kojima smo pružili drugu šansu za sreću i ljubav. Naša misija je jednostavna - stvaranje ljubavi i trajnih veza između četvoronožnih prijatelja i ljudi. Radimo s ljubavlju i posvećenjem kako bismo pružili bezbednost, lečenje i pažnju svakom životinjskom stanovniku koji nam poveri svoje srce. U New Hope, verujemo u odgovorno udomljavanje i pružanje najbolje moguće brige za naše štićenike. Sve naše životinje prolaze kroz detaljan veterinarski pregled, redovne vakcinacije i socijalizaciju kako bi bile spremne za novi dom. </p>
                    <p>Gledamo ka budućnosti s entuzijazmom i ambicijom. Planiramo proširenje naših programa, unapređenje uslova za životinje i jačanje saradnje sa zajednicom. Vaša podrška igra ključnu ulogu u ostvarenju ovih ciljeva.</p>
                </div>
                <div class="about-img">
                    <img src="<?=ROOT?>/assets/images/about.jpg" alt="Slidza" style="border:1px solid var(--primary)">
                </div>
            </div>
            <div class="about-help">
                <h2 style="text-transform: uppercase">Neke od zivotinja koje su nasle novi dom</h2>
                <div class="imgs">
                    <div class="img-help">
                        <img src="<?=ROOT?>/assets/images/dog1.jpg" alt="doggy">
                        <h2>Darwin</h2>
                    </div>
                    <div class="img-help">
                        <img src="<?=ROOT?>/assets/images/cat1.jpg" alt="kitty">
                        <h2>Leo</h2>
                    </div>
                    <div class="img-help">
                        <img src="<?=ROOT?>/assets/images/cat2.jpg" alt="another kitty"=>
                        <h2>Charles</h2>
                    </div>
                    <div class="img-help">
                        <img src="<?=ROOT?>/assets/images/dog2.jpg" alt="another dog">
                        <h2>Zoe</h2>
                    </div>
                    <div class="img-help">
                        <img src="<?=ROOT?>/assets/images/dog3.jpg" alt="another dog">
                        <h2>Rocky</h2>
                    </div>

                </div>
            </div>
        </div>
    </main>
