<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">

<?php
require_once "../class/database.php";
require_once "../class/noteManager.php";
?>

<div class="container">

<a href="notePage.php" > Créer une nouvelle note </a>
    <?php
        $list = new noteManager();
        $list->listAllNote()
    ?>
</div>

</html>
