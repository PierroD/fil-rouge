<?php
session_start();
?>
<nav class=" navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><i class="fas fa-globe-europe"></i> WorldData</a>
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
                <?php
                if (!isset($_SESSION["user"]["id"])) {
                    ?>
                    <a class="nav-link text-primary" href="http://127.0.0.1:8080/login" tabindex="-1" aria-disabled="true">Login</a>
                <?php
                } else { ?>
                    <a class="nav-link text-danger" href="http://127.0.0.1:8080/disconnect" tabindex="-1" aria-disabled="true">Disconnect</a>
                <?php
                } ?> </li>
        </ul>
    </div>
</nav>