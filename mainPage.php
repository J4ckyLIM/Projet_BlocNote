<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" href="blocnote.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<html>
    <head>
        <title>Yet Another Notepad</title>
    </head>
    <body>
        <h1>Yet Another NotePad</h1>

<!-- Page principale d'accès aux note -->
        <div class="mainPage">
            <form action="" method="post">
                <div>
                    <label for="noteTitle">Titre :</label>
                    <input type="text" id="noteTitle" name="user_noteTitle" placeholder="Titre de la note">
                </div>
                <div>
                    <label for="noteDescription">Description :</label>
                    <input id="text" id="noteDescription" name="user_noteDescription" placeholder="Description de la note (20 caractères maximum)" maxlength="20">
                </div>
<!-- Barre d'outil tel que la fonction gras/italic/souligner...-->
                <div class="toolbar" role="Barre d'outil">
                <a id="grasButton" class="toolButton" href="javascript:void('Gras')" title="Gras" role="button"><i class="fas fa-bold"></i></a>
                <a id="italicButton" class="toolButton" href="javascript:void('Italique')" title="Italique" role="button"><i class="fas fa-italic"></i></a>
                <a id="underlineButton" class="toolButton" href="javascript:void('Souligné')" title="Souligné" role="button"><i class="fas fa-underline"></i></a>
                <a id="strikeButton" class="toolButton" href="javascript:void('Barré')" title="Barré" role="button"><i class="fas fa-strikethrough"></i></a>
                <a id="olListButton" class="toolButton" href="javascript:void('Insérer/Supprimer la liste numérotée')" title="Liste numérotée" role="button"><i class="fas fa-list-ul"></i></a>
                <a id="olListButton" class="toolButton" href="javascript:void('Insérer/Supprimer la liste numérotée')" title="Liste numérotée" role="button"><i class="fas fa-list-ol"></i></a>
                </div>  
                <div>
                        <textarea id="noteContent" name="user_noteContent"></textarea>
                    </div>
                <div class="button">
                    <button type="submit">Enregistrer</button>
                    <button type="button">Annuler</button>
                </div>
            </form>
        </div>
    </body>
    <script src=''></script>
</html>