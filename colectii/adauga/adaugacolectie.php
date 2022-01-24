<?php
session_start();

function corectez($sir) {
  $sir = trim($sir);
  $sir = stripslashes($sir);
  $sir = htmlspecialchars($sir);
  return $sir;
}

if(isset($_SESSION['logat']) && $_SESSION['logat'] == true) {
  $eroare = '';

  if(empty($_POST['colectie'])) {
    $eroare .= '<p>Nu ați introdus denumirea!</p>';
  } else {
    $colectia = corectez($_POST['colectie']);
  }

  //  Verific daca preluarea datelor s-a derulat corect
  if($eroare == '') {
    //  Nu sunt mesaje de eroare
    include '../../conectare.php';
    // formulez comanda INSERT
    $comanda = "INSERT INTO colectii (denumire, cod_utilizator) VALUES (?, ?)";
    if($stm = mysqli_prepare($cnx, $comanda)) {
      mysqli_stmt_bind_param($stm, 'ss', $colectia, $_SESSION['cod_utilizator']);
      mysqli_stmt_execute($stm);
    } else {
      echo "Eroare la crearea variabilei de tip statement.";
    }
    mysqli_close($cnx);
    //  Reincarc "functii.php"
    header('Location: ../index.php');
  } else {
    echo "Eroare: " . $eroare;
  }
} else {
  //  Nu este logat!
  header('Location: ../index.php');
}
?>