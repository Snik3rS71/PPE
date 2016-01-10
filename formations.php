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
<div id="section_image_annexe">
  <h1 class="header center white-text">Nos formations</h1>
  <div class="row center">
    <h5 class="header col s12 white-text">Voici les différentes formations proposées par Owl Formation.</h5>
  </div>
</div>

<div id="body">
  <div class="row">
    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=ppe', 'ppe', 'root');

    $getForms = $bdd->prepare('SELECT * FROM formations');
    $getForms->execute();

    while($forms = $getForms->fetch()) {
      if ($forms['subscribers'] < $forms['slots']) {
        echo '<div class="input-field col s6">
        <div class="card">
        <div class="card-image">
        <img src="' . $forms['img'] . '">
        <span class="card-title black-text">' . $forms['name'] . '</span>
        </div>
        <div class="card-content">
        <p>' . $forms['descr'] . '</p>
        </div>
        <div class="card-action">';

        if ($connect != 1) {
          echo '<a class="red-text">Vous devez être connecté pour vous inscrire à une formation</a>';
        } else {
          $getIfSub = $bdd->prepare('SELECT idform FROM subscribers WHERE iduser = ' . $_SESSION['id'] . '');
          $getIfSub->execute();
          $data = $getIfSub->fetch();

          if ($data['idform'] == $forms['idform']) {
            echo '<a href="' . $forms['url'] . '" class="green-text">Accèder à cette formation</a>';
          } else {
            echo '<a href="callback/registerform.php?id=' . $forms['idform'] . '" class="blue-text">S\'inscrire à cette formation</a>';
          }
        }
        echo '<span class="badge">' . $forms['subscribers'] . '/' . $forms['slots'] . ' inscrits
        </div>
        </div>
        </div>';
      }
    }
    ?>
  </div>
</div>
</body>

<!--
FOOTER
-->
<?php include "utils/footer.php" ?>
</html>
