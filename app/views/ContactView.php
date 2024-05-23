
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

    <main class="main" style="justify-content: center">
        <div class="contact-main">
            <div class="contact-info">
                <h1>Kontaktiraj nas</h1>
                <div class="info-container">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
                    <div class="info">
                        <h2>Adresa:</h2>
                        <p>Bore Stankovića 88, Subotica, Srbija</p>
                    </div>
                </div>
                <div class="info-container">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 7v5l3 3" /></svg>
                    <div class="info">
                        <h2>Radno vreme:</h2>
                        <p>Ponedeljak - Petak: 08:00 - 20:00<br>
                            Subota: 09:00 - 17:00<br>
                            Nedelja: Zatvoreno</p>
                    </div>
                </div>
                <div class="info-container">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>
                    <div class="info">
                        <h2>Telefon:</h2>
                        <p>+381 24 5555 888 (radno vreme)</p>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <h2>Posalji nam poruku</h2>
                <form>
                    <div class="name">
                        <p>Ime:</p>
                        <input type="text">
                    </div>
                    <div class="email">
                        <p>Email:</p>
                        <input type="text">
                    </div>
                    <div class="message">
                        <p>Poruka:</p>
                        <textarea rows="5"></textarea>
                    </div>
                    <button class="button-submit">Posalji poruku</button>
                </form>
            </div>
        </div>
    </main>
    </body>
</div>
</html>
