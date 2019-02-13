<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" href="blocnote.css">

<?php
require "connectBDD.php";
// on teste si le visiteur a soumis le formulaire
$bdd = connexion_bdd();

if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {

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
		// on vérifie que ce login n'est pas déjà utilisé par quelqu'un d'autre
		//$sql = 'SELECT * FROM member WHERE email="'.mysqli_escape_string($_POST['email']).'"';
		//$req = mysqli_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
        //$data = mysqli_fetch_array($req);
        
        $lastName = htmlspecialchars($_POST['lastName']);
		$firstName = htmlspecialchars($_POST['firstName']);
		$email = htmlspecialchars($_POST['email']);
		$pass = htmlspecialchars($_POST['pass']);

		if ($data[0] == 0) {
        
		$req = $bdd->prepare("INSERT INTO member(lastName,firstName,email,pass_md5) 
					            VALUES(:lastName,:firstName,:email,:pass);");
		$req->execute(array("lastName" => $lastName, 
                            "firstName" => $firstName, 
                            "email" => $email, 
                            "pass_md5" => $pass));
        $req->closeCursor();

        echo "<div class='alert alert-success'>Le compte a été crée.</div>";

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
E-mail : <input type="email" name="email" value="<?php if (isset($_POST['email'])) echo htmlentities(trim($_POST['email'])); ?>" placeholder="Votre Email"><br />
Mot de passe : <input type="password" name="pass" minlength="8" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"  placeholder="Votre mot de passe"><br />
Confirmation du mot de passe : <input type="password" name="pass_confirm" value="<?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>" placeholder="Confirmation du mot de passe"><br />
<input type="submit" name="inscription" value="Inscription">
</form>
<?php
if (isset($erreur)) echo '<br />',$erreur;
?>
</body>
</html>