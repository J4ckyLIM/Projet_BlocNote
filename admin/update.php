<?php
require_once 'class/database.php';

function updateInfoMember(){
    $bdd = new database();
    $bdd->connexion();
    $lastName = $_POST['lastName_update'];
    $firstName = $_POST['firstName_update'];
    $email = $_POST['email'];
    $id = $_GET['id'];

    $query = $bdd->getBdd()->prepare($bdd->updateMemberId());
    $array = array(
        'lastName' => $lastName,
        'firstName' => $firstName,
        'email' => $email,
        'id' => $id,
    );
    $query->execute($array);

    $query->closeCursor();

}
if(isset($_POST['form_update'])){
    updateInfoMember();
}