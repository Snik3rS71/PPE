<?php
$id = $_GET['id'];
$bdd = new PDO('mysql:host=localhost;dbname=ppe', 'ppe', 'root');
$deleteUser = $bdd->prepare('DELETE FROM users WHERE id="' . $id . '"');
$deleteUser->execute();
header('Location: ../gestinsc.php');
?>
