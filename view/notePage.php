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

if (isset($erreur)) echo $erreur;
?>
<html>
    <head>
        <title>Yet Another Notepad</title>
    </head>
    <body class="noteBody">
        <div id="note-container">
            <header class="title-field">
                <i class="fas fa-edit logo-note"></i>
                <h1 class="note-page-title">Yet Another Notepad</h1>
            </header>
<!-- Page principale d'accès aux note -->
            <div class="form-bloc">
                <form class="form-note" action="notePage.php" method="post">
                    
                    <input class="noteData" type="text" id="noteTitle" name="title" value="<?php if (isset($_POST['title'])) echo htmlentities(trim($_POST['title'])); ?>" placeholder="Note Title">
                    <input class="noteData" id="text" id="noteDescription" name="description" value="<?php if (isset($_POST['description'])) echo htmlentities(trim($_POST['description'])); ?>" placeholder="Description (20 characters allowed)" maxlength="20">
                    <textarea class="noteContent" id="noteContent" name="content" value="<?php if (isset($_POST['content'])) echo htmlentities(trim($_POST['content'])); ?>" placeholder="Note Content"></textarea>
                <div class="btn-note-submit">
                    <input class="btn-note-action" type="submit" name="save" value="Enregistrer">
                    <a href ="noteListe.php"> <button class="btn-note-action" type="button" value="cancel">Annuler</button></a>
                </div>
                </form>
            </div>
        </div>
    </body>
    <script src=''></script>
</html>

