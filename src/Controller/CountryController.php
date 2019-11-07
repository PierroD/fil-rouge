<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/src/Model/DAOCountry.php";
require_once $_SERVER['DOCUMENT_ROOT'] .  "/src/Renderer.php";

class CountryController
{

    public function showCountries($name = null)
    {
        // $name récupère le continent
        $dao_country = new DAOCountry(Singleton::getInstance()->cnx);
        $countries = $dao_country->findbyContinent($name);
        $e = Renderer::render("countries", compact('countries'));
        echo $e;
    }
    public function showCountry($id)
    {
        $dao_country = new DAOCountry(Singleton::getInstance()->cnx);
        $country = $dao_country->find($id);
        $e = Renderer::render("country", compact('country'));
        echo $e;
    }
    public function deleteCountry($id)
    {
        $dao_country = new DAOCountry(Singleton::getInstance()->cnx);
        $country_remove = $dao_country->find($id);
        $country = $dao_country->remove($country_remove);
    }
    public function showUpdateCountry($id)
    {
        $dao_country = new DAOCountry(Singleton::getInstance()->cnx);
        $country = $dao_country->find($id);
        $e = Renderer::render("updateCountry", compact('country'));
        echo $e;
    }
    public function updateCountry($Country_Id)
    {
        $dao_country = new DAOCountry(Singleton::getInstance()->cnx);
        $Code = htmlspecialchars($_POST["Code"]);
        $Name = htmlspecialchars($_POST["Name"]);
        $Continent = htmlspecialchars($_POST["Continent"]);
        $Region = htmlspecialchars($_POST["Region"]);
        $SurfaceArea = htmlspecialchars($_POST["SurfaceArea"]);
        $IndepYear = htmlspecialchars($_POST["IndepYear"]);
        $Population = htmlspecialchars($_POST["Name"]);
        $LifeExpectancy = htmlspecialchars($_POST["LifeExpectancy"]);
        $GNP = htmlspecialchars($_POST["GNP"]);
        $GNPold = htmlspecialchars($_POST["GNPold"]);
        $LocalName = htmlspecialchars($_POST["LocalName"]);
        $GovernmentForm = htmlspecialchars($_POST["GovernmentForm"]);
        $HeadOfState = htmlspecialchars($_POST["HeadOfState"]);
        $Capital = htmlspecialchars($_POST["Capital"]);
        $Code2 = htmlspecialchars($_POST["Code2"]);

        $upd_country = new Country();
        $upd_country->setCountryId($Country_Id);
        $upd_country->setCode($Code);
        $upd_country->setName($Name);
        $upd_country->setContinent($Continent);
        $upd_country->setRegion($Region);
        $upd_country->setSurfaceArea($SurfaceArea);
        $upd_country->setIndepYear($IndepYear);
        $upd_country->setPopulation($Population);
        $upd_country->setLifeExpectancy($LifeExpectancy);
        $upd_country->setGNP($GNP);
        $upd_country->setGNPold($GNPold);
        $upd_country->setLocalName($LocalName);
        $upd_country->setGovernmentForm($GovernmentForm);
        $upd_country->setHeadOfState($HeadOfState);
        $upd_country->setCapital($Capital);
        $upd_country->setCode2($Code2);
        var_dump($upd_country);

        $dao_country->update($upd_country);
    }
}
