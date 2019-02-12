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

// Page de création de compte 
        <div class="accountCreationPage">
// Formulaire de création de compte 
            <form action="" method="post">
                <div>
                    <label for="lastName">Nom :</label>
                    <input type="text" id="lastName" name="user_lastName" value="" placeholder="Votre Nom">
                </div>
                <div>
                    <label for="firstName">Prénom :</label>
                    <input type="text" id="firstName" name="user_firstName" value="" placeholder="Votre Prénom">
                </div>
                <div>
                    <label for="mail">e-mail :</label>
                    <input type="email" id="mail" name="user_mail" value="" placeholder="Votre e-mail">
                </div>
                <div>
                    <label for="pass">Mot de passe (8 caractères minimum):</label>
                    <input type="password" id="pass" name="password" minlength="8" maxlength="20" value="" required placeholder="Votre mot de passe">
                </div>
                <div class="button">
                    <button type="submit">Envoyer</button>
                </div>
            </form>
        </div>
    </body>
    <script src=''></script>
</html>
-->
//////////////////////////////////////////////////////////
<?php
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Je m\'inscris') {
	// on vérifie l'existence des variables et si elles ne sont pas vides
    if ((isset($_POST['lastName']) && !empty($_POST['lastName']))&&
        (isset($_POST['firstName']) && !empty($_POST['firstName']))&&
        (isset($_POST['email']) && !empty($_POST['email'])) && 
        (isset($_POST['pass']) && !empty($_POST['pass'])) && 
        (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))) {
	// on vérifie la cohérence des 2 mots de passe
	if ($_POST['pass'] != $_POST['pass_confirm']) {
		$erreur = 'Les 2 mots de passe sont différents.';
	}
	else {
		$base = mysqli_connect ('localhost:8000', 'email', 'password');
		mysqli_select_db ('blocnotedatabase', $base);

		// on vérifie que ce login n'est pas déjà utilisé par quelqu'un d'autre
		$sql = 'SELECT count(*) FROM member WHERE email="'.mysqli_escape_string($_POST['email']).'"';
		$req = mysqli_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
		$data = mysqli_fetch_array($req);

		if ($data[0] == 0) {
        $sql = 'INSERT INTO member VALUES("", "'.mysqli_escape_string($_POST['lastName']).'",
                                            "'.mysqli_escape_string($_POST['firstName']).'",
                                            "'.mysqli_escape_string($_POST['email']).'",
                                            "'.mysqli_escape_string(md5($_POST['pass'])).'")';
		mysqli_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysqli_error());

		session_start();
		$_SESSION['email'] = $_POST['email'];
		header('Location: index.php');
		exit();
		}
		else {
		$erreur = 'Un membre possède déjà ce login.';
		}
	}
	}
	else {
	$erreur = 'Au moins un des champs est vide.';
	}
}
?>
<html>
<head>
<title>Inscription YAN</title>
</head>

<body>
Inscription à l'espace membre de YAN :<br />
<form action="signup.php" method="post">
Nom: <input type="text" name="lastName" value="<?php if (isset($_POST['lastName'])) echo htmlentities(trim($_POST['lastName'])); ?>" placeholder="Votre Nom"><br />
Prénom: <input type="text" name="firstName" value="<?php if (isset($_POST['firstName'])) echo htmlentities(trim($_POST['firstName'])); ?>" placeholder="Votre Prénom"><br />
E-mail : <input type="text" name="email" value="<?php if (isset($_POST['email'])) echo htmlentities(trim($_POST['email'])); ?>" placeholder="Votre Email"><br />
Mot de passe : <input type="password" name="pass" minlength="8" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"  placeholder="Votre mot de passe"><br />
Confirmation du mot de passe : <input type="password" name="pass_confirm" value="<?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>" placeholder="Confirmation du mot de passe"><br />
<input type="submit" name="inscription" value="Je m'inscris">
</form>
<?php
if (isset($erreur)) echo '<br />',$erreur;
?>
</body>
</html>