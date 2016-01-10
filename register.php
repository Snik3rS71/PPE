<html>
  <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8"/>
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

    <div id="body">
      <!--
      TITRE FORMULAIRE
      -->
      <h2 id="title-form">Inscrivez-vous</h2>
      <p>Rejoignez dès maintenant Mr.Robot afin d'obtenir un accès à nos différentes formations.</p>
      <br>
      <div class="divider"></div>
      <br>

      <!--
      FORMULAIRE D'INSCRIPTION
      -->
      <div id="form">
        <div class="row">
          <form method="post" action="callback/register.php" class="col s12">
            <div class="row">
              <div class="input-field col s6">
                <p>Prénom :</p>
                <input placeholder="Prénom" name="prenom" type="text" class="validate">
              </div>
              <div class="input-field col s6">
                <p>Nom :</p>
                <input placeholder="Nom" name="nom" type="text" class="validate">
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <p>Pseudo :</p>
                <input placeholder="Pseudo" name="login" type="text" class="validate">
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <p>Mot de passe :</p>
                <input placeholder="Mot de passe" name="password" type="password" class="validate">
              </div>
              <div class="input-field col s6">
                <p>Confirmation du mot de passe :</p>
                <input placeholder="Confirmation du mot de passe" name="password2" type="password" class="validate">
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <p>Email :</p>
                <input placeholder="Email" name="email" type="email" class="validate">
              </div>
            </div>
            <br>
            <div id="submit-form">
              <button class="btn waves-effect waves-light amber black-text" type="submit" name="send">Envoyer<i class="material-icons right">send</i></button>
            </div>
          </form>
        </div>
      </div>

      <div class="push"></div>
    </div>
    <br>
  </body>

  <!--
  FOOTER
  -->
  <?php include "utils/footer.php" ?>

</html>
