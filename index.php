<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" href="blocnote.css">
<?php

// on teste si le visiteur a soumis le formulaire de connexion

if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {

	$bdd = connexion_bdd();

	$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);


	// on regarde si email et pass concorde avec une coupe dans la bdd
	$req = $bdd->prepare('SELECT id, pass FROM member WHERE email = :email');
	$req->execute(array('email' => $email));
	$resultat = $req->fetch();

	// si c'est le cas, alors l'utilisateur est un membre et on le redirige vers la page des notes
	if ($data[0] == 1) {
		session_start();
		$_SESSION['email'] = $_POST['email'];
		header('Location: YANnote.php');
		exit();
	}
	// si rien ne concorde, le mdr ou l'email ne correspond pas
	elseif ($data[0] == 0) {
		$erreur = 'Le compte n\'est pas reconnu';
	}
	// cas rare/exceptionnel du membre au identifiants identiques à d'autre
	else {
		$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
	}
	}
	else {
	$erreur = 'Au moins un des champs est vide.';
	}
}
?>
<head>
<title>Accueil YAN</title>
</head>

<body>
Connexion à l'espace membre :<br />
<form action="index.php" method="post">
Email : <input type="text" name="email" value="<?php if (isset($_POST['email'])) echo htmlentities(trim($_POST['email'])); ?>"><br />
Mot de passe : <input type="password" name="pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"><br />
<input type="submit" name="connexion" value="Connexion">
</form>
<a href="view/register.php">Vous inscrire</a>
<?php
if (isset($erreur)) echo '<br /><br />',$erreur;
?>
</body>
</html>
