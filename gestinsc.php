<?php
session_start();
if ($_SESSION['admin'] == 1) {
?>
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

  <h2 id="title-form">Utilisateurs</h2>
  <h5>Liste actuels des utilisateurs inscrits</h5>
  <br>
  <div class="divider"></div>
  <br>


  <table class="centered striped">
    <thead>
      <tr>
        <th data-field="id">Identifiant</th>
        <th data-field="login">Nom d'utilisateur</th>
        <th data-field="first-name">Prénom</th>
        <th data-field="last-name">Nom</th>
        <th data-field="email">Email</th>
        <th data-field="admin">Admin</th>
        <th data-field="date">Date d'inscription</th>
        <th data-field="edit">Editer</th>
        <th data-field="delete">Supprimer</th>
      </tr>
    </thead>

    <tbody>
      <?php
      $bdd = new PDO('mysql:host=localhost;dbname=ppe', 'ppe', 'root');

      $getUsers = $bdd->prepare('SELECT * FROM users');
      $getUsers->execute();

      while($users = $getUsers->fetch()) {
        echo "<tr>";
        echo "<td>" . $users['id'] . "</td><td>" . $users['login'] . "</td><td>" . $users['prenom'] . "</td><td>" . $users['nom'] . "</td><td>" . $users['email'] . "</td><td>" . $users['admin'] . "</td><td>" . $users['date'] . "</td>";
        echo '<td><center><a class="btn-floating waves-effect waves-light blue" href="edituser.php?id=' . $users['id'] . '"><i class="material-icons">settings</i></a></center></td>';
        echo '<td><a class="btn-floating waves-effect waves-light red" href="callback/deluser.php?id=' . $users['id'] . '"><i class="material-icons">delete</i></a></td>';
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</div>


<?php include "utils/footer.php" ?>
</body>
</html>
<?php
} else {
  echo '<script language="Javascript">
  alert("Vous n\'avez pas accès à cette page.");
  location.href = "index.php";
  </script>';
}
?>
