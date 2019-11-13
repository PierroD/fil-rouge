<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/src/Model/DAOCountryLanguage.php";
require_once $_SERVER['DOCUMENT_ROOT'] .  "/src/Renderer.php";

class CountryLanguageController
{
    public function deleteAllForCountry($id)
    {
        $dao_cl = new DAOCountryLanguage(Singleton::getInstance()->cnx);
        $cl_list = $dao_cl->findFromCountry($id);
        foreach ($cl_list as $cl) {
            $dao_cl->remove($cl);
        }
    }
}
