
<body class="noteBody">
    <div id="note-container">
        <header class="title-field">
            <i class="fas fa-edit logo-note"></i>
            <h1 class="note-page-title">Yet Another Notepad</h1>
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
