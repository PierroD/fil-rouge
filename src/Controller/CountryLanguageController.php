<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/src/Model/DAOCountryLanguage.php";
require_once $_SERVER['DOCUMENT_ROOT'] .  "/src/Renderer.php";

class CountryLanguageController
{
    /**
     * Supprime toutes les langues pour un pays
     *
     * @param [type] $id
     * @return void
     */
    public function deleteAllForCountry($id)
    {
        $dao_cl = new DAOCountryLanguage(Singleton::getInstance()->cnx);
        $cl_list = $dao_cl->findFromCountry($id);
        foreach ($cl_list as $cl) {
            $dao_cl->remove($cl);
        }
    }
    /**
     * Récupère toutes les langues pour un pays
     *
     * @param [type] $id
     * @return void
     */
    public function showCountryLanguages($id = null)
    {
        $dao_cl = new DAOCountryLanguage(Singleton::getInstance()->cnx);
        $countrylanguages = $dao_cl->findFromCountry($id);
        $e = Renderer::render("countrylanguage", compact('countrylanguages'));
        echo $e;
    }
}
