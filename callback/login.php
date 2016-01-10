<?php
// On teste si le visiteur a soumis le formulaire de connexion
if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['password']) && !empty($_POST['password']))) {

	$login = $_POST['login'];
  // Cryptage du mot de passe.
	$cryptedPassword = sha1($_POST['password']);

	try {
		// On se connecte à la database
    $bdd = new PDO('mysql:host=localhost;dbname=ppe', 'ppe', 'root');
		// On teste si une entrée de la base contient ce couple login / pass
		$sql = $bdd->prepare('SELECT count(*) FROM users WHERE login="'.$login.'" AND password="'.$cryptedPassword.'"');
		$sql1 = $bdd->prepare('SELECT * FROM users WHERE login="'.$login.'"');
		// On éxécute la requête.
		$sql->execute();
		$sql1->execute();
		$data = $sql->fetch(PDO::FETCH_BOTH);
		$dataUsers = $sql1->fetchAll();
	}
	// En cas d'erreur 'try' capture l'erreur et empêche MySQL d'afficher le mot de passe.
	catch (PDOException $e) {
			echo 'Erreur : ' . $e -> getMessage();
	}

	// Si on obtient une réponse, alors l'utilisateur est un membre
	if ($data[0] == 1) {
		session_start();
		$_SESSION['login'] = $login;
		$_SESSION['password'] = $cryptedPassword;
		foreach ($dataUsers as $dataUser) {
    		$_SESSION['admin'] = $dataUser['admin'];
				$_SESSION['id'] = $dataUser['id'];
 		}
		header('Location: ../index.php');
		exit();
	}
	// Si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
	elseif ($data[0] == 0) {
		echo 'Compte non reconnu.';
	}
  // Sinon, alors la, il y a un gros problème :)
	else {
		echo 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
	}
} else {
	echo 'Au moins un des champs est vide.';
}
?>
