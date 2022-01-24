<?php
session_start();

if(isset($_SESSION['logat']) && $_SESSION['logat'] == true) {
  $eroare = '';

  if(empty($_POST['colectie'])) {
    $eroare .= '<p>Nu ați introdus denumirea!</p>';
  } else {
    $colectia = $_POST['colectie'];
  }

  //  Verific daca preluarea datelor s-a derulat corect
  if($eroare == '') {
    //  Nu sunt mesaje de eroare
    include '../conectare.php';
    // formulez comanda INSERT
    $comanda = "INSERT INTO melodii_colectii (cod_colectie, cod_melodie) VALUES (?, ?)";
    if($stm = mysqli_prepare($cnx, $comanda)) {
      mysqli_stmt_bind_param($stm, 'ss', $colectia, $_GET["id"]);
      mysqli_stmt_execute($stm);
    } else {
      echo "Eroare la crearea variabilei de tip statement.";
    }
    mysqli_close($cnx);
    //  Reincarc "functii.php"
    header("Location: ./index.php?mesaj=succes&titlu=" . $_GET['titlu'] . "&id=" . $_GET['id'] . "");
  } else {
    echo "Eroare: " . $eroare;
  }
} else {
  //  Nu este logat!
  header('Location: ./index.php');
}
?>