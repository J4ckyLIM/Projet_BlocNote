<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" href="blocnote.css">

<?php
//require "connectBDD.php";
require_once "../class/database.php";
require_once "../class/memberManager.php";

// On regarde si l'utilisateur a remplie le formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
    // on vérifie l'existence des variables et si elles ne sont pas vides
    if ((isset($_POST['lastName']) && !empty($_POST['lastName']))&&
        (isset($_POST['firstName']) && !empty($_POST['firstName']))&&
        (isset($_POST['email']) && !empty($_POST['email'])) && 
        (isset($_POST['pass']) && !empty($_POST['pass'])) && 
        (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))) {
        
        // On vérifie la concordance des 2 mots de passe
        if ($_POST['pass'] != $_POST['pass_confirm']) {
            $erreur = 'Les 2 mots de passe sont différents.';
        }

        // On vérifie que l'email servant de login n'est pas déjà attribué/utilisé
        else{
            $bdd = new database();
            $mm = new memberManager();
            $bdd->connexion();
            $query = $bdd->getBdd()->prepare($bdd->isUniqMember());
            $query->execute(array('email' => $_POST['email']));
            $test = $query->fetch();
            if($test['count_email'] == 0){ 
                $mm->insertMember();
                echo "<div class='alert alert-success'>Le compte a été crée.</div>";

        // une fois le compte créer, l'utilisateur est redirigé sur la page principale
                session_start();
                $_SESSION['email'] = $_POST['email'];
                ('Location: index.php');
                exit();
            }   
            else{
                $erreur = 'Un membre possède déjà ce login.';
            }
        } 
    }
    else{
            $erreur = "Au moins un des champs est vide.";
    }
}

?>

<html>
<head>
<title>Inscription YAN</title>
</head>

<body>
Inscription à l'espace membre de YAN :<br />
<form action="register.php" method="post">
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

