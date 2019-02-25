<?php

require_once "../class/memberManager.php";
require_once "../class/database.php";
require_once "../class/noteManager.php";

session_start();

/* On regarde si l'utilisateur a appuyer sur le bouton supprimer */ 
if (isset($_POST['note_delete']) && $_POST['note_delete'] == 'Supprimer') {
	$check = new noteManager();
    $check->deleteNote();  
}
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/style.css">
<link href="https://fonts.googleapis.com/css?family=Carter+One" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<body class="noteBody">
    <div id="note-container">
    <header class="title-field">
        <i class="fas fa-edit logo-note"></i>
        <h1 class="note-page-title">Yet Another Notepad</h1>
    </header>
        <div class="form-bloc">
        <?php
        $listToEdit = new noteManager();
        $listToEdit->selectNoteToDelete();
        ?>
        </div>
    </div>
</body>
    <footer>
		<a title="GitHub" href="https://github.com/J4ckyLIM"><i class="fab fa-github info-logo-index"></i></a>
		<a title="LinkedIn" href="https://www.linkedin.com/in/jacky-lim123/"><i class="fab fa-linkedin info-logo-index"></i></a>
	</footer>			
</body>
</html> 