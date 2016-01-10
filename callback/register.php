<?php
// Je vérifie que toutes les infos du formulaire sont bien là.
if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['password2']) && !empty($_POST['email'])) {

    // Check si le mot de passe et la confirmation sont pareils.
    if ($_POST['password'] == $_POST['password2']) {

        // Cryptage du mot de passe.
        $cryptedPassword = sha1($_POST['password']);
        // Création d'une variable date contenant la date actuelle.
        $date = date('m/d/Y h:i:s', time());

        //Check si l'email est valide.
        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z._-]{2,4}$#" , htmlspecialchars($_POST['email']))) {
            try {
              $bdd = new PDO('mysql:host=localhost;dbname=ppe', 'ppe', 'root');
              // J'insère dans ma table users
              $req = "INSERT INTO users (login, prenom, nom, email, password, date) VALUE (
                    '".$_POST['login']."',
                    '".$_POST['prenom']."',
                    '".$_POST['nom']."',
                    '".$_POST['email']."',
                    '".$cryptedPassword."',
                    '".$date."')";
              // On éxécute la requête $req.
              $bdd->exec($req);
            }
            // En cas d'erreur 'try' capture l'erreur et empêche MySQL d'afficher le mot de passe.
            catch (PDOException $e) {
                die ('Erreur : ' . $e -> getMessage());
            }
            header("Location: ../verify.php?msg=1");
        } else {
          header("Location: ../verify.php?msg=3");
        }
    } else {
      header("Location: ../verify.php?msg=4");
      }
} else {
  header("Location: ../verify.php?msg=2");
}
?>
