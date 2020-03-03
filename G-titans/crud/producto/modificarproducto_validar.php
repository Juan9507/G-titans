<?php
session_start();
if ($_SESSION['Roles_idRoles']==1) { 
include('../conexion.php');
$idProductos=$_POST['idProductos'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$valorunitario=$_POST['precio'];
$cantidad=$_POST['cantidad'];
$imagen=$_POST['juego'];
$trailer=$_POST['trailer'];
	$query="UPDATE productos SET nombre='".$nombre."',descripcion='".$descripcion."',valorunitario='".$valorunitario."',cantidad='".$cantidad."',imagen='".$imagen."',trailer='".$trailer."'  WHERE idProductos='".$idProductos."'";
	$resultado=$con->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar juego</title>
	</head>
	
	<body>
		<center>
			<?php 
			 if($resultado>0){
			?>
			<h1>Juego modificado</h1>
			<?php 	
			 }else{ 
			?>
			 <h1>Error al Modificar el juego</h1>
			<?php	
			} 
			?>
			<p></p>	
			<?php
			header("location:../../admin/admin.php");
			}else{
				header("Location:../../inicio.php");
			}
			?>
			<!-- <a href="../../admin/admin.php">Regresar</a> -->
		</center>
	</body>
</html>