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
    public function findMember()
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
            header('Location: index.php?page=noteListe');
            echo 'Vous êtes connecté !';
        }
        else {
            echo '<div class="error">'.'Mauvais identifiant ou mot de passe !'.'</div>';
        }
    }

    /* Fonction pour prouver l'unicité d'un email/identifiant */
    public function checkUniq()
    {
        $bdd = new database();
        $bdd->connexion();
        $query = $bdd->getBdd()->prepare('SELECT COUNT(*) AS count_email FROM member WHERE email= :email');
        $query->execute(array('email' => $_POST['email']));
        $test = $query->fetch();
        if($test['count_email'] == 0){ 
            $this->insertMember();

    // une fois le compte créer, l'utilisateur est redirigé sur la page principale 
            echo '<script type="text/javascript">'."alert('Le compte a été créer avec succès')".'</script>';
            header('Location: index.php?page=register');
            //header('Location: index.php?page=home');
        }   
        else{
            echo  '<script type="text/javascript">'."alert('Un membre possède déjà cet email')".'</script>';
        }
    }
    
    /* Fonction utiliser pour deconnecter un membre */
    public function dcMember(){
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit();
    }
    
}