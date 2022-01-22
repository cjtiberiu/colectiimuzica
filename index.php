<?php 
include 'sesiune.php';
include 'header.php'; 
?>
    <main class="main home-page">
        <div class="container text-center">
            <?php if (isset($_SESSION["logat"])) :?>
                <h1>Bun Venit, <?= $nume ?></h1>
            <?php else :?>
                <h1>Bun Venit</h1>
                <a href="/colectiimuzicale/logare" class="btn btn-primary">Conectare</a>
            <?php endif ?>
        </div>
    </main>
</body>
</html>