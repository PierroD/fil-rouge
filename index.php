<?php

//https://www.youtube.com/watch?v=tbYa0rJQyoM
//https://www.youtube.com/watch?v=-iW6lo6wq1Y
//https://openclassrooms.com/fr/courses/2078536-developpez-votre-site-web-avec-le-framework-symfony2-ancienne-version/2079345-le-routeur-de-symfony2
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Renderer.php';
require_once $_SERVER['DOCUMENT_ROOT'] .  '/src/Controller/CityController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Controller/CountryController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Controller/CountryLanguageController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Controller/UserController.php';

// echo "<pre>" . print_r($_SERVER, true) . "<pre>";

if (isset($_SERVER["PATH_INFO"])) {
    $path = trim($_SERVER["PATH_INFO"], "/");
} else {
    $path = "";
}

$fragments = explode("/", $path);

//var_dump($fragment);

$control = array_shift($fragments);
switch ($control) {
    case '': { //l'url est /
            $e = Renderer::render("index");
            echo $e;
            break;
        }
    case "city": {
            // echo "Gestion des routes pour city <hr>";
            //calling function to prevend all hard code here
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                cityRoutes_get($fragments);
            } else {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    cityRoutes_post($fragments);
                }
            }
            break;
        }
    case "country": {
            // echo "Gestion des routes pour country<hr>";
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                countryRoutes_get($fragments);
            } else {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    countryRoutes_post($fragments);
                }
            }
            // Aisa, Europe, North America, Africa, Oceania, Antarctica, South America
            break;
        }
    case "login": {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                loginRoutes_post($fragments);
            }
            $e = Renderer::render("login");
            echo $e;
            break;
        }
    case "disconnect": {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                session_start();
                session_destroy();
                header("location: http://127.0.0.1:8080");
                break;
            }
        }

    default: {
            $e = Renderer::render("404");
            echo $e;
        }
}

function countryRoutes_get($fragments)
{

    $action = array_shift($fragments);
    $country = end($fragments);
    $send_country[] = end($fragments);
    switch ($action) {
        case "show": {
                if ($country == "Europe" || $country == "North America"  || $country == "South America"  || $country == "Asia"  || $country == "Oceania"  || $country == "Antarctica"  || $country == "Africa") {
                    call_user_func_array(["CountryController", "showCountries"], $fragments);
                } else {
                    call_user_func_array(["CountryController", "showCountry"], $send_country);
                    call_user_func_array(["CountryLanguageController", "showCountryLanguages"], $send_country);
                    call_user_func_array(["CityController", "showCitiesinCountry"], $send_country);
                }
                break;
            }
        case "demo": {
                echo "$action <hr>";
                echo "$country <hr>";
                echo "calling countryController->show <hr>";
                break;
            }
        case "update": {
                call_user_func_array(["CountryController", "showUpdateCountry"], $fragments);
                break;
            }
        case "delete": {
                call_user_func_array(["CityController", "deleteAllForCountry"], $fragments); // delete all city
                call_user_func_array(["CountryLanguageController", "deleteAllForCountry"], $fragments); // delete all countrylanguage
                call_user_func_array(["CountryController", "deleteCountry"], $fragments); // delete the country
                header("location: http://127.0.0.1:8080/");
                break;
            }
    }
}

function cityRoutes_get($fragments)
{

    $action = array_shift($fragments);
    $end_ = end($fragments);
    $end_fragment[] = end($fragments);
    switch ($action) {
        case "show": {
                call_user_func_array(["CityController", "showCity"], $fragments);
                break;
            }
        case "delete": {
                call_user_func_array(["CityController", "deleteCity"], $fragments);
                header("location: http://127.0.0.1:8080/");
                break;
            }
        case "update": {
                call_user_func_array(["CityController", "showUpdateCity"], $fragments);
                break;
            }
        case "demo": {
                echo "$action <hr>";
                echo "$end_ <hr>";
                echo "calling countryController->show <hr>";
                break;
            }
    }
}

function cityRoutes_post($fragments)
{
    $action = array_shift($fragments);
    switch ($action) {
        case "update": {
                //echo $fragments[0];
                call_user_func_array(["CityController", "updateCity"], $fragments);
                header("location: http://127.0.0.1:8080/city/show/" . $fragments[0]);
                break;
            }
    }
}

function countryRoutes_post($fragments)
{
    $send_country[] = end($fragments);
    $action = array_shift($fragments);
    switch ($action) {
        case "update": {
                //echo $fragments[0];
                call_user_func_array(["CountryController", "updateCountry"], $fragments);
                header("location: http://127.0.0.1:8080/country/show/" . $fragments[0]);
                break;
            }
        case "show": {
                call_user_func_array(["CountryController", "createCountry"], $send_country);
                break;
            }
    }
}

function loginRoutes_post($fragments)
{
    call_user_func_array(["UserController", "TryAuth"], $fragments);
    header("location: http://127.0.0.1:8080/");
}
