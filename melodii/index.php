<?php 
include '../sesiune.php';
include '../header.php';
?>
    
    <main class="" style="height: 100vh">
        <div class="container">
            <div class="d-flex align-items-center mt-5">
                        <h2 class="mb-0">Piese</h2>
                        <a href="javascript:void(0)" class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#modal-adauga-piesa">Adauga Piesa</a>
                    </div>
            <ul class="list-unstyled mt-5">
            <?php
                $query_melodii = "SELECT melodii.titlu, melodii.cod_melodie, melodii.cod_utilizator
                                    FROM melodii";
                $melodii = mysqli_query($cnx, $query_melodii) or die("Eroare: " . mysqli_error($cnx));
                
                while ($melodie = mysqli_fetch_assoc($melodii)) : ?>
                    <li class="icon-list-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-music-note-list" viewBox="0 0 16 16">
                            <path d="M12 13c0 1.105-1.12 2-2.5 2S7 14.105 7 13s1.12-2 2.5-2 2.5.895 2.5 2z"/>
                            <path fill-rule="evenodd" d="M12 3v10h-1V3h1z"/>
                            <path d="M11 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 16 2.22V4l-5 1V2.82z"/>
                            <path fill-rule="evenodd" d="M0 11.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 7H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 3H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        <a href="/colectiimuzicale/melodie/?titlu=<?= $melodie["titlu"] ?>&id=<?= $melodie["cod_melodie"] ?>"><?= $melodie["titlu"] ?></a>
                        <?php if ($_SESSION["cod_utilizator"] == $melodie["cod_utilizator"]) :?>
                            <a class="ms-4" href="stergemelodie.php?id=<?= $melodie['cod_melodie'] ?>&titlu=<?= $melodie['titlu'] ?>">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        <?php endif ?>
                    </li>
                <?php endwhile ?>
            </ul>
            <!-- <div class="row mt-5">
                <div class="col-12 col-lg-3">
                    <form action="./adaugamelodie.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-holder">
                                <label class="form-label">Adauga Piesa</label>
                                <input class="form-control bg-transparent text-white custom-file-input" id="melodie" name="melodie" type="file" />
                            </div>
                        </div>
                        <button class="btn btn-primary mt-3 w-100" type="submit" name="submit">Adauga</button>
                        <?php/* 
                            if (isset($_GET["status"]) && $_GET['status'] == 'incorrect') {
                                echo '<p class="text-center text-danger">Datele nu au fost corecte</p>';
                            }
                        */?>
                    </form>
                </div>
            </div> -->
        </div>
    </main>

    <div class="modal" tabindex="-1" role="dialog" id="modal-adauga-piesa">
        <div class="modal-dialog" role="document">
            <div class="modal-content p-5">
                <div class="modal-body">
                    <form action="./adaugamelodie.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-holder">
                                <label class="form-label">Adauga Piesa</label>
                                <input class="form-control bg-transparent text-white custom-file-input" id="melodie" name="melodie" type="file" />
                            </div>
                        </div>
                        <button class="btn btn-primary mt-4 w-100" type="submit" name="submit">Adauga</button>
                        <?php 
                            if (isset($_GET["status"]) && $_GET['status'] == 'incorrect') {
                                echo '<p class="text-center text-danger">Datele nu au fost corecte</p>';
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>