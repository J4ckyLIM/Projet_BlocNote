<?php

function connexion_bdd() {
    try{
        $host = "localhost";
        $db = "blocnotedatabase";
        $user = "";
        $password = ""; 
        $port = 3306;
        $bdd = new PDO(
            "mysql:host=$host;port=$port;dbname=$db",
            $email,
            $pass,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $bdd;
    }
    catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
?>