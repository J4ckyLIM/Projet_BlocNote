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

    public function insertMember()
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
            //header('Location: YANnote.php');
            echo 'Vous êtes connecté !';
        }
        else {
            echo 'Mauvais identifiant ou mot de passe !';
        }
    }

    function checkUniq()
    {
        $bdd = new database();
        $bdd->connexion();
        $query = $bdd->getBdd()->prepare($bdd->isUniqMember());
        $query->execute(array('email' => $_POST['email']));
        $test = $query->fetch();
        if($test['count_email'] == 0){ 
            $this->insertMember();
            echo "<div class='alert alert-success'>Le compte a été crée.</div>";

    // une fois le compte créer, l'utilisateur est redirigé sur la page principale
            session_start();
            $_SESSION['email'] = $_POST['email'];
            ('Location: index.php');
            exit();
        }   
        else{
            $erreur = 'Un membre possède déjà ce login.';
        }if (isset($erreur)) echo '<br />',$erreur;
    }     
    
}