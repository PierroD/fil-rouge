<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/src/Model/DAOCity.php";
require_once $_SERVER['DOCUMENT_ROOT'] .  "/src/Renderer.php";

class CityController
{
    /**
     * Récupère toutes les villes
     *
     * @param [type] $id
     * @return void
     */
    public function showCitiesinCountry($id)
    {

        $dao_city = new DAOCity(Singleton::getInstance()->cnx);
        $cities = $dao_city->findByCountryId($id);
        $e = Renderer::render("cities", compact('cities'));
        echo $e;
    }
    /**
     * Récupère une ville
     *
     * @param [type] $id
     * @return void
     */
    public function showCity($id)
    {
        $dao_city = new DAOCity(Singleton::getInstance()->cnx);
        $city = $dao_city->find($id);
        $e = Renderer::render("city", compact('city'));
        echo $e;
    }
    /**
     * Supprime une ville
     *
     * @param [type] $id
     * @return void
     */
    public function deleteCity($id)
    {
        $dao_city = new DAOCity(Singleton::getInstance()->cnx);
        $city_remove = $dao_city->find($id);
        $city = $dao_city->remove($city_remove);
    }
    /**
     * Récupère une ville pour la page update
     *
     * @param [type] $id
     * @return void
     */
    public function showUpdateCity($id)
    {
        $dao_city = new DAOCity(Singleton::getInstance()->cnx);
        $city = $dao_city->find($id);
        $e = Renderer::render("updateCity", compact('city'));
        echo $e;
    }
    /**
     * Mets à jour la ville 
     *
     * @param [type] $City_Id
     * @return void
     */
    public function updateCity($City_Id)
    {
        $dao_city = new DAOCity(Singleton::getInstance()->cnx);
        $Name = htmlspecialchars($_POST["Name"]);
        $CountryCode = htmlspecialchars($_POST["CountryCode"]);
        $District = htmlspecialchars($_POST["District"]);
        $Population = htmlspecialchars($_POST["Population"]);
        $upd_city = new City();
        $upd_city->setCityId($City_Id);
        $upd_city->setName($Name);
        $upd_city->setCountryCode($CountryCode);
        $upd_city->setDistrict($District);
        $upd_city->setPopulation($Population);
        $dao_city->update($upd_city);
    }
    /**
     * Supprime toutes les villes pour supprimer un pays
     *
     * @param [type] $id
     * @return void
     */
    public function deleteAllForCountry($id)
    {
        $dao_city = new DAOCity(Singleton::getInstance()->cnx);
        $city_list = $dao_city->findByCountryId($id);
        foreach ($city_list as $city) {
            $dao_city->remove($city);
        }
    }
}
