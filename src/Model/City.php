<?php
/*
City_Id
Name
Countrycode
District
Population
*/
//require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Model.php';

class City
{

    private $City_Id;
    private $Name;
    private $Countrycode;
    private $District;
    private $Population;

    public function setCityId($city_id)
    {
        $this->City_Id = $city_id;
    }

    public function getCityId()
    {
        return $this->City_Id;
    }

    public function setName($name)
    {
        $this->Name = $name;
    }

    public function getName()
    {
        return strtoupper($this->Name);
    }

    public function setCountrycode($Countrycode)
    {
        $this->Countrycode = $Countrycode;
    }

    public function getCountryCode()
    {
        return $this->CountryCode;
    }

    public function setDistrict($District)
    {
        $this->District = $District;
    }

    public function getDistrict()
    {
        return $this->District;
    }

    public function setPopulation($Population)
    {
        $this->Population = $Population;
    }

    public function getPopulation()
    {
        return $this->Population;
    }
}
