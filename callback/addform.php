<?php
// Je vérifie que toutes les infos du formulaire sont bien là.
if (!empty($_POST['name']) && !empty($_POST['slots']) && !empty($_POST['url']) && !empty($_POST['img']) && !empty($_POST['descr'])) {
  try {
    $bdd = new PDO('mysql:host=localhost;dbname=ppe', 'ppe', 'root');
    // J'insère dans ma table formations
    $req = "INSERT INTO formations (name, descr, slots, img, url) VALUE (
      '".$_POST['name']."',
      '".$_POST['descr']."',
      '".$_POST['slots']."',
      '".$_POST['img']."',
      '".$_POST['url']."')";
      // On éxécute la requête $req.
      $bdd->exec($req);
    }
    // En cas d'erreur 'try' capture l'erreur et empêche MySQL d'afficher le mot de passe.
    catch (PDOException $e) {
      die ('Erreur : ' . $e -> getMessage());
    }
    header('Location: ../gestform.php');
  } else {
    header('Location: ../gestform.php');
}
?>
