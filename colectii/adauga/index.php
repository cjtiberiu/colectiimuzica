<?php 
include '../../sesiune.php';
include '../../header.php';
?>
    <main class="d-flex justify-content-center align-items-center w-100" style="min-height: 60vh">
        <form action="./adaugacolectie.php" method="post">
            <div class="form-group">
                <div class="form-holder">
                    <label class="form-label">Denumire</label>
                    <input class="form-control bg-transparent text-white" id="colectie" name="colectie" type="text" />
                </div>
            </div>
            <button class="btn btn-primary mt-3 w-100" type="submit">Adauga</button>
            <?php 
                if (isset($_GET["status"]) && $_GET['status'] == 'incorrect') {
                    echo '<p class="text-center text-danger">Datele nu au fost corecte</p>';
                }
            ?>
        </form>
    </main>
</body>
</html>