<?php
session_start();
include("../conexion.php");
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$correo=$_POST['correo'];
$contrasenia=$_POST['contraseña'];
$contrasenia_encrip=md5($contrasenia);
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$ciudad=$_POST['ciudad'];
$rol=$_POST['rol'];
$estado=$_POST['estado'];

$sql="INSERT INTO usuarios(nombres,apellidos,correo,clave,telefono,direccion,ciudad,Roles_idRoles,estado)
VALUES ('".$nombres."','".$apellidos."','".$correo."','".$contrasenia_encrip."','".$telefono."','".$direccion."','".$ciudad."','".$rol."','".$estado."')";
if (mysqli_query($con, $sql)) {
    //   echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

require '../../src/Exception.php';
require '../../src/PHPMailer.php';
require '../../src/SMTP.php';

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'juandavidnaranjo75@gmail.com';                     // SMTP username


    //https://support.google.com/mail/answer/185833?hl=es-419 POR ACA INGRESAN PARA CREAR LA CLAVE DE LA APP
    $mail->Password   = 'fvjrkhedacasuazb';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('juandavidnaranjo75@gmail.com', 'G-titans');        
  

    $mail->addAddress($correo, $nombres);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensaje automatico';
    $mail->Body    = "$nombres".' Welcome to G-titans<br><i>Gracias por registrarte</i><img src="cid:logo"></img>';
    $mail->AddEmbeddedImage(dirname(__FILE__) . '/logo.png','logo');
    $mail->AltBody = 'Gracias por registrarse a G-titans</b>';

    $mail->send();

    // echo 'Message has been sent';

} catch (Exception $e) {
    echo "Error en el envio del correo: {$mail->ErrorInfo}";
}
 header("location:../../inicio.php");
 mysqli_close($con);
//  echo "<script> alert (\"Registro exitoso\"); </script>";
//  echo "<script language=Javascript> location.href=\"../../inicio.php\"; </script>";
 die();
?>