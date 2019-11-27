<?php
if (isset($_POST["submit"])) { }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../public_html/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <title>Login</title>
</head>

<?php
include "Navbar.Template.php";
?>

<body>
    <div class="card card-default card-body container mt-5 w-50">
        <h3 class="mx-auto text-center text-primary "><i class="fas fa-user-lock fa-lg"></i></h3>
        <form method="post" action="">
            <div class="form-group mx-auto w-50">
                <div class="text-center">
                    <h4 for="exampleInputEmail1">Identifiant</h4>
                </div>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Login" name="username">
            </div>
            <div class="form-group mx-auto w-50">
                <div class="text-center">
                    <h4 for="exampleInputPassword1">Password</h4>
                </div>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            </div>
            <div class="mx-auto text-center">
                <button type="submit" class="btn btn-primary">LOGIN</button>
            </div>
        </form>
    </div>
</body>

</html>