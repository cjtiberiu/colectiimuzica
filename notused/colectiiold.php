<?php  include 'conectare.php'; ?>
<?php
    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

    $query = "SELECT melodii.titlu, melodii.cod_melodie, colectii.cod_colectie, colectii.denumire 
                FROM colectii
                LEFT JOIN MELODII ON colectii.COD_COLECTIE = melodii.COD_COLECTIE;";
    $result = mysqli_query($cnx, $query);

    $colectii = array();
    while($row = mysqli_fetch_array($result)) {
        $colectii[$row["cod_colectie"]]["denumire"] = $row["denumire"];
        if (!is_null($row["titlu"])) {
            $colectii[$row["cod_colectie"]]["melodii"][$row["cod_melodie"]] = array(
                "melodie"=>$row["titlu"],
            );
        } else {
            $colectii[$row["cod_colectie"]]["melodii"] = array();
        }
    }
    //console_log($colectii)
?>