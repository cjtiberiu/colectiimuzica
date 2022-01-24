<?php  include 'conectare.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/colectiimuzicale/styles/styles.css" />
    <link href="/colectiimuzicale/styles/tinyPlayer.css" rel="stylesheet" />
    <title>Colectii Muzica</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js" integrity="sha512-6+YN/9o9BWrk6wSfGxQGpt3EUK6XeHi6yeHV+TYD2GR0Sj/cggRpXr1BrAQf0as6XslxomMUxXp2vIl+fv0QRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/colectiimuzicale/scripts/tinyPlayer.js"></script>
</head>
<body>
    <header>
        <div class="navigation-wrapper">
            <div class="container">
                <ul class="navigation list-unstyled py-3">
                    <li>
                        <a href="/colectiimuzicale/colectii">Colectii</a>
                    </li>
                    <li>
                        <a href="/colectiimuzicale/melodii">Melodii</a>
                    </li>
                    <?php if (isset($_SESSION["logat"]) && $_SESSION["logat"] == true) :?>
                        <li>
                            <a href="/colectiimuzicale/delogare.php" class="btn-get-started">Deconectare</a>
                        </li>
                    <?php else :?>
                        <li>
                            <a href="/colectiimuzicale/logare">CONECTARE</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </header>