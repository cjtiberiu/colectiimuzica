<?php  include 'conectare.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="/colectiimuzicale/styles/styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <title>Colectii Muzica</title>
</head>
<body>
    <header>
        <div class="navigation-wrapper">
            <div class="container">
                <ul class="navigation list-unstyled">
                    <li>
                        <a href="/colectiimuzicale/colectii">Colectii</a>
                    </li>
                    <li>
                        <a href="/colectiimuzicale/artisti">Artisti</a>
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