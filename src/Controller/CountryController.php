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
    public function updateCountry($id)
    {
        $dao_country = new DAOCountry(Singleton::getInstance()->cnx);
        $country = $dao_country->find($id);
        $e = Renderer::render("updateCountry", compact('country'));
        echo $e;
    }
}
