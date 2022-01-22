<?php 
include '../sesiune.php';
include '../header.php';
?>
    <main class="d-flex justify-content-center align-items-center w-100" style="height: 100vh">
        <form action="./logare.php" method="post">
            <div class="form-group">
                <div class="form-holder">
                    <label class="form-label">Username</label>
                    <input class="form-control bg-transparent text-white" id="user" name="user" type="text" />
                </div>
            </div>
            <div class="form-group">
                <div class="form-holder">
                    <label class="form-label">Parola</label>
                    <input class="form-control bg-transparent text-white" id="parola" name="parola" type="password" />
                </div>
            </div>
            <button class="btn btn-primary mt-3 w-100" type="submit">Logare</button>
            <?php 
                if (isset($_GET["status"]) && $_GET['status'] == 'incorrect') {
                    echo '<p class="text-center text-danger">Datele nu au fost corecte</p>';
                }
            ?>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>