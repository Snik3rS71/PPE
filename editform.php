<?php
$idForm = $_GET['id'];
$bdd = new PDO('mysql:host=localhost;dbname=ppe', 'ppe', 'root');
$dataForms = $bdd->prepare('SELECT * FROM formations');
$dataForms->execute();

while ($dataForm = $dataForms->fetch()) {
  $formName = $dataForm['name'];
  $formDesc = $dataForm['descr'];
  $formImg = $dataForm['img'];
  $formUrl = $dataForm['url'];
  $formSlots = $dataForm['slots'];
}

function editForm() {
  $idForm = $_GET['id'];
  $bdd = new PDO('mysql:host=localhost;dbname=ppe', 'ppe', 'root');
  $editName = $bdd->prepare("UPDATE formations SET name = '" . $_POST['name'] . "', slots = '" . $_POST['slots'] . "', descr = '" . $_POST['descr'] . "', url = '" . $_POST['url'] . "', img = '" . $_POST['img'] . "' WHERE idform= " . $idForm . "");
  $editName->execute();
  header('Location: gestform.php');
}

if (isset($_POST['send'])) {
  editForm();
}

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
  <h5>Edition de la formation n°<?php echo $idForm; ?></h5>
  <br>
  <div class="divider"></div>
  <br>

  <div class="row">
    <form method="post" action="editform.php?id=<?php echo $idForm; ?>" class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <p>Nom de la formation :</p>
          <input value="<?php echo $formName; ?>" name="name" type="text" class="validate"></input>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <p>Places :</p>
            <input value="<?php echo $formSlots; ?>" name="slots" type="text" class="validate"></input>
          </div>
        </div>
        <div class="input-field col s12">
          <p>Description de la formation :</p>
          <input value="<?php echo $formDesc; ?>" name="descr" type="text" class="validate"></input>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <p>Lien de l'image :</p>
          <input value="<?php echo $formImg; ?>" name="img" type="text" class="validate"></input>
        </div>
        <div class="input-field col s6">
          <p>Lien du PDF de la formation :</p>
          <input value="<?php echo $formUrl; ?>" name="url" type="text" class="validate"></input>
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
