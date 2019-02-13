<?php
// on déconnecte l'utilisateur et on le renvoie sur index.php
session_start();
session_unset();
session_destroy();
header('Location: index.php');
exit();
?>