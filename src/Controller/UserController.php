<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/src/Model/DAOUser.php";
require_once $_SERVER['DOCUMENT_ROOT'] .  "/src/Renderer.php";

class UserController
{
    public function TryAuth()
    {
        $user = htmlspecialchars($_POST["username"]);
        $pwd = htmlspecialchars($_POST["password"]);
        $dao_user = new DAOUSer(Singleton::getInstance()->cnx);
        $vuser = $dao_user->find($user);
        //var_dump(password_verify($pwd, $vuser->getPassword()));
        if (password_verify($pwd, $vuser->getPassword())) {
            if ($vuser) {
                session_start();
                $_SESSION["user"]["id"] = $vuser->getUserId();
                // header("location: http://127.0.0.1:8080/");
            } else {
                echo "Identifiant ou mot de passe incorrect !";
            }
        }
    }
}
