<?php
include_once '../controllers/adminController.php';
$credits = $_SESSION['all_credits'];
$credit_cards = $_SESSION['all_credit_cards'];
if(!$_SESSION['isAdmin']) {
    header('Location: ../views/signin.php');
}
$jsScript = "";
if (isset($_SESSION['response'])) {
    $jsScript .= '<script> alert("' . $_SESSION['response'] . '")</script>';
    echo $jsScript;
    unset($_SESSION['response']);
}
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

    <title>Admin</title>
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
    <h1 class="display-4">Administración de Creditos y Tarjetas de Credito</h1>
    <p class="lead">Aquí podras aprobar o editar las solicitudes hechas por los clientes.</p>
</div>

<div class="container">
    <form class="form" action="../controllers/adminController.php" method="post">
        <div class="form-group">
            <label for="credit_id">ID Credito</label>
            <select placeholder="ID Credito" name="credit_id" class="form-control" id="sel1" required>
                <?php
                foreach ($credits as $key => $value) {
                    $id = $value['id'];
                    echo '<option>' . $id . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="submit-btn btn btn-warning">Ver Solicitud</button>
        </div>
    </form>
    <form class="form" action="../controllers/adminController.php" method="post">
        <div class="form-group">
            <label for="credit_id">ID Tarjeta Credito</label>
            <select placeholder="ID Tarjeta" name="credit_card_id" class="form-control" id="credit_id" required>
                <?php
                foreach ($credit_cards as $key => $value) {
                    $id = $value['id'];
                    echo '<option>' . $id . '</option>';
                }
                ?>
            </select>
        </div>
        <button type="submit" class="submit-btn btn btn-warning">Ver Solicitud</button>
    </form>
    <form class="form" action="../controllers/adminController.php" method="post">
        <div class="form-group">
            <label for="credit_id">Tasa Credito Para Visitantes</label>
            <input required class="form-control"  max="1.0" step=".01" name="guest_credit_fee" type="number" value="<?php echo number_format($_SESSION['guest_credit_fee'],2)?>" required>
            <label for="credit_id">Tasa Interes Cuenta Ahorros</label>
            <input required class="form-control"  max="1.0" step=".01" name="default_savings_interest" type="number" value="<?php echo number_format($_SESSION['default_savings_interest'],2)?>" required>
            <label for="credit_id">Costo Transferencia Entre Bancos</label>
            <input required class="form-control" name="transfer_cost" type="number" value="<?php echo number_format($_SESSION['transfer_cost'],2)?>" required>
        </div>
        <button type="submit" name="admin_constants" class="submit-btn btn btn-primary">Actualizar Valor</button>
    </form>
    <a class="submit-btn btn btn-info" href="administrateClients.php" role="button">Administrar Usuarios</a>
    <a class="submit-btn btn btn-success" href="../controllers/endMonthController.php" role="button">Fin de Mes</a>
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
