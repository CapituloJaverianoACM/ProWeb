<?php
session_start();
$username_to_edit = $_SESSION['user_to_edit'];
//unset($_SESSION['user_to_edit']);
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

    <link rel="stylesheet" href="./css/makePurchase.css">
    <title>Edit Client</title>
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
    <h1 class="display-4">Pricing</h1>
    <p class="lead">Edita los campos del usuario.</p>
</div>

<div class="container">
    <form action="../controllers/editClientController.php" method="post">
        <div class="form-group">
            <label for="id">ID Cliente</label>
            <input readonly type="number" name="id" class="form-control" value="<?php echo $username_to_edit['id']; ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" form-control" value="<?php echo $username_to_edit['username']; ?>" required>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-check text-center">
                    <input class="form-check-input" type="radio" name="isAdmin" id="exampleRadios1" value="1" <?php echo ($username_to_edit['isAdmin'] ? 'checked' : '')?>>
                    <label class="form-check-label" for="exampleRadios1">
                        Administrador
                    </label>
                </div>
            </div>
            <div class="col-6">
                <div class="form-check text-center">
                    <input class="form-check-input" type="radio" name="isAdmin" id="exampleRadios2" value="0" <?php echo ($username_to_edit['isAdmin'] ? '' : 'checked')?> >
                    <label class="form-check-label" for="exampleRadios2">
                        Regular
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <button type="submit" name="save" class="submit-btn btn btn-success">Confirmar</button>
            </div>
            <div class="col-6">
                <button type="submit" name="delete" class="submit-btn btn btn-danger">Eliminar</button>
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