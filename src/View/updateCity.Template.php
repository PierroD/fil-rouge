<?php
if (isset($_POST["submit"])) {
    $name = htmlspecialchars($_POST["Name"]);
    $countrycode = htmlspecialchars($_POST["CountryCode"]);
    $district = htmlspecialchars($_POST["District"]);
    $population = htmlspecialchars($_POST["Population"]);
}
?>

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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><i class="fas fa-globe-europe"></i> WorldData</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<body>

    <div class="container mt-5">
        <form action="" method="post">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Name : </span>
                </div>
                <input type="text" class="form-control" required placeholder="<?= $city->getName(); ?>" name="Name" aria-describedby="basic-addon1" value="<?= $city->getName(); ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Country Code : </span>
                </div>
                <input type="text" class="form-control" required placeholder="<?= $city->getCountryCode(); ?>" name="CountryCode" aria-describedby="basic-addon1" value="<?= $city->getCountryCode(); ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">District : </span>
                </div>
                <input type="text" class="form-control" required placeholder="<?= $city->getDistrict(); ?>" name="District" aria-describedby="basic-addon1" value="<?= $city->getDistrict(); ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Population : </span>
                </div>
                <input type="text" class="form-control" required placeholder="<?= $city->getPopulation(); ?>" name="Population" aria-describedby="basic-addon1" value="<?= $city->getPopulation(); ?>">
            </div>
            <button class="btn btn-success btn-lg btn-block" type="submit" name="submit">Enregistrer</button>
        </form>
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