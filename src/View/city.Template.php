<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./../../public_html/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title><?= $city->getName(); ?></title>
</head>

<?php
include "Navbar.Template.php";
?>

<body>
    <div class="container mt-5">
        <div class="card mx-auto text-center border-primary">
            <div class="card-header">
                <h5 class="card-title font-weight-bold">City Name : <?= $city->getName(); ?></h5>
            </div>
            <div class="card-body">

                <h6 class="card-subtitle mb-2 text-muted">Country Code : <?= $city->getCountryCode(); ?></h6>
                <p class="card-text text-primary">Disctrict : <?= $city->getDistrict(); ?> <br />
                    Poupulation : <?= $city->getPopulation(); ?>
                </p>

            </div>
        </div>
    </div>
</body>
<footer>
    <div class="mt-5">
        <div class="card card-body">
            <h3 class="text-center"><i class="fas fa-globe-europe"></i> WorldData</h3>
        </div>
    </div>
</footer>

</html>