<?php

// ? bon
require_once $_SERVER['DOCUMENT_ROOT'] .  '/src/Model/Singleton.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Model/Country.php';


class DAOCountry
{
    private $cnx;
    function __construct($cnx)
    {
        // ? bon
        // ? $this->cnx = Singleton::getInstance()->cnx;
        $this->cnx = /*Singleton::getInstance()->cnx;*/ $cnx;
    }

    // * Tous les CRUD (nommé comme sur les frameworks): Create, Read, Update, Delete // save, get, update, remove
    public function find($id): Country
    {
        // $cnx = Singleton::getInstance()->cnx;
        $SQL = "SELECT * FROM country WHERE Country_Id=:id";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("id", $id);
        $prepareStatement->execute();
        $ville = $prepareStatement->fetchObject("Country");
        return $ville;
    }

    public function save(Country $country): void // * Create
    {
        $SQL = "INSERT INTO country(Code, Name, Continent, Region, SurfaceArea, IndepYear, Population, LifeExpectancy, GNP, GNPOld, LocalName, GovernmentForm, HeadOfState, Capital, Code2, Image1, Image2) VALUES($country->getCode(), $country->getName(), $$country->getContient(), $country->getRegion(), $country->getSurfaceArea(), $country->getIndepYear(), $country->getPopulation(), $country->getLifeExpectancy(), $country->getGNP(), $country->getGNPOld(), $country->getLocalName(), $country->getGovernmentForm(), $country->getHeadOfState(), $country->getCapital(), $country->getCode2(), $country->getImage1(), $country->getImage2()";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->execute();
    }
    public function update(Country $country): void // * Update
    {
        $SQL = "UPDATE country SET Code = $country->getCode() Name = $country->getName() Continent =$country->getContient() Region = $country->getRegion() SurfaceArea = $country->getSurfaceArea() IndepYear = $country->getIndepYear() Population = $country->getPopulation() LifeExpectancy = $country->getLifeExpectancy() GNP = $country->getGNP() GNPOld = $country->getGNPOld() LocalName =$country->getLocalName() GovernmentForm = $country->getGovernmentForm() HeadOfState = $country->getHeadOfState() Capital = $country->getCapital() Code2 = $country->getCode2() Image1 = $country->getImage1() Image2 = $country->getImage2() WHERE Country_Id = $country->getCountryById()";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->execute();
    }
    public function remove($id): void // * Delete
    {
        $SQL = "DELETE FROM country WHERE Country_Id=:id";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("id", $id);
        $prepareStatement->execute();
    }
    public function findAll(): array
    {
        $SQL = "SELECT * FROM country";
        $prepareStatement = $this->cnx->query($SQL);
        $prepareStatement->setFetchMode(PDO::FETCH_CLASS, 'Country');
        //$prepareStatement->execute();
        //$list_ville = $prepareStatement->fetchObject("City");
        $cities_list = [];
        foreach ($prepareStatement as $city) {
            $cities_list[] = $city;
        }
        return $cities_list;
    }
    public function count(): int
    {
        $SQL = "SELECT COUNT(Country_Id) FROM country";
        $prepareStatement = $this->cnx->query($SQL);
        //$pre1pareStatement->execute();
        $country_count = $prepareStatement->fetchColumn(); //setFetchMode(PDO::FETCH_CLASS, 'City');
        //echo $city_count;
        return $country_count;
    }

    public function findFromCity(City $city): array
    {
        $SQL = "SELECT * FROM city, country WHERE (city.CountryCode=country.Code AND city.Name=:name)";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("name", $$city->getName());
        $prepareStatement->execute();
        $prepareStatement->setFetchMode(PDO::FETCH_CLASS, 'Country');
        //$prepareStatement->execute();
        //$list_ville = $prepareStatement->fetchObject("City");
        $country_list = [];
        foreach ($prepareStatement as $city) {
            $country_list[] = $city;
        }
        return $country_list;
    }

    public function findbyContinent(string $continent): array
    {
        $SQL = "SELECT * FROM country WHERE country.Continent=:continent";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindParam("continent", $continent);
        $prepareStatement->execute();
        $prepareStatement->setFetchMode(PDO::FETCH_CLASS, 'Country');
        //$prepareStatement->execute();
        //$list_ville = $prepareStatement->fetchObject("City");
        $country_list = [];
        foreach ($prepareStatement as $country) {
            $country_list[] = $country;
        }
        return $country_list;
    }

    public function findByName(string $name): array
    {
        $SQL = "SELECT * FROM country WHERE country.Name=:name";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindParam("name", $name);
        $prepareStatement->execute();
        $prepareStatement->setFetchMode(PDO::FETCH_CLASS, 'Country');
        //$prepareStatement->execute();
        //$list_ville = $prepareStatement->fetchObject("City");
        $country_list = [];
        foreach ($prepareStatement as $country) {
            $country_list[] = $country;
        }
        return $country_list;
    }
    public function findByNameStartingWith(string $pattern): array
    {
        $SQL = "SELECT * FROM country WHERE country.Name LIKE :name '%'";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("name", $pattern);
        $prepareStatement->execute();
        $prepareStatement->setFetchMode(PDO::FETCH_CLASS, 'Country');
        //$prepareStatement->execute();
        //$list_ville = $prepareStatement->fetchObject("City");
        $country_list = [];
        foreach ($prepareStatement as $country) {
            $country_list[] = $country;
        }
        return $country_list;
    }
}
