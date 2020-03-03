<?php
session_start();
if ($_SESSION['Roles_idRoles']==1) { 
include('../conexion.php');
$idVentas=$_POST['idVentas'];
$Usuarios_idUsuarios=$_POST['Usuarios_idUsuarios'];
$fecha=$_POST['fecha'];
$cantidad=$_POST['cantidad'];
$valorapagar=$_POST['valorapagar'];
print_r($_POST);
	$query="UPDATE ventas SET idVentas='".$idVentas."',Usuarios_idUsuarios='".$Usuarios_idUsuarios."',fecha='".$fecha."',cantidad_ventas='".$cantidad."',valorapagar='".$valorapagar."' WHERE idVentas='".$idVentas."'";
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
			<h1>Venta modificada</h1>
			<?php 	
			 }else{ 
			?>
			 <h1>Error al Modificar la venta</h1>
			<?php	
            } 
            header("location:../../admin/ventas.php");
			?>
			<p></p>	
			
        </center>
 <?php
}else{
  header("Location:../../inicio.php");
}
?>
	</body>
</html>