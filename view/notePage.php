<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" href="blocnote.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<?php
require_once "../class/noteManager.php";

if (isset($_POST['save']) && $_POST['save'] == 'save') {
	if ((isset($_POST['title']) && !empty($_POST['title'])) && (isset($_POST['description']) && !empty($_POST['description'])) && (isset($_POST['content']) && !empty($_POST['content']))) {
		$check = new noteManager();
		$check->saveNote(); 
	}
}
?>
<html>
    <head>
        <title>Yet Another NotePad</title>
    </head>
    <body>
        <h1>Yet Another NotePad</h1>

<!-- Page principale d'accès aux note -->
        <div class="mainPage">
            <form action="notePage.php" method="post">
                <div>
                    <label for="noteTitle">Titre :</label>
                    <input type="text" id="noteTitle" name="title" value="<?php if (isset($_POST['title'])) echo htmlentities(trim($_POST['title'])); ?>" placeholder="Titre de la note">
                </div>
                <div>
                    <label for="noteDescription">Description :</label>
                    <input id="text" id="noteDescription" name="description" value="<?php if (isset($_POST['description'])) echo htmlentities(trim($_POST['description'])); ?>" placeholder="Description de la note (20 caractères maximum)" maxlength="20">
                </div>
<!-- Barre d'outil tel que la fonction gras/italic/souligner...-->
               <!-- <div class="toolbar" role="Barre d'outil">
                <a id="grasButton" class="toolButton" href="javascript:void('Gras')" title="Gras" role="button"><i class="fas fa-bold"></i></a>
                <a id="italicButton" class="toolButton" href="javascript:void('Italique')" title="Italique" role="button"><i class="fas fa-italic"></i></a>
                <a id="underlineButton" class="toolButton" href="javascript:void('Souligné')" title="Souligné" role="button"><i class="fas fa-underline"></i></a>
                <a id="strikeButton" class="toolButton" href="javascript:void('Barré')" title="Barré" role="button"><i class="fas fa-strikethrough"></i></a>
                <a id="olListButton" class="toolButton" href="javascript:void('Insérer/Supprimer la liste numérotée')" title="Liste numérotée" role="button"><i class="fas fa-list-ul"></i></a>
                <a id="olListButton" class="toolButton" href="javascript:void('Insérer/Supprimer la liste numérotée')" title="Liste numérotée" role="button"><i class="fas fa-list-ol"></i></a>
                </div>  -->
                <div>
                        <textarea id="noteContent" name="content" value="<?php if (isset($_POST['content'])) echo htmlentities(trim($_POST['content'])); ?>"></textarea>
                    </div>
                <div class="button">
                    <button type="submit" name="save" value="save">Enregistrer</button>
                    <button type="button">Annuler</button>
                </div>
            </form>
        </div>
    </body>
    <script src=''></script>
</html>

