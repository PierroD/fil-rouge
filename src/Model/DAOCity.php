
<?php

// ? bon
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Model/Singleton.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Model/City.php';
/*
function getCityById($id)
{
try {
    // ! pas bon 
    //  $cnx = new PDO("mysql:host=127.0.0.1;dbname=worlddb","worlduser","123+aze");

    // ? bon
    $cnx = Singleton::getInstance()->cnx;
  

    // * * requête forgée 
    // ! à ne pas faire 
    $SQL0 = "SELECT * FROM city WHERE City_Id=$id";
    // * * requête indexé
    // ! pas top
  
  //  $SQL1 = "SELECT * FROM city WHERE City_Id=?";
  //  $prepareStatement1 = $cnx->prepare($SQL1);
  //  $prepareStatement1->bindValue(1, $id);
  //  $prepareStatement1->execute();
  //  $ville1 = $prepareStatement1->fetch(); 
  
    // return $ville1;
    // * * requête paramètre nommée
    // ? bon 
    $SQL2 = "SELECT * FROM city WHERE City_Id=:id";
    $prepareStatement2 = $cnx->prepare($SQL2);
    $prepareStatement2->bindValue("id", $id);
    $prepareStatement2->execute();
    $ville2 = $prepareStatement2->fetchObject("City");
    return $ville2;
}

catch(Exception $e)
{
 // *  2 possibilitées si il y a une erreur (var_dump , print_r)
 echo "<pre>" . print_r($e, true) . "</pre>";
}
}
*/



class DAOCity
{
    private $cnx;
    function __construct($cnx)
    {
        // ? bon
        // ? $this->cnx = Singleton::getInstance()->cnx;
        $this->cnx = /*Singleton::getInstance()->cnx;*/ $cnx;
    }

    // * Tous les CRUD (nommé comme sur les frameworks): Create, Read, Update, Delete // save, get, update, remove

    public function find($id): City
    {
        //$cnx = Singleton::getInstance()->cnx;
        $SQL = "SELECT * FROM city WHERE City_Id=:id";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindParam("id", $id);
        $prepareStatement->execute();
        $ville = $prepareStatement->fetchObject("City");

        return $ville;
    }

    public function save(City $city): void // * Create
    {
        if ($city->getCityById() != 0) {
            $SQL = "INSERT INTO city(Name, CountryCode, District, Population) VALUES(:names, :CCode, :district, :populations";
            $prepareStatement = $this->cnx->prepare($SQL);
            $prepareStatement->bindValue("names", $city->getName());
            $prepareStatement->bindValue("CCode", $city->getCountryCode());
            $prepareStatement->bindValue("district", $city->getDistrict());
            $prepareStatement->bindValue("populations", $city->getPopulation());
            // $prepareStatement->bindValue("id", $city->getCityId());
            $prepareStatement->execute();
        }
        if ($prepareStatement == true) {
            $last_id = $this->cnx->LastInsertId();
            $city->setCityById($last_city);
        }
    }

    public function LastInsertId(): int
    {
        $SQL = "SELECT MAX(City_Id) FROM city";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->execute();
        $rtn = $prepareStatement->fetch();
        // echo $rtn;
        // die;
        return $rtn;
    }

    public function update(City $city): bool // * Update
    {
        $SQL = "UPDATE city SET Name =:names, CountryCode =:CCode, District =:district, Population =:populations WHERE City_Id =:id";
        // :names, CountryCode =:CCode, District =:district, Population =:populations WHERE City_Id =:id";
        //'TIRANA', CountryCode ='ALB', District='Tirana', Population='270000' WHERE City_Id =34";
        $prepareStatement = $this->cnx->prepare($SQL);

        $prepareStatement->bindValue("names", $city->getName());
        $prepareStatement->bindValue("CCode", $city->getCountryCode());
        $prepareStatement->bindValue("district", $city->getDistrict());
        $prepareStatement->bindValue("populations", $city->getPopulation());
        $prepareStatement->bindValue("id", $city->getCityId());
        $upd_city = $prepareStatement->execute();
        return $upd_city;
    }
    public function remove(City $city): bool // * Delete
    {
        $SQL = "DELETE FROM city WHERE City_Id=:id";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("id", $city->getCityId());
        //$city->setCityId();
        return $prepareStatement->execute();
    }

    public function findAll(): array
    {
        $SQL = "SELECT * FROM city";
        $prepareStatement = $this->cnx->query($SQL);
        $prepareStatement->setFetchMode(PDO::FETCH_CLASS, 'City');
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
        $SQL = "SELECT COUNT(City_Id) FROM city";
        $prepareStatement = $this->cnx->query($SQL);
        //$prepareStatement->execute();
        $city_count = $prepareStatement->fetchColumn(); //setFetchMode(PDO::FETCH_CLASS, 'City');
        //echo $city_count;
        return $city_count;
    }

    public function findFromCountry(Country $country): array
    {
        $SQL = "SELECT * FROM city, country WHERE (city.CountryCode=country.Code AND country.Code=:code)";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("code", $country->getCode());
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
    public function findByName(string $name): array
    {
        $SQL = "SELECT * FROM city WHERE city.Name=:name";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindParam("name", $name);
        $prepareStatement->execute();
        $prepareStatement->setFetchMode(PDO::FETCH_CLASS, 'City');
        //$prepareStatement->execute();
        //$list_ville = $prepareStatement->fetchObject("City");
        $cities_list = [];
        foreach ($prepareStatement as $city) {
            $cities_list[] = $city;
        }
        return $cities_list;
    }
    public function findByNameStartingWith(string $pattern): array
    {
        $SQL = "SELECT * FROM city WHERE city.Name LIKE :name '%'";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("name", $pattern);
        $prepareStatement->execute();
        $prepareStatement->setFetchMode(PDO::FETCH_CLASS, 'City');
        //$prepareStatement->execute();
        //$list_ville = $prepareStatement->fetchObject("City");
        $cities_list = [];
        foreach ($prepareStatement as $city) {
            $cities_list[] = $city;
        }
        return $cities_list;
    }

    public function findByCountryId($id): array
    {
        $SQL = "SELECT city.* FROM city, country WHERE city.CountryCode = country.Code AND country.Country_Id = :id ORDER BY city.Name ASC";
        $prepareStatement = $this->cnx->prepare($SQL);
        $prepareStatement->bindValue("id", $id);
        $prepareStatement->execute();
        $prepareStatement->setFetchMode(PDO::FETCH_CLASS, 'City');
        //$prepareStatement->execute();
        //$list_ville = $prepareStatement->fetchObject("City");
        $cities_list = [];
        foreach ($prepareStatement as $city) {
            $cities_list[] = $city;
        }
        return $cities_list;
    }
}
