<?php
    if (isset($_POST['disconnect']) && $_POST['disconnect'] == 'Déconnexion') {
        $check = new memberManager();
        $check->dcMember();  
    }
?>
<body class="noteBody">
    <div id="note-container">
        <header class="title-field">
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
        <div class="liste-container">
            <div class="btn-newNote">
                <a href="index.php?page=notePage" ><button class="btn-action" type="button" value="newNote">Nouvelle note</button></a>
            </div>
            <?php
                $list = new noteManager();
                $list->listAllNote()
            ?>
        </div>
    </div>
