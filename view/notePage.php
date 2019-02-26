<?php
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

?>
<html>
    <head>
        <title>Yet Another Notepad</title>
    </head>
    <body class="noteBody">
        <div id="note-container">
            <header class="title-field2">
                <div class="title-logo">
                    <i class="fas fa-edit logo-note"></i>
                    <h1 class="note-page-title">Yet Another Notepad</h1>
                </div>
                <div class="dc-container">  
                    <form class="form-signin" action="index.php?page=noteListe" method="post">
                        <input class="btn-action2" type="submit" name="disconnect" value="Déconnexion">
                    </form>
                </div>
            </header>
<!-- Page principale d'accès aux note -->
            <div class="form-bloc">
                <form class="form-note" action="index.php?page=notePage" method="post">
                    
                    <input class="noteData" type="text" id="noteTitle" name="title" value="<?php if (isset($_POST['title'])) echo htmlentities(trim($_POST['title'])); ?>" placeholder="Note Title">
                    <input class="noteData" id="text" id="noteDescription" name="description" value="<?php if (isset($_POST['description'])) echo htmlentities(trim($_POST['description'])); ?>" placeholder="Description (20 characters allowed)" maxlength="20">
                    <textarea class="noteContent" id="noteContent" name="content" value="<?php if (isset($_POST['content'])) echo htmlentities(trim($_POST['content'])); ?>" placeholder="Note Content"></textarea>
                <div class="btn-note-submit">
                    <input class="btn-action" type="submit" name="save" value="Enregistrer">
                    <a href ="index.php?page=noteListe"> <button class="btn-action2" type="button" value="cancel">Annuler</button></a>
                </div>
                </form>
            </div>
            <script type="text/javascript">
            <?php
            if (isset($erreur)) echo "alert('$erreur');";
            ?>
            </script>
        </div>

