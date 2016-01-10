<?php
session_start();
$connect = 0;
$admin = 0;
if (isset($_SESSION['login'])) $connect = 1;
if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] == 1) $admin = 1;
}
?>

<html>
  <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../css/style.css">

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

    <ul id="dropdown1" class="dropdown-content">
    <li><a href="gestinsc.php">Utilisateurs</a></li>
    <li class="divider"></li>
    <li><a href="gestform.php">Formations</a></li>
    </ul>

    <ul id="dropdown2" class="dropdown-content">
    <li><a href="edituser.php?id=<?php echo $_SESSION['id']; ?>">Editer mon profil</a></li>
    <li class="divider"></li>
    <li><a href="callback/disconnect.php">Déconnexion</a></li>
    </ul>

    <nav>
    <div class="nav-wrapper z-depth-3">
      <a href="index.php"><font id="logo">Owl Formation</font></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.php"><i class="material-icons left">reorder</i>Accueil</a></li>
        <li><a href="formations.php"><i class="material-icons left">dashboard</i>Formations</a></li>
        <li><a href="contact.php"><i class="material-icons left">chat</i>Contact</a></li>
        <?php
          if ($connect == 1) {
            echo '<li><a class="dropdown-button green-text" data-activates="dropdown2"><i class="material-icons left">supervisor_account</i>' . $_SESSION['login'] . '</a></li>';
              if ($admin == 1) {
                  echo '<li><a class="dropdown-button blue-text" data-activates="dropdown1">Admin<i class="material-icons left">settings</i></a></li>';
              }
          } else {
            echo '<li><a href="login.php"><i class="material-icons left">supervisor_account</i>Connexion</a></li>';
        }
        ?>
      </ul>
    </div>
    </nav>
  </body>
</html>
