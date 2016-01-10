<?php
session_start();

$idUser = $_GET['id'];
$bdd = new PDO('mysql:host=localhost;dbname=ppe', 'ppe', 'root');
$dataUser = $bdd->prepare('SELECT * FROM users WHERE id =' . $idUser . '');
$dataUser->execute();

while ($userForm = $dataUser->fetch()) {
  $userLogin = $userForm['login'];
  $userPrenom = $userForm['prenom'];
  $userNom = $userForm['nom'];
  $userEmail = $userForm['email'];
  $userAdmin = $userForm['admin'];
}

function editForm() {
  $idUser = $_GET['id'];
  $bdd = new PDO('mysql:host=localhost;dbname=ppe', 'ppe', 'root');

  if (!empty($_POST['password']) && !empty($_POST['password2'])) {
    if ($_POST['password'] == $_POST['password2']) {
      $cryptedPassword = sha1($_POST['password']);
      $editName = $bdd->prepare("UPDATE users SET login = '" . $_POST['login'] . "', prenom = '" . $_POST['prenom'] . "', nom = '" . $_POST['nom'] . "', email = '" . $_POST['email'] . "', password = '" . $cryptedPassword . "', admin = '" . $_POST['admin'] . "' WHERE id= " . $idUser . "");
    } else {
      echo '<script language="Javascript">
      alert("Les mots de passe rentrés ne sont pas identiques.");
      location.href = "index.php";
      </script>';
    }
  } else {
    $editName = $bdd->prepare("UPDATE users SET login = '" . $_POST['login'] . "', prenom = '" . $_POST['prenom'] . "', nom = '" . $_POST['nom'] . "', email = '" . $_POST['email'] . "', admin = '" . $_POST['admin'] . "' WHERE id= " . $idUser . "");
  }
  $editName->execute();
  if ($_SESSION['admin'] == 1) {
    header('Location: gestinsc.php');
  } else {
    header('Location: index.php');
  }
}

if (isset($_POST['send'])) {
  editForm();
}

if ($_SESSION['id'] == $idUser || $_SESSION['admin'] == 1)
{
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

<div id="body">
  <br>
  <h5>Edition du profil de <?php echo $userLogin; ?></h5>
  <br>
  <div class="divider"></div>
  <br>

  <div class="row">
    <form method="post" action="edituser.php?id=<?php echo $idUser; ?>" class="col s12">
      <div class="row">
        <div class="input-field col <?php if ($_SESSION['admin'] == 1) { echo 's6'; } else { echo 's12'; } ?>">
          <p>Pseudo :</p>
          <input value="<?php echo $userLogin; ?>" name="login" type="text" class="validate"></input>
        </div>
        <?php
        if ($_SESSION['admin'] == 1) {
          echo '<div class="input-field col s6">
          <p>
          <input name="admin" type="checkbox" class="filled-in" id="filled-in-box" value="1" ';
          if ($userAdmin == 1) {
            echo 'checked="checked"';
          }
          echo '/>
          <label for="filled-in-box">Admin</label>
          </p>
          </div>
          ';
        }
        ?>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <p>Prénom :</p>
          <input value="<?php echo $userPrenom; ?>" name="prenom" type="text" class="validate"></input>
        </div>
        <div class="input-field col s6">
          <p>Nom :</p>
          <input value="<?php echo $userNom; ?>" name="nom" type="text" class="validate"></input>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <p>Email :</p>
          <input value="<?php echo $userEmail; ?>" name="email" type="text" class="validate"></input>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <p>Mot de passe :</p>
          <input placeholder="Mot de passe" name="password" type="password" class="validate"></input>
        </div>
        <div class="input-field col s6">
          <p>Confirmation du mot de passe :</p>
          <input placeholder="Confirmation du mot de passe" name="password2" type="password" class="validate"></input>
        </div>
      </div>
      <br>
      <div id="submit-form">
        <button class="btn waves-effect waves-light amber black-text" type="submit" name="send">Editer<i class="material-icons right">settings</i></button>
      </div>
    </form>
  </div>
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
