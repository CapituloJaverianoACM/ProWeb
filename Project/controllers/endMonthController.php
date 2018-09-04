<?php
session_start();
include_once '../config/Database.php';
include_once '../models/CreditCardModel.php';
include_once '../models/CreditModel.php';
include_once '../models/GuestModel.php';
include_once '../models/SavingsAccountModel.php';

const fecha_corte = ['31-01-2018', '28-02-2018', '31-03-2018', '30-04-2018', '31-05-2018', '30-06-2018', '31-07-2018', '31-08-2018', '29-09-2018', '31-10-2018', '30-11-2018', '31-12-2018'];

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$credit_card = new CreditCardModel($db);
$saving_account = new SavingsAccountModel($db);
$credit = new CreditModel($db);

chargeCreditCardHandlingFee();
payInterestToSavingsAccounts();
payCredits();
verifyNonPaidCredits();
$_SESSION['response'] = "Fin de mes realizado!";
header('Location: ../views/admin.php');


function chargeCreditCardHandlingFee() {
    global $credit_card, $db;
    $all_cc = $credit_card->getAllCreditCards();
    foreach ($all_cc as $key => $value) {
        $handling_fee = $all_cc[$key]['handling_fee'];
        $saving_account = new SavingsAccountModel($db);
        $saving_account->id = $all_cc[$key]['savings_account_id'];
        $saving_account->getSavingAccountById();
        if($saving_account->balance - $handling_fee >= 0) {
            $saving_account->balance -= $handling_fee;
            $saving_account->updateAccount();
        } else {
            $saving_account->balance = 0;
            $saving_account->updateAccount();
        }
    }
}

function payInterestToSavingsAccounts() {
    $interest = $_SESSION['default_savings_interest']; // Or can be the one of the table
    global $saving_account, $db;
    $all_accounts = $saving_account->getAllAccounts();
    foreach ($all_accounts as $key => $value) {
        $curr_saving_account = new SavingsAccountModel($db);
        $curr_saving_account->id = $value['id'];
        $curr_saving_account->getSavingAccountById();
        $curr_saving_account->balance *= (1+ $interest);
        $curr_saving_account->updateAccount();
    }
}

function payCredits() {
    global $saving_account, $credit, $db;
    $all_credits = $credit->getAllCredits();
    foreach ($all_credits as $key => $value) {
        $saving_account->user_id = $value['user_id'];
        if($saving_account->getClientTotalMoney() >= $value['balance']) {
            $credit_to_pay = new CreditModel($db);
            $credit_to_pay->id = $value['id'];
            $credit_to_pay->getCreditById();
            $client_accounts = $saving_account->getAllClientsAccounts();
            $current_account_idx = 0;
            while($credit_to_pay->balance > 0) {
                $current_account = new SavingsAccountModel($db);
                $current_account->id = $client_accounts[$current_account_idx]['id'];
                $current_account->getSavingAccountById();
                if($current_account->balance >= $credit_to_pay->balance) {
                    $current_account->balance -= $credit_to_pay->balance;
                    $credit_to_pay->balance = 0;
                    $current_account->updateAccount();
                    $credit_to_pay->updateCredit();
                } else {
                    $current_account_idx++;
                    $credit_to_pay->balance -= $current_account->balance;
                    $current_account->balance = 0;
                    $credit_to_pay->updateCredit();
                    $current_account->updateAccount();
                }
            }
        }
        echo '<br>';
    }
    function verifyNonPaidCredits() {
        require_once('../PHPMailer_5.2.4/class.phpmailer.php');
        include("../PHPMailer_5.2.4/class.smtp.php");
        $corte_dt = new DateTime(fecha_corte[9]);
        $database = new Database();
        $db = $database->connect();
        $credit = new CreditModel($db);
        $updateCredit = new CreditModel($db);
        $guest = new GuestModel($db);
        foreach($guest->getAllGuests() as $value){
            $credit->guest_email = $value['email'];
            foreach($credit->getGuestAprovedCredits() as $row){
                if($row['pay_date'] <= $corte_dt && $row['balance'] == 0){
                }
                //Falta cuando el cliente pago despues de la fecha de pago pero antes de fin de mes
                else if ($row['pay_date'] > $corte_dt && $row['balance'] != 0) {
                    $updateCredit->guest_email= $row['email'];
                    $updateCredit->updateLoanAmount();
                    $mail  = new PHPMailer();
                    $body = "Buen día, a la fecha de corte usted aun no registra pago por su crédito, en J&A Bank,
                se aplicarán cargos de mora, te aconcejamos cancelar su crédito lo más pronto posible
                Cordialmente : El equipo de J&A Bank";
                    $mail->IsSMTP();
                    $mail->SMTPDebug  = 0;
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = "ssl";
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 465 ;
                    $mail->Username = "juantester007@gmail.com";
                    $mail->Password = "juandavid1@";
                    $mail->SetFrom('juantester007@gmail.com', 'Juan David Orozco');
                    $mail->Subject = "Crédito en Mora";
                    $mail->Body = $body ;
                    $mail->AddAddress($value['email'], "Apreciado".' '." Cliente");
                    if(!$mail->Send()) {
                        echo "Error !! -> " . $mail->ErrorInfo;
                    } else {
                        echo "Correo enviado con exito";
                    }

                }
            }
        }
    }
}


