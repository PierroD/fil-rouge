<?php

class User
{
    private $User_ID;
    private $Name;
    private $Login;
    private $Password;

    public function setUserId($User_ID)
    {
        $this->User_ID = $User_ID;
    }

    public function getUserId()
    {
        return $this->User_ID;
    }

    public function setName($Name)
    {
        $this->Name = $Name;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function setLogin($Login)
    {
        $this->Login = $Login;
    }

    public function getLogin()
    {
        return $this->Login;
    }


    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    public function getPassword()
    {
        return $this->Password;
    }
}
