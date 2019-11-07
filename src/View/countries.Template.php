<?php
//paginator
if (!isset($_GET["page"]) || $_GET["page"] == 0) {
    $page = 1;
} else {
    $page = $_GET["page"];
}
$for_min = ($page - 1) * 10;
$for_max = $page * 10;
$paginator_lenght = count($countries);
$number_pages = 0;
if ($paginator_lenght % 10 != 0) {
    $number_pages = floor(($paginator_lenght / 10)) + 1;
} else {
    $number_pages = floor(($paginator_lenght / 10));
}
if (($page + 2) <= $number_pages) {
    $pages_max = $page + 2;
} else {
    $pages_max = $number_pages;
}
if (($page - 2) >= 1) {
    $pages_min = $page - 2;
} else {
    $pages_min = 1;
}
//paginator 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../public_html/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Country</title>
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
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


<nav aria-label="breadcrumb">
    <ol class="breadcrumb  mb-5 container text-center">
        <li class="breadcrumb-item"><a class="text-decoration-none" href="http://127.0.0.1:8080/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $countries[0]->getContinent(); ?></li>
    </ol>
</nav>


<body>
    <h1 class="text-center mb-4 display-4"> Country list (<span class="text-primary"><?= $paginator_lenght ?></span>) </h1>
    <table class="table container mx-center mb-5">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Continent</th>
                <th scope="col">ID Capital</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = $for_min; $i < $for_max; $i++) {
                //echo $i;
                if ($i < $paginator_lenght) {
                    ?>
                    <tr>
                        <th scope="row"><img src="<?= $countries[$i]->getImage2(); ?>" height="20" width="35" /></th>
                        <td><a class="text-primary text-decoration-none font-weight-bold" href="http://127.0.0.1:8080/country/show/<?= $countries[$i]->getContinent(); ?>/<?= $countries[$i]->getCountryId(); ?>"><?= $countries[$i]->getName(); ?></a></td>
                        <td><?= $countries[$i]->getContinent(); ?></td>
                        <td><?= $countries[$i]->getCapital(); ?></td>
                        <td class="text-center"><a class="btn btn-success mr-2" href="http://127.0.0.1:8080/country/update/<?= $countries[$i]->getCountryId(); ?>"><i class="far fa-edit" style="color:#fff"></i></a><a class="btn btn-danger ml-2" href="http://127.0.0.1:8080/country/delete/<?= $countries[$i]->getCountryID(); ?>"><i class="fas fa-trash" style="color:#fff"></i></a></td>

                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

    <!-- paginator -->
    <nav aria-label="...">
        <ul class="pagination pagination-lg d-flex justify-content-center ">
            <li class="page-item">
                <a class="page-link" href="?page=<?= 1 ?>" aria-label="Next">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php
            //previous pagniation button
            if (($page - 1) > 0) { ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= ($page - 1) ?>">Previous</a>
                </li>
            <?php
            } else {
                ?>
                <li class="page-item disabled">
                    <a class="page-link" href="?page=<?= $page ?>">Previous</a>
                </li>
                <?php
                }
                //all the pagination button
                for ($j = $pages_min; $j <= $pages_max; $j++) {

                    if ($j == $page) {
                        ?>
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">
                            <?= $page ?>
                            <span class="sr-only">(current)</span>
                        </span>
                    </li>
                <?php } else {
                        ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $j ?>"><?= $j ?></a></li>
                <?php
                    }
                }
                //Next pagagination button
                if (($page + 1) <= $number_pages) { ?>

                <li class="page-item"><a class="page-link" href="?page=<?= ($page + 1) ?>">Next</a></li>
            <?php
            } else {
                ?>
                <li class="page-item disabled"><a class="page-link" href="?page=<?= $page ?>">Next</a></li>
            <?php
            }
            ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $number_pages ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- paginator -->


</body>

<footer>
    <div class="mt-5">
        <div class="card card-body">
            <h3 class="text-center"><i class="fas fa-globe-europe"></i> WorldData</h3>
        </div>
    </div>
</footer>


</html>