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

    <div id="section_image_annexe">
      <h1 class="header center white-text">Connectez-vous</h1>
      <div class="row center">
        <h5 class="header col s12 white-text">Connectez-vous au site Owl Formation afin d'accéder aux formations.</h5>
      </div>
    </div>

    <div id="body">
      <!--
      FORMULAIRE D'INSCRIPTION
      -->
      <div id="form">
        <div class="row">
          <form method="post" action="callback/login.php" class="col s12">
            <div class="row">
              <div class="input-field col s12">
                <p>Identifiant :</p>
                <input placeholder="Identifiant" name="login" type="text" class="validate">
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <p>Mot de passe :</p>
                <input placeholder="Mot de passe" name="password" type="password" class="validate">
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
