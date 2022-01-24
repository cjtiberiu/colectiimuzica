<?php
    session_start();
    if(isset($_SESSION['logat']) && $_SESSION['logat'] == true) {
    $cod = $_GET['id'];
    include '../conectare.php';
    $comanda = "DELETE FROM melodii_colectii 
                where cod_melodie_colectie = $cod";
    mysqli_query($cnx, $comanda);
    mysqli_close($cnx);
    //  Reincarc "functii.php"
    header('Location: ./index.php');
    } else {
    //  Nu este logat!
    header('Location: ./index.php');
    }
?>