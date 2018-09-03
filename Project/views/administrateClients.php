<?php
include_once '../controllers/administrateClientsController.php';
if(!$_SESSION['isAdmin']) {
    header('Location: ../views/signin.php');
}
$all_clients = $_SESSION['all_clients'];
unset($_SESSION['all_clients']);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/savingsAccount.css">

    <title>Administrate Users</title>
</head>
<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">J&A Bank</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="./profile.php">Perfil</a>
        <a class="p-2 text-dark" href="./savingsAccount.php">Cuenta de Ahorros</a>
        <a class="p-2 text-dark" href="./credits.php">Creditos</a>
        <a class="p-2 text-dark" href="./creditCard.php">Tarjetas de Creditos</a>
        <a class="p-2 text-dark" href="./messages.php">Mensajes</a>
        <?php if($_SESSION['isAdmin']) echo '<a class="p-2 text-dark" href="./admin.php">Admin</a>';?>
    </nav>
    <a class="btn btn-outline-danger" href="../controllers/logoutController.php">Logout</a>
</div>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Administrar Usuarios</h1>
    <p class="lead">Selecciona el usuario que quieres administrar.</p>
</div>

<div class="container">
    <form class="form" action="../controllers/administrateClientsController.php" method="post">
        <div class="row">
            <div class="col-8 form-group">
                <select placeholder="ID del Usuario" name="username" class="form-control" id="sel1" required>
                    <?php
                    foreach ($all_clients as $key => $value) {
                        $id = $value['username'];
                        echo '<option>'. $id .'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-4 form-group">
                <button type="submit" class="submit-btn btn btn-warning">Administrar</button>
            </div>
        </div>
    </form>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>