<?php
require "../class/database.php";
require "../class/noteManager.php";

?>

<div class="container">
    <?php
        $list = new noteManager();
        $list->listAllNote()
    ?>
</div>
