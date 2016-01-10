<html>
  <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8"/>

    <title>Owl Formation - Accueil</title>
  </head>

  <body>
    <!--
    SCRIPTS
    -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/init.js"></script>

    <!--
    NAV BAR
    -->
    <?php include "utils/navbar.php" ?>

    <!--
    CONTENU AVEC PHOTO
    -->
    <div id="section_image_index">
      <h1 class="header center white-text">Owl Formation</h1>
      <div class="row center">
        <h5 class="header col s12 white-text">Started from the bottom now we here</h5>
        <!-- <h5 class="header col s12 white-text">Le meilleur de l'apprentissage informatique via Internet</h5> -->
      </div>
      <br>
      <div class="row center">
        <a href="formations.php" class="btn-large waves-effect waves-light amber black-text"><i class="material-icons left">dashboard</i>Formations</a>
        <?php
          if ($connect != 1) {
            echo '<a href="register.php" class="btn-large waves-effect waves-light amber black-text"><i class="material-icons left">assignment_ind</i>S\'inscrire</a>';
          }
        ?>
      </div>
    </div>

    <!--
    CONTENU INFO
    -->
    <div class="container">
      <div id="wrapper">
        <div class="section">
          <div class="row">
            <div class="col s12 m4">
              <div class="icon-block">
                <h2 class="center custom-color"><i class="material-icons">thumb_up</i></h2>
                <h5 class="center">Facile à prendre en main</h5>
                <p class="light">Les diverses formations qui vous sont proposées ont été simplifié au maximum pour facilité la prise en main afin d'acquérir une meilleur compréhension des éléments.</p>
              </div>
            </div>

            <div class="col s12 m4">
              <div class="icon-block">
                <h2 class="center custom-color"><i class="material-icons">shopping_cart</i></h2>
                <h5 class="center">Prix abordable</h5>
                <p class="light">Nos prix sur les formations sont parmis les plus bas sur le marché, des paiements mensuel sont aussi disponible. Prix à partir de ... </p>
              </div>
            </div>

            <div class="col s12 m4">
              <div class="icon-block">
                <h2 class="center custom-color"><i class="material-icons">fast_forward</i></h2>
                <h5 class="center">Rapidité d'apprentissage</h5>
                <p class="light">Grâce a nos experts nous vous garantissons une totale maîtrise des logiciels en 1 mois maximum.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

  <?php include "utils/footer.php" ?>
</html>
