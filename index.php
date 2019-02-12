<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" href="blocnote.css">
<!--
<html>
    <head>
        <title>Yet Another Notepad</title>
    </head>
    <body>
        <h1>Yet Another NotePad</h1>
 //// Page d'accueil à l'entrée du site 
        <div class="homePage">
            <section class="head">
                <h2>Présentation:</h2>
                <p>Yet Another Notepad, une application permettant de créer, consulter, gérer ses notes.</p>
            </section>
            <section class="access">
                <a href="" class="btn">Connexion</a>
                <a href="signup.php" class="btn">Inscription</a>
            <section>
        </div>

//// formulaire de connexion quand on appuis sur le bouton connexion 
        <div class="login-content">
            <div class="login-header">
                <button type="button" class="close" data-dismiss="login">×</button>
                <h4 class="login-title">Connexion</h2>
            </div>
            <form class="form" id="l_form" method="post" action="">
				<div class="login-body">
					<span class="input-container">
						<input type="email" id="l_m" name="email" placeholder="Adresse email">
						<span class="subline"></span>
					</span>
									
					<span class="input-container">
						<input type="password" id="l_p" name="password" placeholder="Mot de passe">
						<span class="subline"></span>
					</span>
                </div>

                <div>
					<input id="l_r" type="checkbox"><label for="s_gcu">Se souvenir de moi ?</label>
                </div>
					<span id="p-lost">Mot de passe oublié ?</span>
				<div class="login-footer">
					<button type="submit" class="btn btn-success btn-outline"><span class="glyphicon glyphicon-ok"></span>Valider</button>
					<button type="button" class="btn btn-danger btn-outline" data-dismiss="login"><span class="glyphicon glyphicon-remove"></span>Fermer</button>
				</div>
			</form>
        </div>
</html> -->


<?php
// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {

	$base = mysql_connect ('serveur', 'email', 'password');
	mysql_select_db ('blocnotedatabase', $base);

	// on teste si une entrée de la base contient ce couple login / pass
	$sql = 'SELECT count(*) FROM membre WHERE email="'.mysql_escape_string($_POST['email']).'" AND pass_md5="'.mysql_escape_string(md5($_POST['pass'])).'"';
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	$data = mysql_fetch_array($req);

	mysql_free_result($req);
	mysql_close();

	// si on a une réponse, alors l'utilisateur est un membre et on le redirige vers la page des notes
	if ($data[0] == 1) {
		session_start();
		$_SESSION['email'] = $_POST['email'];
		header('Location: YANnote.php');
		exit();
	}
	// si rien ne concorde, le visiteur s'est trompé dans son login ou dans son mot de passe
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
<html>
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
<a href="signup.php">Vous inscrire</a>
<?php
if (isset($erreur)) echo '<br /><br />',$erreur;
?>
</body>
</html>
