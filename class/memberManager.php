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


    /* Fonction pour ajouter un membre à la BDD */
    public function insertMember()
    {
	$bdd = new database();
	$bdd->connexion();
	$query = $bdd->getBdd()->prepare('INSERT INTO member(lastName, firstName, email, password) VALUES(:lastName, :firstName, :email, :pass)');
	$array = array(
		'lastName' => $_POST['lastName'],
		'firstName' => $_POST['firstName'],
		'email' => $_POST['email'],
		'pass' => password_hash($_POST['pass'], PASSWORD_DEFAULT));
    $query->execute($array);
    $query->closeCursor();
    }
    

    /* Fonction qui permet la connexion de l'utilisateur en vérifiant email et mot de passe */
    function findMember()
    {
        $bdd = new database();
        $bdd->connexion();
        $query = $bdd->getBdd()->prepare('SELECT id, password FROM member WHERE email= :email');
        $query->execute(array('email' => $_POST['email']));
        $result = $query->fetch();
    
        // Booleen qui compare le mot de passe inclut dans la bdd et celui entré par l'utilisateur
        // Renvoie true quand les 2 mots de passe concorde sinon false
        if (password_verify($_POST['pass'], $result['password'])) {
            session_start();
            $_SESSION['id'] = $result['id'];
            $_SESSION['email'] = $_POST['email'];

            // l'utilisateur est renvoyé sur la liste des notes une fois connecté
            header('Location: view/noteListe.php');
            echo 'Vous êtes connecté !';
        }
        else {
            echo '<div class="error">'.'Mauvais identifiant ou mot de passe !'.'</div>';
        }
    }

    /* Fonction pour prouver l'unicité d'un email/identifiant */
    function checkUniq()
    {
        $bdd = new database();
        $bdd->connexion();
        $query = $bdd->getBdd()->prepare('SELECT COUNT(*) AS count_email FROM member WHERE email= :email');
        $query->execute(array('email' => $_POST['email']));
        $test = $query->fetch();
        if($test['count_email'] == 0){ 
            $this->insertMember();
            echo "<div class='alert alert-success'>Le compte a été crée.</div>";

    // une fois le compte créer, l'utilisateur est redirigé sur la page principale
            session_start();
            $_SESSION['email'] = $_POST['email'];
            exit();
            header('Location: class/noteListe.php');
        }   
        else{
            echo '<div class="error">'.'Un membre possède déjà ce login'.'</div>';
        }
    }     
    
}