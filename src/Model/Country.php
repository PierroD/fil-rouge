<?php
/*
  Country_Id
  Code
  Name
  Continent
  Region
  SurfaceArea
  IndepYear
  Population
  LifeExpectancy
  GNP
  GNPOld
  LocalName
  GovernmentForm
  HeadOfState
  Capital
  Code2
  Image1
  Image2
 */
class Country
{
    private $Country_Id;
    private $Code;
    private $Name;
    private $Continent;
    private $Region;
    private $SurfaceArea;
    private $IndepYear;
    private $Population;
    private $LifeExpectancy;
    private $GNP;
    private $GNPOld;
    private $LocalName;
    private $GovernmentForm;
    private $HeadOfState;
    private $Capital;
    private $Code2;
    private $Image1;
    private $Image2;

    public function setCountryId($Country_Id)
    {
        $this->Country_Id = $Country_Id;
    }
    public function getCountryId()
    {
        return $this->Country_Id;
    }
    public function setCode($Code)
    {
        $this->Code = $Code;
    }
    public function getCode()
    {
        return $this->Code;
    }
    public function setName($Name)
    {
        $this->Name = $Name;
    }
    public function getName()
    {
        return $this->Name;
    }
    public function setContinent($Continent)
    {
        $this->Continent = $Continent;
    }
    public function getContinent()
    {
        return $this->Continent;
    }
    public function setRegion($Region)
    {
        $this->Region = $Region;
    }
    public function getRegion()
    {
        return $this->Region;
    }
    public function setSurfaceArea($SurfaceArea)
    {
        $this->SurfaceArea = $SurfaceArea;
    }
    public function getSurfaceArea()
    {
        return $this->SurfaceArea;
    }
    public function setIndepYear($IndepYear)
    {
        $this->IndepYear = $IndepYear;
    }
    public function getIndepYear()
    {
        return $this->IndepYear;
    }
    public function setPopulation($Population)
    {
        $this->Population = $Population;
    }
    public function getPopulation()
    {
        return $this->Population;
    }
    public function setLifeExpectancy($LifeExpectancy)
    {
        $this->LifeExpectancy = $LifeExpectancy;
    }
    public function getLifeExpectancy()
    {
        return $this->LifeExpectancy;
    }
    public function setGNP($GNP)
    {
        $this->GNP = $GNP;
    }
    public function getGNP()
    {
        return $this->GNP;
    }
    public function setGNPOld($GNPOld)
    {
        $this->GNPOld = $GNPOld;
    }
    public function getGNPOld()
    {
        return $this->GNPOld;
    }
    public function setLocalName($LocalName)
    {
        $this->LocalName = $LocalName;
    }
    public function getLocalName()
    {
        return $this->LocalName;
    }
    public function setGovernmentForm($GovernmentForm)
    {
        $this->GovernmentForm = $GovernmentForm;
    }
    public function getGovernmentForm()
    {
        return $this->GovernmentForm;
    }
    public function setHeadOfState($HeadOfState)
    {
        $this->HeadOfState = $HeadOfState;
    }
    public function getHeadOfState()
    {
        return $this->HeadOfState;
    }
    public function setCapital($Capital)
    {
        $this->Capital = $Capital;
    }
    public function getCapital()
    {
        return $this->Capital;
    }
    public function setCode2($Code2)
    {
        $this->Code2 = $Code2;
    }
    public function getCode2()
    {
        return $this->Code2;
    }
    public function setImage1($Image1)
    {
        $this->Image1 = $Image1;
    }
    public function getImage1()
    {
        return $this->Image1;
    }
    public function setImage2($Image2)
    {
        $this->Image2 = $Image2;
    }
    public function getImage2()
    {
        return $this->Image2;
    }
}
