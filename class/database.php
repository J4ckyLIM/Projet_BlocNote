<?php
// class permettant la connexion à la BDD
class database
{
    private $_host = "mysql: host=localhost;port=3308;dbname=blocnotedb;charset=utf8";
    private $_username = "root";
    private $_password = "";
    private $_bdd;

    public function getHost(){ return $this->_host; }

    public function setHost($host)
    {
        $this->_host = $host;
    }

    public function setBdd($bdd)
    {
        $this->_bdd = $bdd;
    }

    public function getUsername(){ return $this->_username; }

    public function getPassword(){ return $this->_password; }

    public function getBdd(){ return $this->_bdd; }

    public function connexion()
    {
        try{
            $this->setBdd(new PDO($this->getHost(),$this->getUsername(), $this->getPassword()));
        }catch (Exception $e){
            die ('Erreur : ' . $e->getMessage());
        }
    }
    
    function addMember()
    {
        return 'INSERT INTO member(lastName, firstName, email, password) VALUES(:lastName, :firstName, :email, :pass)';
    }

    function isUniqMember()
    {
        return 'SELECT COUNT(*) AS count_email FROM member WHERE email= :email';
    }
}

