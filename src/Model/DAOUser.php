<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Model/Singleton.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Model/User.php';

class DAOUser
{

    private $cnx;
    function __construct($cnx)
    {
        // ? bon
        // ? $this->cnx = Singleton::getInstance()->cnx;
        $this->cnx = /*Singleton::getInstance()->cnx;*/ $cnx;
    }

    public function find($username): User
    {
        $SQL = "SELECT * FROM User WHERE Login=:login";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindParam("login", $username);
        $prepareStatement->execute();
        $user = $prepareStatement->fetchObject("User");
        return $user;
    }
}
