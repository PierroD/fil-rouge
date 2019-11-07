<?php
if (isset($_POST["submit"])) { }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./../../public_html/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title><?= $country->getName(); ?></title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="http://127.0.0.1:8080/"><i class="fas fa-globe-europe"></i> WorldData</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="http://127.0.0.1:8080/">Home <span class="sr-only">(current)</span></a>
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
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">Country ID</th>
                        <td><input type="text" class="form-control" name="Country_Id" placeholder="<?= $country->getCountryID(); ?>" value="<?= $country->getCountryID(); ?>" aria-label="Username" aria-describedby="basic-addon1"></td>
                    </tr>
                    <tr>
                        <th scope="row">Code</th>
                        <td><input type="text" class="form-control" name="Code" placeholder="<?= $country->getCode(); ?>" value="<?= $country->getCode(); ?>" aria-label="Username" aria-describedby="basic-addon1"></td>

                    </tr>
                    <tr>
                        <th scope="row">Name</th>
                        <td><input type="text" class="form-control" name="Name" placeholder="<?= $country->getName(); ?>" value="<?= $country->getName(); ?>" aria-label="Username" aria-describedby="basic-addon1"></td>

                    </tr>
                    <tr>
                        <th scope="row">Continent</th>
                        <td><input type="text" class="form-control" name="Continent" placeholder="<?= $country->getContinent(); ?>" value="<?= $country->getContinent(); ?>" aria-label="Username" aria-describedby="basic-addon1"></td>

                    </tr>
                    <tr>
                        <th scope="row">Région</th>
                        <td><input type="text" class="form-control" name="Region" placeholder="<?= $country->getRegion(); ?>" value="<?= $country->getRegion(); ?>" aria-label="Username" aria-describedby="basic-addon1"></td>

                    </tr>
                    <tr>
                        <th scope="row">Superficie</th>
                        <td><input type="text" class="form-control" name="SurfaceArea" placeholder="<?= $country->getSurfaceArea(); ?>" value="<?= $country->getSurfaceArea(); ?>" aria-label="Username" aria-describedby="basic-addon1"></td>

                    </tr>
                    <tr>
                        <th scope="row">Année Indépendance</th>
                        <td><input type="text" class="form-control" name="IndepYear" placeholder="<?= $country->getIndepYear(); ?>" value="<?= $country->getIndepYear(); ?>" aria-label="Username" aria-describedby="basic-addon1"></td>

                    </tr>
                    <tr>
                        <th scope="row">Population</th>
                        <td><input type="text" class="form-control" name="Population" placeholder="<?= $country->getPopulation(); ?>" value="<?= $country->getPopulation(); ?>" aria-label="Username" aria-describedby="basic-addon1"></td>

                    </tr>
                    <tr>
                        <th scope="row">Espérence de vie</th>
                        <td><input type="text" class="form-control" name="LifeExpectancy" placeholder="<?= $country->getLifeExpectancy(); ?>" value="<?= $country->getLifeExpectancy(); ?>" aria-label="Username" aria-describedby="basic-addon1"></td>

                    </tr>
                    <tr>
                        <th scope="row">GNP</th>
                        <td><input type="text" class="form-control" name="GNP" placeholder="<?= $country->getGNP(); ?>" value="<?= $country->getGNP(); ?>" aria-label="Username" aria-describedby="basic-addon1"></td>

                    </tr>
                    <tr>
                        <th scope="row">GNPOld</th>
                        <td><input type="text" class="form-control" name="GNPold" placeholder="<?= $country->getGNPOld(); ?>" value="<?= $country->getGNPOld(); ?>" aria-label="Username" aria-describedby="basic-addon1"></td>

                    </tr>
                    <tr>
                        <th scope="row">Nom Local</th>
                        <td><input type="text" class="form-control" name="LocalName" placeholder="<?= $country->getLocalName(); ?>" value="<?= $country->getLocalName(); ?>" aria-label="Username" aria-describedby="basic-addon1"></td>

                    </tr>
                    <tr>
                        <th scope="row">Gouvernement</th>
                        <td><input type="text" class="form-control" name="GovernmentForm" placeholder="<?= $country->getGovernmentForm(); ?>" value="<?= $country->getGovernmentForm(); ?>" aria-label="Username" aria-describedby="basic-addon1"></td>

                    </tr>
                    <tr>
                        <th scope="row">Chef du pays</th>
                        <td><input type="text" class="form-control" name="HeadOfState" placeholder="<?= $country->getHeadOfState(); ?>" value="<?= $country->getHeadOfState(); ?>" aria-label="Username" aria-describedby="basic-addon1"></td>

                    </tr>
                    <tr>
                        <th scope="row">ID de la capitale</th>
                        <td><input type="text" class="form-control" name="Capital" placeholder="<?= $country->getCapital(); ?>" value="<?= $country->getCountryID(); ?>" aria-label="Username" aria-describedby="basic-addon1"></td>

                    </tr>
                    <tr>
                        <th scope="row">Code2</th>
                        <td><input type="text" class="form-control" name="Code2" placeholder="<?= $country->getCode2(); ?>" value="<?= $country->getCountryID(); ?>" aria-label="Username" aria-describedby="basic-addon1"></td>

                    </tr>
                    <tr>
                        <th scope="row">Drapeau : </th>
                        <td>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><img src="<?= $country->getImage2(); ?>" height="20" width="35" /></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Lien d'un nouveau drapeau" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </td>

                    </tr>
                </tbody>
            </table>
            <button class="btn btn-success btn-lg btn-block">Enregistrer</button>
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