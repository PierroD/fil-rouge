<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Model/Singleton.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Model/Role.php';

class DAORole
{

    private $cnx;
    function __construct($cnx)
    {
        // ? bon
        // ? $this->cnx = Singleton::getInstance()->cnx;
        $this->cnx = /*Singleton::getInstance()->cnx;*/ $cnx;
    }
    /**
     * Récupère le role d'un user
     *
     * @param [type] $userid
     * @return Role
     */
    public function find($userid): Role
    {
        $SQL = "SELECT Role.* FROM User, Role, Intermediaire WHERE Role.Role_ID = Intermediaire.Role_ID AND Intermediaire.User_ID = User.User_ID AND User.User_ID =:userid";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindParam("userid", $userid);
        $prepareStatement->execute();
        $user = $prepareStatement->fetchObject("Role");
        return $user;
    }
}
