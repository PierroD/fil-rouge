<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Renderer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Model/DAOCountryLanguage.php';
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
        $dao_city =  new DAOCity(Singleton::getInstance()->cnx);
        /*
    print("<pre>" . print_r($_SERVER, true) . "</pre>");
    */


        /* test find /  Ok !
    $city = $dao_city->find(1);
    echo "city_name : " . $city->getName();
    */

        // test count    Ok !
        /*   $city = $dao_city->count();
        echo "nombre de city : $city";
        */

        // test find by name    Ok !
        /*
        $citi = $dao_city->findByName("Kabul");
        foreach ($citi as $city) {
            echo "comme ville il y a  : " . $city->getName() . " <br/>";
        }
        */

        // test find by name starting    Ok !
        /*
        $citi = $dao_city->findByNameStartingWith("Par");
        foreach ($citi as $city) {
            echo "comme ville il y a  : " . $city->getName() . " <br/>";
        }
        */

        // test find by country

        /* test find all   Ok !
    $citi = $dao_city->findAll();
    foreach ($citi as $city) {
        echo "comme ville il y a  : " . $city->getName() . " <br/>";
    }
    */
        // *dao countrylangauge
        $dao_cl = new DAOCountryLanguage(Singleton::getInstance()->cnx);
        /*$cl = $dao_cl->find(11); // * find Ok !
          var_dump($cl);*/

        /*$cl_l = $dao_cl->findFromCountry(2); // * find from a country ID Ok !
        var_dump($cl_l);

        foreach ($cl_l as $cl) {
            echo "comme langage il y a  : " . $cl->getLanguage() . " <br/>";
        }*/
        /*
        $cl_list = $dao_cl->findFromCountry(2);
        print("<pre>" . print_r($cl_list, true) . "</pre>");

        foreach ($cl_list as $cl) {
            $dao_cl->remove($cl);
        }
        var_dump($cl_list);
        */

        ?>
    </test>

</body>


</html>