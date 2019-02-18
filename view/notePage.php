<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/blocnote.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<?php
require_once "../class/noteManager.php";

session_start();
// On vérifie que les champs sont tous remplies au moment d'appuyer sur le bouton 'Enregistrer' 
if (isset($_POST['save']) && $_POST['save'] == 'Enregistrer') {
    if ((isset($_POST['title']) && !empty($_POST['title'])) &&
        (isset($_POST['description']) && !empty($_POST['description'])) && 
        (isset($_POST['content']) && !empty($_POST['content']))) {
		$check = new noteManager();
        $check->saveNote();
    }
    else{
        $erreur = "Au moins un des champs est vide.";
    }
}

/*if(isset($_POST['cancel']) && $_POST['cancel'] == 'cancel'){
    header('Location:"noteListe.php"');
}*/

if (isset($erreur)) echo '<br />',$erreur;
?>
<html>
    <head>
        <title>Yet Another NotePad</title>
    </head>
    <body>
<!-- Page principale d'accès aux note -->
                <form class="form-note" action="notePage.php" method="post">
                <h1>Yet Another NotePad</h1>
                    <label for="noteTitle">Titre :</label>
                    <input class="noteData" type="text" id="noteTitle" name="title" value="<?php if (isset($_POST['title'])) echo htmlentities(trim($_POST['title'])); ?>" placeholder="Titre de la note">
              
                
                    <label for="noteDescription">Description :</label>
                    <input class="noteData" id="text" id="noteDescription" name="description" value="<?php if (isset($_POST['description'])) echo htmlentities(trim($_POST['description'])); ?>" placeholder="Description de la note (20 caractères maximum)" maxlength="20">
               
                <div>
                        <textarea class="noteContent" id="noteContent" name="content" value="<?php if (isset($_POST['content'])) echo htmlentities(trim($_POST['content'])); ?>" placeholder="Ecrivez votre note ici"></textarea>
                </div>
                <div>
                    <input class="button" type="submit" name="save" value="Enregistrer">
                    <a href ="noteListe.php"> <button class="button" type="button" value="cancel">Annuler</button></a>
                </div>
            </form>
    </body>
    <script src=''></script>
</html>

