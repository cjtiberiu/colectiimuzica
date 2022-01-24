<?php
    session_start();
    $file_pointer = "../assets/music/" . $_GET["titlu"];
    $cod = $_GET['id'];
    if(isset($_SESSION['logat']) && $_SESSION['logat'] == true) {
        include '../conectare.php';
        $comanda = "DELETE FROM melodii 
                    where cod_melodie = $cod";
        mysqli_query($cnx, $comanda);
        mysqli_close($cnx);
        unlink($filepointer);
        //  Reincarc "functii.php"
        header('Location: ./index.php');
    } else {
        //  Nu este logat!
        header('Location: ./index.php');
    }
?>