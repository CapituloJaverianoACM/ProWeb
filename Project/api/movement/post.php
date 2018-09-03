<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


    #session_start();
    include_once '../../config/Database.php';
    include_once '../../models/CreditModel.php';
    include_once '../../models/SavingsAccountModel.php';
    include_once '../../models/MovementModel.php';
    include_once '../../models/TypeTransferEnum.php';

    $message = "Faltan parametros";
    http_response_code(400);

    $database = new Database();
    $db = $database->connect();


    $credit = new CreditModel($db);
    $account_destiny = new SavingsAccountModel($db);
    $movement = new MovementModel($db);


    $data = json_decode(file_get_contents("php://input"));



    if( !array_key_exists("amount",$data) || !array_key_exists("origin_bank",$data) || !array_key_exists("origin_account_id",$data))
    {

        echo json_encode(
            array('message' => $message)
        );

    }
    else{


        $movement->amount = $data->amount;
        $movement->foreign_account_id = $data->origin_account_id;
        $movement->origin_bank = $data->origin_bank;
        $movement->destiny =  (isset($data->destiny_account_id)) ? $data->destiny_account_id : $data->destiny_credit_id;
        $movement->type_transfer = (isset($data->destiny_account_id)) ? TypeTransferEnum::ConsignSavingsAccount : TypeTransferEnum::ConsignCredit;

        $error_params = true;

        if(isset($data->destiny_account_id)){

            $account_destiny->id = $movement->destiny;
            $account_destiny->getSavingAccountById();

            if( $account_destiny->user_id == null )
            {
                $message = "Cuenta de destino no existe";
            }
            else if($movement->amount >= 0) {
                $error_params = false;
                $account_destiny->balance += $movement->amount;
                $account_destiny->updateAccount();
                $message = 'Transferencia realizada';
                http_response_code(201);
            }
            else {
                http_response_code(406);
                $message = 'Saldo insuficiente';
            }

        }
        else if(isset($data->destiny_credit_id)) {
            $credit->id = $movement->destiny;
            $credit->getCreditById();

            if( $credit->user_id == null )
            {
                $message = "Credito de destino no existe";

            }
            else if( !$credit->isAproved )
            {
                $message = "No esta aprovado el credito";
            }
            else if($movement->amount >= 0 &&  $credit->balance - $movement->amount >= 0 ) {
                $error_params = false;
                $credit->balance -= $movement->amount;
                $credit->updateCredit();
                $message = 'Transferencia realizada';
                http_response_code(201);
            }
            else if( $movement->amount < 0 )
            {
                http_response_code(406);
                $message = 'Saldo insuficiente';
            }
            else
            {
                http_response_code(406);
                $message = 'Monto mayor a credito';
            }

        }

        if (!$error_params)
            $movement->createMovement();


        echo json_encode(
            array('message' => $message)
        );

    }
