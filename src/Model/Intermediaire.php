
<?php

class Intermediaire
{
    private $User_ID;
    private $Role_ID;

    public function setRoleId($Role_ID)
    {
        $this->Role_ID = $Role_ID;
    }

    public function getRoleId()
    {
        return $this->Role_ID;
    }

    public function setUserId($User_ID)
    {
        $this->User_ID = $User_ID;
    }

    public function getUserId()
    {
        return $this->User_ID;
    }
}

?>