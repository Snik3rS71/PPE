

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
          <h1 class="header center white-text">Contactez-nous</h1>
          <div class="row center">
            <h5 class="header col s12 white-text">Vous avez une question ? Vous avez besoin d'aide ? Nous sommes à votre entière disposition.</h5>
          </div>
        </div>

        <div id="body">
          <?php include "callback/contact.php" ?>
        </div>
        <br>
      </body>

      <!--
      FOOTER
      -->
      <?php include "utils/footer.php" ?>
    </html>
