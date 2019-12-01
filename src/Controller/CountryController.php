<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/src/Model/DAOCountry.php";
require_once $_SERVER['DOCUMENT_ROOT'] .  "/src/Renderer.php";

class CountryController
{
    /**
     * Récupère les pays un continent
     *
     * @param string $name
     * @return void
     */
    public function showCountries($name = null)
    {
        // $name récupère le continent
        $dao_country = new DAOCountry(Singleton::getInstance()->cnx);
        $countries = $dao_country->findbyContinent($name);
        $e = Renderer::render("countries", compact('countries'));
        echo $e;
    }
    /**
     * Récupère les informations d'un continent
     *
     * @param [type] $id
     * @return void
     */
    public function showCountry($id)
    {
        $dao_country = new DAOCountry(Singleton::getInstance()->cnx);
        $country = $dao_country->find($id);
        $e = Renderer::render("country", compact('country'));
        echo $e;
    }
    /**
     * Supprime un pays
     *
     * @param [type] $id
     * @return void
     */
    public function deleteCountry($id)
    {
        $dao_country = new DAOCountry(Singleton::getInstance()->cnx);
        $country_remove = $dao_country->find($id);
        $dao_country->remove($country_remove);
    }
    /**
     * Montre le pays à mettre à jour
     *
     * @param [type] $id
     * @return void
     */
    public function showUpdateCountry($id)
    {
        $dao_country = new DAOCountry(Singleton::getInstance()->cnx);
        $country = $dao_country->find($id);
        $e = Renderer::render("updateCountry", compact('country'));
        echo $e;
    }
    /**
     * Mets le pays à jour
     *
     * @param [type] $Country_Id
     * @return void
     */
    public function updateCountry($Country_Id)
    {
        $dao_country = new DAOCountry(Singleton::getInstance()->cnx);
        $Code = htmlspecialchars($_POST["Code"]);
        $Name = htmlspecialchars($_POST["Name"]);
        $Continent = htmlspecialchars($_POST["Continent"]);
        $Region = htmlspecialchars($_POST["Region"]);
        $SurfaceArea = htmlspecialchars($_POST["SurfaceArea"]);
        $IndepYear = htmlspecialchars($_POST["IndepYear"]);
        $Population = htmlspecialchars($_POST["Population"]);
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
        header("location: http://127.0.0.1:8080/country/show/" . $Continent);
    }
}
