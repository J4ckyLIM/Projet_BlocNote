<?php
session_destroy();

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
        // Par la même occasion, il sera connecté si il est bien unique
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
<body class="noteBody">
    <div id="note-container">
        <header class="title-field">
            <i class="fas fa-edit logo-note"></i>
            <h1 class="note-page-title">Yet Another Notepad</h1>
        </header>
        <form  class="form-signup" action="index.php?page=register" method="post">
            <h2>Inscription</h2>
            <input class="userData" type="text" name="lastName" value="<?php if (isset($_POST['lastName'])) echo htmlentities(trim($_POST['lastName'])); ?>" placeholder="Votre Nom"><br />
            <input class="userData" type="text" name="firstName" value="<?php if (isset($_POST['firstName'])) echo htmlentities(trim($_POST['firstName'])); ?>" placeholder="Votre Prénom"><br />
            <input class="userData" type="email" name="email" value="<?php if (isset($_POST['email'])) echo htmlentities(trim($_POST['email'])); ?>" placeholder="Votre Email"><br />
            <input class="userData" type="password" name="pass" minlength="8" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"  placeholder="Votre mot de passe"><br />
            <input class="userData" type="password" name="pass_confirm" value="<?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>" placeholder="Confirmation du mot de passe"><br />
            <input class="btn-action" type="submit" name="inscription" value="Inscription">
        </form>
    </div>

<?php
if (isset($erreur)) echo '<div class="error">'.$erreur.'</div>';
?>

