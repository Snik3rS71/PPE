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

        <h2 id="title-form">Formations</h2>
        <h5>Liste des formations en cours</h5>
        <br>
        <div class="divider"></div>
        <br>


        <table class="centered striped">
            <thead>
              <tr>
                  <th data-field="idform">Id</th>
                  <th data-field="name">Nom</th>
                  <th data-field="subscribers">Inscrits</th>
                  <th data-field="slots">Places</th>
                  <th data-field="url">URL</th>
                  <th data-field="edit">Editer</th>
                  <th data-field="delete">Supprimer</th>
              </tr>
            </thead>

            <tbody>
                <?php
                    $bdd = new PDO('mysql:host=localhost;dbname=ppe', 'ppe', 'root');

                    $getForms = $bdd->prepare('SELECT * FROM formations');
                    $getForms->execute();

                    while($forms = $getForms->fetch()) {
                        echo "<tr>";
                        echo "<td>" . $forms['idform'] . "</td><td>" . $forms['name'] . "</td><td>" . $forms['subscribers'] . "</td><td>" . $forms['slots'] . "</td><td><a target=\"_blank\" href=\"" . $forms['url'] . "\">" . $forms['url'] . "</td>";
                        echo '<td><center><a class="btn-floating waves-effect waves-light blue" href="editform.php?id=' . $forms['idform'] . '"><i class="material-icons">settings</i></a></center></td>';
                        echo '<td><a class="btn-floating waves-effect waves-light red" href="callback/delform.php?id=' . $forms['idform'] . '"><i class="material-icons">delete</i></a></td>';
                        echo "</tr>";
                    }
                ?>
            </tbody>
          </table>

          <br>
          <div class="divider"></div>
          <br>
          <h5>Création d'une formation</h5>
          <br>
          <div class="divider"></div>
          <br>

            <div class="row">
              <form method="post" action="callback/addform.php" class="col s12">
                <div class="row">
                  <div class="input-field col s6">
                    <p>Nom de la formation :</p>
                    <input placeholder="Nom de la formation" name="name" type="text" class="validate"></input>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                      <p>Places :</p>
                      <input placeholder="Places" name="slots" type="text" class="validate"></input>
                    </div>
                  </div>
                  <div class="input-field col s12">
                    <p>Description de la formation :</p>
                    <textarea id="textarea1" name="descr" class="materialize-textarea"></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s6">
                    <p>Lien de l'image :</p>
                    <input placeholder="Lien de l'image" name="img" type="text" class="validate"></input>
                  </div>
                  <div class="input-field col s6">
                    <p>Lien du PDF de la formation :</p>
                    <input placeholder="Lien du PDF de la formation" name="url" type="text" class="validate"></input>
                  </div>
                </div>
                <br>
                <div id="submit-form">
                  <button class="btn waves-effect waves-light amber black-text" type="submit" name="send">Ajouter<i class="material-icons right">send</i></button>
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
