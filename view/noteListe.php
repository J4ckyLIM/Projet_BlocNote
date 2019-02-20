<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/style.css">
<link href="https://fonts.googleapis.com/css?family=Carter+One" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<?php
require_once "../class/database.php";
require_once "../class/noteManager.php";
?>
<html>
<body class="noteBody">
    <div id="note-container">
        <header class="title-field">
            <i class="fas fa-edit logo-note"></i>
            <h1 class="note-page-title">Yet Another Notepad</h1>
        </header>
        <div class="liste-container">
            <div class="btn-newNote">
                <a href="notePage.php" ><button class="btn-action" type="button" value="newNote">Nouvelle note</button></a>
            </div>
            <?php
                $list = new noteManager();
                $list->listAllNote()
            ?>
        </div>
    </div>
    <footer>
		<a title="GitHub" href="https://github.com/J4ckyLIM"><i class="fab fa-github info-logo"></i></a>
		<a title="LinkedIn" href="https://www.linkedin.com/in/jacky-lim123/"><i class="fab fa-linkedin info-logo"></i></a>
	</footer>
</body>

</html>
