<?php
session_start();
include('../conexion.php');
$idUsuarios=$_POST['idUsuarios'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$correo=$_POST['correo'];
$contraseña=$_POST['contraseña'];
$contrasenia_encrip=md5($contraseña);
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$ciudad=$_POST['ciudad'];
	$query="UPDATE usuarios SET nombres='".$nombres."',apellidos='".$apellidos."',correo='".$correo."',telefono='".$telefono."',direccion='".$direccion."',ciudad='".$ciudad."'  WHERE idUsuarios='".$idUsuarios."' && clave='".$contrasenia_encrip."'";
	$resultado=$con->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar usuario</title>
	</head>
	
	<body>
		<center>
			<?php 
			 if($resultado>0){
			?>
			<h1>Usuario modificado</h1>
			<?php 	
			 }else{ 
			?>
			 <h1>Error al Modificar el usuario</h1>
			<?php	
            } 
            header("location:../../perfil/perfil.php");
			?>
			<p></p>	
			
        </center>
       
	</body>
</html>