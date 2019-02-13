<?php
// On vérifie si le membre est connecté, si ce n'est pas le cas il est redirigé sur index.php
session_start();
if (!isset($_SESSION['email'])) {
	header ('Location: index.php');
	exit();
}
?>

<html>
<head>
<title>Espace membre YAN</title>
</head>

<body>
Bienvenue <?php echo htmlentities(trim($_SESSION['login'])); ?> !<br />

<!-- Bouton de déconnexion-->
<a href="deconnexion.php">Déconnexion</a>
</body>
</html>