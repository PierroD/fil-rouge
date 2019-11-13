<?php

// ? bon
require_once $_SERVER['DOCUMENT_ROOT'] .  '/src/Model/Singleton.php';
require_once $_SERVER['DOCUMENT_ROOT'] .  '/src/Model/CountryLanguage.php';



class DAOCountryLanguage
{
    private $cnx;
    function __construct($cnx)
    {
        // ? bon
        // ? $this->cnx = Singleton::getInstance()->cnx;
        $this->cnx = /*Singleton::getInstance()->cnx;*/ $cnx;
    }

    // * Tous les CRUD (nommé comme sur les frameworks): Create, Read, Update, Delete // save, get, update, remove
    public function find($id): CountryLanguage
    {
        // $cnx = Singleton::getInstance()->cnx;
        $SQL = "SELECT * FROM countrylanguage WHERE CountryLanguage_Id=:id";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("id", $id);
        $prepareStatement->execute();
        $country_l = $prepareStatement->fetchObject("CountryLanguage");
        return $country_l;
    }

    public function save(CountryLanguage $countrylanguage): void // * Create
    {
        $SQL = "INSERT INTO (CountryCode, Language, IsOfficial, Percentage) VALUES($countrylanguage->getCountryCode(), $countrylanguage->getLanguage(), $countrylanguage->getIsOfficial(), $countrylanguage->getPercentage()";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->execute();
    }
    public function update(CountryLanguage $countrylanguage): void // * Update
    {
        $SQL = "UPDATE countrylanguage SET CountryCode = $countrylanguage->getCountryCode() Language = $countrylanguage->getLanguage() IsOfficial = $countrylanguage->getIsOfficial() Percentage = $countrylanguage->getPercentage() WHERE CountryLanguage_Id = $countrylanguage->getCountryLanguageById()";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->execute();
    }
    public function remove(CountryLanguage $CL): bool // * Delete
    {
        $SQL = "DELETE FROM countrylanguage WHERE CountryLanguage_Id=:id";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("id", $CL->getCountryLanguageId());
        return $prepareStatement->execute();
    }
    public function findAll(): array
    {
        $SQL = "SELECT * FROM countrylanguage";
        $prepareStatement = $this->cnx->query($SQL);
        $prepareStatement->setFetchMode(PDO::FETCH_CLASS, 'CountryLanguage');
        $cl_list = [];
        foreach ($prepareStatement as $cl) {
            $cl_list[] = $cl;
        }
        return $cl_list;
    }
    public function count(): int
    {
        $SQL = "SELECT COUNT(CountryLanguage_Id) FROM countrylanguage";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->execute();
        $cl = $prepareStatement->fetch();
        return $cl;
    }

    public function findFromCountry($id): array
    {
        $SQL = "SELECT countrylanguage.* FROM countrylanguage, country where CountryCode = Code AND Country_Id =:id";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("id", $id);
        $prepareStatement->execute();
        $prepareStatement->setFetchMode(PDO::FETCH_CLASS, 'CountryLanguage');
        $cl_list = [];
        foreach ($prepareStatement as $cl) {
            $cl_list[] = $cl;
        }
        var_dump($cl_list);
        return $cl_list;
    }
}
