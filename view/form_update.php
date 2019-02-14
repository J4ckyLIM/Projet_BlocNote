<?php
require "class/database.php";

function displayInfoMember()
{
    $bdd = new database();
    $bdd->connexion();
    $id = $_GET['id'];
    
    $query = $bdd->getBdd()->prepare($bdd->selectMemberId());
    $array = array('id' => $id);

    $query->execute($array);
    if($data = $query->fetch()){
        echo '<form action="member/update.php?id='.$data['id'].'"method="post">';
        echo '<input type="text" name="lastName_update" value="'.$data['lastName'].'"required/>'.'</br>'.'</br>';
        echo '<input type="text" name="firstName_update" value="'.$data['firstName'].'"required/>'.'</br>'.'</br>';
        echo '<input type="email" name="email_update" value="'.$data['email'].'"required/>'.'</br>'.'</br>';
        echo '<input type="submit" name="form_update" value="Modifier" />';
    }
    else{
        echo '<p>'."Aucun résultat n'a été trouvé.".'</p>';
    }
    $query->closeCursor();
}