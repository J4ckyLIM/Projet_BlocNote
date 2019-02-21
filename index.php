<?php

require_once "class/memberManager.php";
require_once "class/database.php";
require_once "class/noteManager.php";


// On vérifie que l'utilisateur a entré ses identifiants 
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {
		$check = new memberManager();
		$check->findMember(); 
	}
}

// Si les identifiants sont corrects, l'utilisateur est connecté puis renvoyé sur la page listant ses notes
// On appele le template contenant le header
require_once "template/header.php";
if(isset($_GET['page'])){
	// CONDITION DINEXISTANCE A FAIRE POUR LES FICHIERS
	file_exists('view');
	include "view/". $_GET['page'].'.php';
}else{
	//if()
	//si le membre est connecté --> inclure directement la page

	// Sinon
	include "view/home.php";
}
// On appele le template contenant le footer
require_once "template/footer.php";
?>