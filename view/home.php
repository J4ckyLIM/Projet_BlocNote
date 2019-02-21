<html>
<head>
<title>YAN</title>
</head>

<body class="noteBody">	
	<form class="form-signin" action="index.php" method="post">
	<h1 class="main-page-title">Yet Another NotePad</h1>
		<i class="fas fa-edit logo-index"></i>
		<h2>Connectez-vous</h2>
			<input class="logs" type="text" name="email" value="<?php if (isset($_POST['email'])) echo htmlentities(trim($_POST['email'])); ?>" placeholder="Votre Email"><br />
			<input class="logs" type="password" name="pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>" placeholder="Mot de passe"><br />
			<div class="button">
				<input class="button-signin" type="submit" name="connexion" value="Connexion">
				<button class="button-signup"><a href="index.php?page=register">S'inscrire</a></button>
			</div>
	</form>