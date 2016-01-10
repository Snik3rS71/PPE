<?php
  session_start();
  $connect = 0;
  if (isset($_SESSION['login'])) {
    $idForm = $_GET['id'];
    $idUser = $_SESSION['id'];

    $bdd = new PDO('mysql:host=localhost;dbname=ppe', 'ppe', 'root');
    $registerform = $bdd->prepare("INSERT INTO subscribers (idform, iduser) VALUE (
      '" . $idForm . "',
      '" . $idUser . "')");
    $adduser = $bdd->prepare("UPDATE formations SET subscribers = subscribers + 1 WHERE idform=\"" . $idForm . "\"");
    $registerform->execute();
    $adduser->execute();

    header('Location: ../formations.php');
  } else {
    echo '<script language="Javascript">
            alert("Vous devez être connecté pour vous inscrire à une formation !");
            location.href = "formations.php";
          </script>';
  }
?>
