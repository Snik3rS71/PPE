<?php
$id = $_GET['id'];
$bdd = new PDO('mysql:host=localhost;dbname=ppe', 'ppe', 'root');
$deleteForm = $bdd->prepare('DELETE FROM formations WHERE idform="' . $id . '"');
$deleteForm->execute();
header('Location: ../gestform.php');
?>
