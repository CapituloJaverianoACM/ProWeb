<?php
session_start();
include_once '../config/Database.php';
include_once '../models/ClientModel.php';
include_once '../models/GuestModel.php';
include_once '../models/AdminConstant.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$client = new ClientModel($db);
$guest = new GuestModel($db);
$admin_constant = new AdminConstant($db);

$_SESSION['guest_credit_fee'] = $admin_constant->getGuestCreditFee();

if (isset($_POST['client']) and $_POST['username'] != null) {
    $client->username = $_POST['username'];
    $client->password = $_POST['password'];
    if ($client->checkUserLogin()) {
        if (!isset($_SESSION['username'])) {
            $_SESSION['username'] = $client->username;
            $_SESSION['user_id'] = $client->id;
            $_SESSION['isAdmin'] = $client->isAdmin;
        }
        header('Location: ../views/profile.php');
    } else {
        echo 'Access Denied';
    }
}

if (isset($_POST['guest'])) {
    print_r($_POST);
    $guest->cedula = $_POST['cedula'];
    $guest->email = $_POST['guest_email'];
    $_SESSION['cedula'] = $_POST['cedula'];
    $_SESSION['guest_email'] = $_POST['guest_email'];
    $guest->createGuest();
    header('Location: ../views/profileVisitor.php');
}

