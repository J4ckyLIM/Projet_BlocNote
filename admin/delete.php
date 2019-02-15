<?php

require_once 'class/database.php';

function deleteMember(){
    $bdd =new database();
    $bdd->connexion();
    $id = $_GET['id'];
    $query = $bdd->getBdd()->prepare($bdd->deleteMemberId());
    $array = array ('id' => $id);
    $query->execute($array);
    $query->closeCursor();

}
deleteMember();