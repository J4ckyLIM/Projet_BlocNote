<?php
require_once "database.php";

class memberManager
{
    function selectAllMember()
    {
        return 'SELECT * FROM member';
    }

    function selectMemberId()
    {
        return 'SELECT * FROM member WHERE id= :id';
    }

    function updateMemberId()
    {
        return 'UPDATE member SET lastName= :lastName, firstName= :firstName, email= :email WHERE id= :id';
    }

    function deleteMemberId()
    {
        return 'DELETE FROM member WHERE id= :id';
    }

    function insertMember()
    {
	$bdd = new database();
	$bdd->connexion();
	$query = $bdd->getBdd()->prepare($bdd->addMember());
	$array = array(
		'lastName' => $_POST['lastName'],
		'firstName' => $_POST['firstName'],
		'email' => $_POST['email'],
		'pass' => password_hash($_POST['pass'], PASSWORD_DEFAULT));
    $query->execute($array);
    $query->closeCursor();
    }
    
    function findMember()
    {
        $bdd = new database();
        $bdd->connexion();
        $query = $bdd->getBdd()->prepare($bdd->selectMemberLogs());
        $query->execute(array('email' => $_POST['email']));
        $result = $query->fetch();
    
        // Booleen qui compare le mot de passe inclut dans la bdd et celui entré par l'utilisateur
        // Renvoie true quand les 2 mots de passe concorde sinon false
        if (password_verify($_POST['pass'], $result['password'])) {
            session_start();
            $_SESSION['id'] = $result['id'];
            $_SESSION['email'] = $_POST['email'];
            echo 'Vous êtes connecté !';
        }
        else {
            echo 'Mauvais identifiant ou mot de passe !';
        }
    }
}