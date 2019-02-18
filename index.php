<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/blocnote.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<?php

require_once "class/memberManager.php";
require_once "class/database.php";


// On vérifie que l'utilisateur a entré ses identifiants 
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {
		$check = new memberManager();
		$check->findMember(); 
	}
}

// Si les identifiants sont corrects, l'utilisateur est connecté puis renvoyé sur la page listant ses notes

?>
<head>
<title>Accueil YAN</title>
</head>

<body>	
	<form class="form-signin" action="index.php" method="post">
	<h1>Yet Another NotePad</h1>
		<i class="fas fa-edit logo"></i>
		<h2>Connectez-vous</h2>
			<input class="logs" type="text" name="email" value="<?php if (isset($_POST['email'])) echo htmlentities(trim($_POST['email'])); ?>" placeholder="Votre Email"><br />
			<input class="logs" type="password" name="pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>" placeholder="Mot de passe"><br />
			<input class="button" type="submit" name="connexion" value="Connexion">
			<button class="button" href="register.php">S'inscrire</button>
	</form>
			
			<?php
			if (isset($erreur)) echo '<br /><br />',$erreur;
			?>
</body>
</html>
