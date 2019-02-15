<?php

function connexion_bdd() {
    try{
        $host = "localhost";
        $db = "blocnotedb";
        $user = "root";
        $pass = ""; 
        $port = 3308;
        $bdd = new PDO(
            "mysql:host=$host;port=$port;dbname=$db",
            $user,
            $pass,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $bdd;
    }
    catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
?>