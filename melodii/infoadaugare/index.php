<?php 
include '../../sesiune.php';
include '../../header.php';
?>
    
    <main class="" style="height: 100vh">
        <div class="container">
                           
        </div>
    </main>

    <div class="modal show" tabindex="-1" role="dialog" id="modal-adauga-piesa" style="display: block">
        <div class="modal-dialog" role="document">
            <div class="modal-content align-items-center text-center p-5">
                <div class="modal-header">
                    <h2>Informatii upload</h2>
                </div>
                <div class="modal-body">
                    <?php if (isset($_GET['eroare'])):?>
                        <p><?= $_GET['titlu'] ?> <?= $_GET['eroare'] ?> </p>
                    <?php endif ?>
                </div>
                <div class="modal-footer text-center justify-content-center align-items-center">
                    <a href="/colectiimuzicale/melodii" class="btn btn-primary">Inapoi</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>