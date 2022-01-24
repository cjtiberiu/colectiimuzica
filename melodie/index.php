<?php 
include '../sesiune.php';
include '../header.php';
?>
    <main>
        <?php $titlu_piesa = $_GET["titlu"]; ?>
        <div class="container">
            <?php 
                $query_colectii = "SELECT colectii.cod_colectie, colectii.denumire, utilizatori.cod_utilizator 
                                    FROM colectii
                                    JOIN utilizatori ON colectii.cod_utilizator = utilizatori.cod_utilizator
                                    WHERE colectii.cod_utilizator = $cod_utilizator";
                $colectii = mysqli_query($cnx, $query_colectii) or die("Eroare: " . mysqli_error($cnx));
            ?>
            

            <h2 class="mb-4"><?= $titlu_piesa ?></h2>
            <form action="./adaugalacolectie.php?id=<?= $_GET["id"] ?>&titlu=<?= $titlu_piesa ?>" method="post">
                <label class="form-label d-block">Adauga la colectie</label>
                <select name="colectie" class="form-select">
                    <option value="">Alege Colectia</option>
                    <?php while ($colectie = mysqli_fetch_assoc($colectii)) : ?>
                        <option value="<?= $colectie["cod_colectie"] ?>"><?= $colectie["denumire"] ?></option>
                    <?php endwhile ?>
                </select>
                <button class="btn btn-primary">Adauga</button>
            </form>
            <?php 
                if (isset($_GET['mesaj'])) {
                    if ($_GET['mesaj'] == 'succes') {
                        echo "<p class='text-success'>Succes</p>";
                    } else {
                        echo "<p class='text-danger'>Eroare</p>";
                    }
                }
            ?>
            <div class="audio-holder mt-5">
                <audio controls class="iru-tiny-player" data-title="<?= $titlu_piesa ?>">
                    <source src="/colectiimuzicale/assets/music/<?= $titlu_piesa ?>" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>