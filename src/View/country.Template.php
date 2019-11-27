<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../public_html/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <title>Cities</title>
</head>

<?php
include "Navbar.Template.php";
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-5 mt-3 container text-center">
        <li class="breadcrumb-item"><a class="text-decoration-none" href="http://127.0.0.1:8080/">Home</a></li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="http://127.0.0.1:8080/country/show/<?= $country->getContinent(); ?>"><?= $country->getContinent(); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $country->getName(); ?></li>
    </ol>
</nav>

<body>
    <h1 class="text-center mb-4 display-4"> <?= $country->getName(); ?> - <span class="text-primary"><?= $country->getCode(); ?></span></h1>

    <div class="row mx-auto mb-5">
        <div class="col-6">
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">Country ID</th>
                        <td><?= $country->getCountryId(); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Code</th>
                        <td><?= $country->getCode(); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Name</th>
                        <td><?= $country->getName(); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Continent</th>
                        <td><?= $country->getContinent(); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Région</th>
                        <td><?= $country->getRegion(); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Superficie</th>
                        <td><?= $country->getSurfaceArea(); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Année Indépendance</th>
                        <td><?= $country->getIndepYear(); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Population</th>
                        <td><?= $country->getPopulation(); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Espérence de vie</th>
                        <td><?= $country->getLifeExpectancy(); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">GNP</th>
                        <td><?= $country->getGNP(); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">GNPOld</th>
                        <td><?= $country->getGNPOld(); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Nom Local</th>
                        <td><?= $country->getLocalName(); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Gouvernement</th>
                        <td><?= $country->getGovernmentForm(); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Chef du pays</th>
                        <td><?= $country->getHeadOfState(); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Nombre de capitals</th>
                        <td><?= $country->getCapital(); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Code2</th>
                        <td><?= $country->getCode2(); ?></td>
                    </tr>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <div class="row justify-content-center align-items-center">
                <img src="<?= $country->getImage2(); ?>" height="350" width="550" />
            </div>