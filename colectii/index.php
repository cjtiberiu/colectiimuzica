<?php 
include '../sesiune.php';
include '../header.php';
?>
    <main class="main">
        <div class="container">
            <div class="latest-wrapper mt-5">

                <?php if(isset($_SESSION['logat'])) :?>
                    <h2>Colectii salvate</h2>
                    <div class="lista-colectii">
                    
                    <?php 
                        $query_colectii = "SELECT colectii.cod_colectie, colectii.denumire, utilizatori.cod_utilizator 
                                           FROM colectii
                                           JOIN utilizatori ON colectii.cod_utilizator = utilizatori.cod_utilizator
                                           WHERE colectii.cod_utilizator = $cod_utilizator";
                        $colectii = mysqli_query($cnx, $query_colectii) or die("Eroare: " . mysqli_error($cnx));

                        while($colectie = mysqli_fetch_assoc($colectii)) : ?>

                            <div class="colectie card d-flex flex-row p-3">
                                <div class="colectie__img">
                                    <img src="../assets/images/record1.jpg" width="200" height="auto" />
                                </div>
                                <div class="d-flex flex-column ms-5">
                                    <h3 class="colectie__titlu"><?= $colectie["denumire"] ?></h3>
                                    <ul class="list-unstyled colectie__melodii">

                                        <?php
                                            $cod_colectie = $colectie["cod_colectie"];
                                            $query_melodii = "SELECT melodii_colectii.cod_colectie, colectii.cod_colectie, colectii.denumire as denumire_colectie, melodii.titlu as titlu_melodie
                                                                FROM melodii_colectii
                                                                INNER JOIN colectii ON melodii_colectii.cod_colectie = colectii.cod_colectie
                                                                INNER JOIN melodii on melodii_colectii.cod_melodie = melodii.cod_melodie
                                                                WHERE colectii.cod_colectie = $cod_colectie";
                                            $melodii = mysqli_query($cnx, $query_melodii);

                                            while ($melodie = mysqli_fetch_assoc($melodii)) :?>
                                            
                                                <li>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-music-note-list" viewBox="0 0 16 16">
                                                        <path d="M12 13c0 1.105-1.12 2-2.5 2S7 14.105 7 13s1.12-2 2.5-2 2.5.895 2.5 2z"/>
                                                        <path fill-rule="evenodd" d="M12 3v10h-1V3h1z"/>
                                                        <path d="M11 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 16 2.22V4l-5 1V2.82z"/>
                                                        <path fill-rule="evenodd" d="M0 11.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 7H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 3H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/>
                                                    </svg>
                                                    <span class="ms-2"><?= $melodie["titlu_melodie"] ?></span>
                                                </li>

                                            <?php endwhile ?>
                                    </ul>
                                </div>
                            </div>

                        <?php endwhile ?>
                    </div>
                <?php else :?>
                    <div class="w-100 text-center">
                        <h4>Pentru a vizualiza colectiile dvs salvate trebuie sa va logati</h4>
                        <a href="/colectiimuzicale/logare" class="btn btn-primary">Conectare</a>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </main>
</body>
</html>