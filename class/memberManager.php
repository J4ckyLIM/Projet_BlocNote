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

    function deleteMemerId()
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
}