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


    public function getCountryId()
    {
        return $this->Country_Id;
    }
    public function getCode()
    {
        return $this->Code;
    }
    public function getName()
    {
        return $this->Name;
    }
    public function getContinent()
    {
        return $this->Continent;
    }
    public function getRegion()
    {
        return $this->Region;
    }
    public function getSurfaceArea()
    {
        return $this->SurfaceArea;
    }
    public function getIndepYear()
    {
        return $this->IndepYear;
    }
    public function getPopulation()
    {
        return $this->Population;
    }
    public function getLifeExpectancy()
    {
        return $this->LifeExpectancy;
    }
    public function getGNP()
    {
        return $this->GNP;
    }
    public function getGNPOld()
    {
        return $this->GNPOld;
    }
    public function getLocalName()
    {
        return $this->LocalName;
    }
    public function getGovernmentForm()
    {
        return $this->GovernmentForm;
    }
    public function getHeadOfState()
    {
        return $this->HeadOfState;
    }
    public function getCapital()
    {
        return $this->Capital;
    }
    public function getCode2()
    {
        return $this->Code2;
    }
    public function getImage1()
    {
        return $this->Image1;
    }
    public function getImage2()
    {
        return $this->Image2;
    }
}
