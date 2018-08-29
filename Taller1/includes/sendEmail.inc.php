<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->Username = 'prowebjaveriana097@gmail.com';
$mail->Password = 'javeriana2018';
$mail->Subject = 'File Manager';
$mail->Body = 'http://localhost:8888/Taller1/FilesAdmin.php';
$mail->addAddress('juan.pa097@gmail.com');



if($mail->send()){
  echo "Mail Sent";
}
//header("Location: ../FilesAdmin.php");
