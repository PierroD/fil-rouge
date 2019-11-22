
<?php

class Role
{
    private $Role_ID;
    private $RoleName;
    private $Permissions;

    public function setRoleId($Role_ID)
    {
        $this->Role_ID = $Role_ID;
    }

    public function getRoleId()
    {
        return $this->Role_ID;
    }

    public function setRoleName($RoleName)
    {
        $this->RoleName = $RoleName;
    }

    public function getRoleName()
    {
        return $this->RoleName;
    }

    public function setPermissions($Permissions)
    {
        $this->Permissions = $Permissions;
    }

    public function getPermissions()
    {
        return $this->Permissions;
    }
}

?>