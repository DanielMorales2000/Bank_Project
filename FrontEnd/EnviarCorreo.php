<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '..\vendor\phpmailer\phpmailer\src\Exception.php';
/* Clase principal de PHPMailer */
require '..\vendor\phpmailer\phpmailer\src\PHPMailer.php';
/* Clase SMTP, necesaria si quieres usar SMTP */
require '..\vendor\phpmailer\phpmailer\src\SMTP.php';

require '..\vendor\autoload.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(TRUE);

try {
    //Recibir todos los parámetros del formulario
    $para = $_POST['email'];
    $asunto = $_POST['asunto'];
    // $mensaje = $_POST['mensaje'];

    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.office365.com';      //Set the SMTP server to send through
    // smtp.office365.com
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'danielsuarez8910@outlook.com';                     //SMTP username
    $mail->Password   = base64_decode('OTgwNzIw');                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('danielsuarez8910@outlook.com', 'Daniel');
    // $mail->addAddress('jdanielsuarez@ucundinamarca.edu.co', 'Jose');     //Add a recipient

    //Content
    $mail->AddAddress($para);
    // $mail->AddAddress('Correo Destino');
    $mail->Subject = $asunto;   
    // $mail->Subject = 'Asunto que quiera ir';   
    $mail->Body    = file_get_contents('contenido.html');
    $mail->MsgHTML(file_get_contents('contenido.html'));
    // $mail->AltBody = ' Mensaje Alternativo This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo'<script type="text/javascript">
            alert("Enviado Correctamente");
            window.location="http://localhost/Linea_Prof_3/Banco_Project/FrontEnd/correo1.php"
         </script>';
    
} catch (Exception $e) {
    echo'<script type="text/javascript">
            alert("NO ENVIADO, intentar de nuevo");
            window.location="http://localhost/Linea_Prof_3/Banco_Project/FrontEnd/correo1.php"
         </script>';
}
?>

