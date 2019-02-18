<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/blocnote.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

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

        // On vérifie que l'email servant de login n'est pas déjà attribué/utilisé grâce à la fonction checkUniq()
        else{
            $mm = new memberManager();
            $mm->checkUniq();
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
    <form  class="form-signup" action="register.php" method="post">
        <h1>Yet Another NotePad</h1>
        <i class="fas fa-edit logo"></i>
        <h2>Inscription YAN </h2>
            <input class="logs" type="text" name="lastName" value="<?php if (isset($_POST['lastName'])) echo htmlentities(trim($_POST['lastName'])); ?>" placeholder="Votre Nom"><br />
            <input class="logs" type="text" name="firstName" value="<?php if (isset($_POST['firstName'])) echo htmlentities(trim($_POST['firstName'])); ?>" placeholder="Votre Prénom"><br />
            <input class="logs" type="email" name="email" value="<?php if (isset($_POST['email'])) echo htmlentities(trim($_POST['email'])); ?>" placeholder="Votre Email"><br />
            <input class="logs" type="password" name="pass" minlength="8" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"  placeholder="Votre mot de passe"><br />
            <input class="logs" type="password" name="pass_confirm" value="<?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>" placeholder="Confirmation du mot de passe"><br />
            <input class="button" type="submit" name="inscription" value="Inscription">
    </form>
<?php
if (isset($erreur)) echo '<br />',$erreur;
?>
</body>
</html>

