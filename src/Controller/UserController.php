<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/src/Model/DAOUser.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/src/Model/DAORole.php";
require_once $_SERVER['DOCUMENT_ROOT'] .  "/src/Renderer.php";

class UserController
{
    /**
     * Fonction pour se connecter
     *
     * @return void
     */
    public function TryAuth()
    {
        $user = htmlspecialchars($_POST["username"]);
        $pwd = htmlspecialchars($_POST["password"]);
        $dao_user = new DAOUSer(Singleton::getInstance()->cnx);
        $dao_role = new DAORole(Singleton::getInstance()->cnx);
        $vuser = $dao_user->find($user);
        if (password_verify($pwd, $vuser->getPassword())) {
            if ($vuser) {
                session_start();
                $_SESSION["user"]["id"] = $vuser->getUserId();
                $role = $dao_role->find($vuser->getUserId());
                $_SESSION["user"]["permission"] = (unpack("C*", $role->getPermissions()));
            } else {
                echo "Identifiant ou mot de passe incorrect !";
            }
        }
    }
}
