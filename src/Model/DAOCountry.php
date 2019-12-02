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
    /**
     * Find
     *
     * @param [type] $id
     * @return Country
     */
    public function find($id): Country
    {
        // $cnx = Singleton::getInstance()->cnx;
        $SQL = "SELECT * FROM country WHERE Country_Id=:id";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("id", $id);
        $prepareStatement->execute();
        $pays = $prepareStatement->fetchObject("Country");
        return $pays;
    }
    /**
     * Save
     *
     * @param Country $country
     * @return void
     */
    public function save(Country $country): void // * Create
    {
        $SQL = "INSERT INTO country(Code, Name, Continent, Region, SurfaceArea, IndepYear, Population, LifeExpectancy, GNP, GNPOld, LocalName, GovernmentForm, HeadOfState, Capital, Code2, Image1, Image2) VALUES($country->getCode(), $country->getName(), $$country->getContient(), $country->getRegion(), $country->getSurfaceArea(), $country->getIndepYear(), $country->getPopulation(), $country->getLifeExpectancy(), $country->getGNP(), $country->getGNPOld(), $country->getLocalName(), $country->getGovernmentForm(), $country->getHeadOfState(), $country->getCapital(), $country->getCode2(), $country->getImage1(), $country->getImage2()";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->execute();
    }
    /**
     * update
     *
     * @param Country $country
     * @return void
     */
    public function update(Country $country): bool // * Update
    {
        $SQL = "UPDATE country SET Code = :code, Name = :names, Continent = :continent, Region = :region, SurfaceArea = :surfaceArea, IndepYear = :indepYear, Population = :populations, LifeExpectancy = :lifeExpectancy, GNP = :gnp, GNPOld = :gnpOld, LocalName= :localName, GovernmentForm = :government, HeadOfState = :headOfState, Capital = :capital, Code2 = :code2 WHERE Country_Id = :cid;";

        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("code", $country->getCode());
        $prepareStatement->bindValue("names", $country->getName());
        $prepareStatement->bindValue("continent", $country->getContinent());
        $prepareStatement->bindValue("region", $country->getRegion());
        $prepareStatement->bindValue("surfaceArea", $country->getSurfaceArea());
        $prepareStatement->bindValue("indepYear", $country->getIndepYear());
        $prepareStatement->bindValue("populations", $country->getPopulation());
        $prepareStatement->bindValue("lifeExpectancy", $country->getLifeExpectancy());
        $prepareStatement->bindValue("gnp", $country->getGNP());
        $prepareStatement->bindValue("gnpOld", $country->getGNPOld());
        $prepareStatement->bindValue("localName", $country->getLocalName());
        $prepareStatement->bindValue("government", $country->getGovernmentForm());
        $prepareStatement->bindValue("headOfState", $country->getHeadOfState());
        $prepareStatement->bindValue("capital", $country->getCapital());
        $prepareStatement->bindValue("code2", $country->getCode2());
        $prepareStatement->bindValue("cid", $country->getCountryId());

        $upd_country = $prepareStatement->execute();
        var_dump($upd_country);
        return $upd_country;
    }
    /**
     * remove
     *
     * @param Country $country
     * @return void
     */
    public function remove(Country $country): bool // * Delete
    {
        $SQL = "DELETE FROM country WHERE Country_Id=:id";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("id", $country->getCountryId());
        return $prepareStatement->execute();
    }
    /**
     * findAll 
     *
     * @return array
     */
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
    /**
     * count
     *
     * @return integer
     */
    public function count(): int
    {
        $SQL = "SELECT COUNT(Country_Id) FROM country";
        $prepareStatement = $this->cnx->query($SQL);
        //$pre1pareStatement->execute();
        $country_count = $prepareStatement->fetchColumn(); //setFetchMode(PDO::FETCH_CLASS, 'City');
        //echo $city_count;
        return $country_count;
    }
    /**
     * findFromCity
     *
     * @param City $city
     * @return array
     */
    public function findFromCity(City $city): array
    {
        $SQL = "SELECT * FROM city, country WHERE (city.CountryCode=country.Code AND city.Name=:name)";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("name", $city->getName());
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
    /**
     * findByContinent 
     *
     * @param string $continent
     * @return array
     */
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
