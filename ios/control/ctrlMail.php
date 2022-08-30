<?php 

require('../../modelo/PHPMailer/src/PHPMailer.php');
require('../../modelo/PHPMailer/src/SMTP.php');
require('../../modelo/PHPMailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;

function envioRegistro($corEnvio,$subEnvio,$cueEnvio){
    $bandera=false;
    $mail = new PHPMailer(true);
    $mail->isSMTP();                                            
    $mail->Host='smtp.office365.com';                     
    $mail->SMTPAuth=true;                                   
    $mail->Username='jesusantoniolaral19.ce15@dgeti.sems.gob.mx';                    
    $mail->Password='Zbjc9818';                              
    //$mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;         
    $mail->Port=587;    
    $mail->setFrom($mail->Username, 'Administrador de Recursos Humanos');
    $mail->addAddress($corEnvio, 'Sr.(a)'); 
    $mail->isHTML(true);                                 
    $mail->Subject = $subEnvio;
    $body =$cueEnvio;
    $mail->Body=$body;
    if($mail->send()){
        $bandera=true;
    }
    return $bandera;
}

?>