<?php
if (isset($_POST["submit"])) { }

//paginator
if (!isset($_GET["page"]) || $_GET["page"] == 0) {
    $page = 1;
} else {
    $page = $_GET["page"];
}
$for_min = ($page - 1) * 10;
$for_max = $page * 10;
$paginator_lenght = count($cities);
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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<body>
    <h1 class="text-center mb-4 display-4"> City list (<span class="text-primary"><?= $paginator_lenght ?></span>) </h1>

    <table class="table container mx-center mb-5">
        <thead class="thead-dark">
            <tr class="text-center">
                <th scope="col">Nom</th>
                <th scope="col">Country Code</th>
                <th scope="col">Population</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = $for_min; $i < $for_max; $i++) {
                //echo $i;
                if ($i < $paginator_lenght) {
                    ?>
                    <tr class="text-center">
                        <td><a class="text-primary text-decoration-none font-weight-bold" href="http://127.0.0.1:8080/city/show/<?= $cities[$i]->getCityID(); ?>"><?= $cities[$i]->getName(); ?></a></td>
                        <td><?= $cities[$i]->getCountryCode(); ?></td>
                        <td><?= $cities[$i]->getPopulation(); ?></td>
                        <?php if (isset($_SESSION["user"]["id"])) {
                                    ?>
                            <td class="text-center">
                                <?php
                                            $test = $_SESSION["user"]["permission"];
                                            if ($test[2] == 49) { ?>
                                    <a class="btn btn-success mr-2" href="http://127.0.0.1:8080/city/update/<?= $cities[$i]->getCityID(); ?>"><i class="far fa-edit" style="color:#fff"></i></a>
                                <?php
                                            }

                                            if ($test[1] == 49) {
                                                ?>
                                    <a class="btn btn-danger ml-2" href="http://127.0.0.1:8080/city/delete/<?= $cities[$i]->getCityID(); ?>"><i class="fas fa-trash" style="color:#fff"></i></a>
                                <?php
                                            }
                                            ?>
                            </td>
                        <?php
                                }
                                ?>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <!-- création ville-->
    <?php
    if ($test[3] == 49) {
        ?>
        <div class="card card-default border-primary mb-5 mt-5 container">
            <h5 class="card-header text-center text-primary font-weight-bold">Création de table</h5>
            <div class="card-body container text-center">
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Name : </span>
                        </div>
                        <input type="text" class="form-control" required placeholder="" name="Name" aria-describedby="basic-addon1" value="">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">District : </span>
                        </div>
                        <input type="text" class="form-control" required placeholder="" name="District" aria-describedby="basic-addon1" value="">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Population : </span>
                        </div>
                        <input type="text" class="form-control" required placeholder="" name="Population" aria-describedby="basic-addon1" value="">
                    </div>
                    <button class="btn btn-primary btn-block"><i class="fas fa-hammer fa-flip-horizontal" name="submit"></i> Create City <i class="fas fa-hammer"></i></button>
                </form>
            </div>
        </div>
    <?php
    }
    ?>
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