<?php

// ? bon
require_once './Singleton.php';
require_once './CountryLanguage.php';



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
    public function getCountryLanguageById($id): CountryLanguage
    {
        // $cnx = Singleton::getInstance()->cnx;
        $SQL = "SELECT * FROM countrylanguage WHERE CountryLanguage_Id=:id";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("id", $id);
        $prepareStatement->execute();
        $ville = $prepareStatement->fetchObject("City");
        return $ville;
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
    public function remove($id): void // * Delete
    {
        $SQL = "DELETE FROM countrylanguage WHERE CountryLanguage_Id=:id";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("id", $id);
        $prepareStatement->execute();
    }
    public function findAll(): array
    {
        $SQL = "SELECT * FROM countrylanguage";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->execute();
        $list_ville = $prepareStatement->fetchObject("City");
        return $list_ville;
    }
    public function count(): int
    {
        $SQL = "SELECT COUNT(CountryLanguage_Id) FROM countrylanguage";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->execute();
        $city_count = $prepareStatement->fetch();
        return $city_count;
    }
    /*
    public function findFromCountryLanguage(countrylanguage $countrylanguage) : Array
    {
        $SQL = "SELECT * FROM city, country WHERE (city.CountryCode=country.Code AND country.Code=:code)";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("code", $country->Code);
        $prepareStatement->execute();
        $pays_villes = $prepareStatement->fetchObject("Country");
        return $pays_villes;
    }
    */
    public function findByName(string $name): array
    {
        $SQL = "SELECT * FROM cicountrylanguagety WHERE (Name = %:name%)";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("name", $name);
        $prepareStatement->execute();
        $nom_ville = $prepareStatement->fetchObject("CountryLanguage");
        return $nom_ville;
    }
    public function findByNameStartingWith(string $pattern): array
    {
        $SQL = "SELECT * FROM countrylanguage WHERE (Name = :name%)";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("name", $pattern);
        $prepareStatement->execute();
        $nom_ville = $prepareStatement->fetchObject("CountryLanguage");
        return $nom_ville;
    }
}
