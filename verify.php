<?php
$getMsg = $_GET['msg'];
?>
<html>
  <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8"/>
  </head>

  <body>
    <!--
    SCRIPTS
    -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

    <!--
    NAV BAR
    -->
    <?php include "utils/navbar.php" ?>

    <!--
    CONTENU
    -->
    <div id="content">
      <div id="register">
        <?php
          if ($getMsg == 1) {
            echo '<img id="icon-register" src="../img/ok.png"/>
                  <h3>Félicitations.</h3>
                  <p><i>Vous êtes maintenant inscrit ! :)</i><br>
                  <b>Connectez-vous afin d\'accéder dès maintenant à nos formations.</b></p>';
          } else if ($getMsg == 2) {
            echo '<img id="icon-register" src="../img/error.png"/>
                  <h3>Erreur !</h3>
                  <p><i>Vous avez laissé un/des champ(s) obligatoire(s) vide(s).</i><br>
                  <b>L\'inscription n\'a donc pas aboutie.</b></p>';
          } else if ($getMsg == 3) {
            echo '<img id="icon-register" src="../img/error.png"/>
                  <h3>Erreur !</h3>
                  <p><i>L\'e-mail saisie est invalide.</i><br>
                  <b>L\'inscription n\'a donc pas aboutie.</b></p>';
          } else if ($getMsg == 4) {
            echo '<img id="icon-register" src="../img/error.png"/>
                  <h3>Erreur !</h3>
                  <p><i>Les mots de passe rentrés ne sont pas identiques.</i><br>
                  <b>L\'inscription n\'a donc pas aboutie.</b></p>';
          }
        ?>
        <a href="index.php">» Retour à l'accueil «</a>
      </div>
    </div>
  </body>

  <!--
  FOOTER
  -->
  <?php include "utils/footer.php" ?>
</html>
