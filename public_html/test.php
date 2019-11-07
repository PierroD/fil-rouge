<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Renderer.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page test</title>
</head>

<body>
    <test>
        <?php
        // TODO put your code here
        require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Model/DAOCity.php';
        // $city = getCityById(1);
        // ! en cas de pb var_dump($city);
        /*
    echo "nom : " .$city->Name;
    echo "<br/>";
    echo "nom : " .$city->getNom();
    */
        // * instance de DAO_City
        $dao_city = new DAOCity(Singleton::getInstance()->cnx);

        /*
    print("<pre>" . print_r($_SERVER, true) . "</pre>");
    */


        /* test find /
    $city = $dao_city->find(1);
    echo "city_name : " . $city->getName();
    */

        // test count 
        /*   $city = $dao_city->count();
        echo "nombre de city : $city";
        */

        // test find by name 
        /*
        $citi = $dao_city->findByName("Kabul");
        foreach ($citi as $city) {
            echo "comme ville il y a  : " . $city->getName() . " <br/>";
        }
        */

        // test find by name starting 
        /*
        $citi = $dao_city->findByNameStartingWith("Par");
        foreach ($citi as $city) {
            echo "comme ville il y a  : " . $city->getName() . " <br/>";
        }
        */

        // test find by country

        /* test find all
    $citi = $dao_city->findAll();
    foreach ($citi as $city) {
        echo "comme ville il y a  : " . $city->getName() . " <br/>";
    }
    */
        ?>
    </test>

</body>


</html>