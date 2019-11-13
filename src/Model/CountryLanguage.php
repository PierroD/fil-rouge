<?php
/*
  CountryLanguage_Id
  CountryCode
  Language
  IsOfficial
  Percentage

 */
class CountryLanguage
{
    private $CountryLanguage_Id;
    private $CountryCode;
    private $Language;
    private $IsOfficial;
    private $Percentage;


    public function setCountryLanguageId($CountryLanguage_Id)
    {
        $this->CountryLanguage_Id = $CountryLanguage_Id;
    }
    public function getCountryLanguageId()
    {
        return $this->CountryLanguage_Id;
    }
    public function setCountryCode($CountryCode)
    {
        $this->CountryCode = $CountryCode;
    }
    public function getCountryCode()
    {
        return $this->CountryCode;
    }
    public function setLanguage($Language)
    {
        $this->Language = $Language;
    }
    public function getLanguage()
    {
        return $this->Language;
    }
    public function setIsOfficial($IsOfficial)
    {
        $this->IsOfficial = $IsOfficial;
    }
    public function getIsOfficial()
    {
        return $this->IsOfficial;
    }
    public function setPercentage($Percentage)
    {
        $this->Percentage = $Percentage;
    }
    public function getPercentage()
    {
        return $this->Percentage;
    }
}
