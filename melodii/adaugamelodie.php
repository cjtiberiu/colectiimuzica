<?php
session_start();

$uploaddir = '/colectiimuzicale/assets/music/';
$uploadfile = $uploaddir . basename($_FILES['melodie']['name']);

// make a folder upload to move your file.I yhink this code is necessary to modified but right now it working correctly.
if(isset($_POST['submit']))
{
$allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma");
//echo $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$fileName = $_FILES['melodie']['name'];
$extension = substr($fileName, strrpos($fileName, '.') + 1); // getting the info about the image to get its extension
 
/*if ((($_FILES["file"]["type"] == "video/mp4")|| ($_FILES["file"]["type"] == "audio/mp3")|| ($_FILES["file"]["type"] == "audio/wma")|| ($_FILES["file"]["type"] == "image/pjpeg")|| ($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")) && ($_FILES["file"]["size"] < 200000) && in_array($extension, $allowedExts))*/
 
if(in_array($extension, $allowedExts))
  {
  if ($_FILES["melodie"]["error"] > 0)
    {
     echo "Return Code: " . $_FILES["melodie"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["melodie"]["name"] . "<br />";
    echo "Type: " . $_FILES["melodie"]["type"] . "<br />";
    echo "Size: " . ($_FILES["melodie"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["melodie"]["tmp_name"] . "<br />";

    //header('Location: ./infoadaugare/index.php?upload=' . $_FILES["melodie"]["name"] . '&eroare=exista deja');

 
    if (file_exists("C:\\xampp\htdocs\colectiimuzicale\assets\music\\" . $_FILES["melodie"]["name"]))
    {
        header('Location: ./infoadaugare/index.php?titlu=' . $_FILES["melodie"]["name"] . '&eroare=exista deja');
    }
    else
    {
    
      move_uploaded_file($_FILES["melodie"]["tmp_name"],"C:\\xampp\htdocs\colectiimuzicale\assets\music\\" . $_FILES["melodie"]["name"]);
      echo "Stored in: " . "assets/music/" . $_FILES["melodie"]["name"];
      echo "<a href='/colectiimuzicale/melodii' class='btn btn-primary'>Go Back</a>";
      include '../conectare.php';
        $titlu_melodie = $_FILES["melodie"]["name"];
        $comanda = "INSERT INTO melodii (titlu, cod_utilizator) VALUES (?, ?)";
        if($stm = mysqli_prepare($cnx, $comanda)) {
        mysqli_stmt_bind_param($stm, 'ss', $titlu_melodie, $_SESSION['cod_utilizator']);
        mysqli_stmt_execute($stm);
        } else {
        echo "Eroare la crearea variabilei de tip statement.";
        }
        mysqli_close($cnx);
    }
    }
  }
else
  {
  echo "Invalid file";
  }
}

// if(isset($_SESSION['logat']) && $_SESSION['logat'] == true) {
//   $eroare = '';

//   if(empty($_POST['melodie'])) {
//     $eroare .= '<p>Nu ați introdus denumirea!</p>';
//   } else {
//     $colectia = corectez($_POST['melodie']);
//   }

//   //  Verific daca preluarea datelor s-a derulat corect
//   if($eroare == '') {
//     //  Nu sunt mesaje de eroare
//     include '../../conectare.php';
//     // formulez comanda INSERT
//     $comanda = "INSERT INTO colectii (denumire, cod_utilizator) VALUES (?, ?)";
//     if($stm = mysqli_prepare($cnx, $comanda)) {
//       mysqli_stmt_bind_param($stm, 'ss', $colectia, $_SESSION['cod_utilizator']);
//       mysqli_stmt_execute($stm);
//     } else {
//       echo "Eroare la crearea variabilei de tip statement.";
//     }
//     mysqli_close($cnx);
//     //  Reincarc "functii.php"
//     header('Location: ../index.php');
//   } else {
//     echo "Eroare: " . $eroare;
//   }
// } else {
//   //  Nu este logat!
//   header('Location: ../index.php');
// }
?>