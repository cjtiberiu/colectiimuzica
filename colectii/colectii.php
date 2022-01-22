<?php
    $query_colectii = "SELECT colectii.cod_colectie, colectii.denumire 
                       FROM colectii";
    $colectii = mysqli_query($cnx, $query_colectii);

    function cauta_melodii_colectie($cod_colectie, $cnx) {
        $query_melodii = "SELECT melodii_colectii.cod_colectie, colectii.cod_colectie, colectii.denumire as denumire_colectie, melodii.titlu as titlu_melodie
                          FROM melodii_colectii
                          INNER JOIN colectii ON melodii_colectii.cod_colectie = colectii.cod_colectie
                          INNER JOIN melodii on melodii_colectii.cod_melodie = melodii.cod_melodie
                          WHERE colectii.cod_colectie = $cod_colectie";

        $melodii = mysqli_query($cnx, $query_melodii);

        return $melodii;
    }

    //$cod_colectie_anterioara = 0;
    // while ($row = mysqli_fetch_assoc($colectii)) {
    //     console_log($row);
    //     if ($row["cod_colectie"] != $cod_colectie_anterioara) {
    //         echo "<h3>" .$row["denumire"]. "</h3>";
    //         $cod_colectie_anterioara = $row["cod_colectie"];
    //     }
    //     echo "<p>" .$row["titlu"]. "</p>";
    // }
?>