<?php
session_start();
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$telefon=$_POST['telefono'];
$mensaje=$_POST['mensaje'];


require '../src/Exception.php';
require '../src/PHPMailer.php';
require '../src/SMTP.php';

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $email;                     // SMTP username


    //https://support.google.com/mail/answer/185833?hl=es-419 POR ACA INGRESAN PARA CREAR LA CLAVE DE LA APP
    $mail->Password   = 'fvjrkhedacasuazb';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($email, $nombre);        
  

    $mail->addAddress('naranjojuan135@gmail.com','naranjojuan135@gmail.com');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensaje automatico';
    $mail->Body    = $mensaje;
    // $mail->AddEmbeddedImage(dirname(__FILE__) . '/logo.png','logo');
    $mail->AltBody = $mensaje;

    $mail->send();

    // echo 'Message has been sent';

} catch (Exception $e) {
    echo "Error en el envio del correo: {$mail->ErrorInfo}";
}
echo "<script> alert (\"Mensaje enviado\"); </script>";
echo "<script language=Javascript> location.href=\"../inicio.php\"; </script>";

?>