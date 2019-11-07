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



    public function getCountryLanguageId()
    {
        return $this->CountryLanguage_Id;
    }
    public function getCountryCode()
    {
        return $this->CountryCode;
    }
    public function getLanguage()
    {
        return $this->Language;
    }
    public function getIsOfficial()
    {
        return $this->IsOfficial;
    }
    public function getPercentage()
    {
        return $this->Percentage;
    }
}
