<?php
session_start();
if ($_SESSION['Roles_idRoles']==1) { 
include('../conexion.php');
$nombre_ca=$_POST['nombre_ca'];
$id_juego=$_POST['id_juego'];
print_r($_POST);
	$query="UPDATE categoria SET nombre_ca='".$nombre_ca."' WHERE id_juego='".$id_juego."'";
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
			<h1>Categoria modificada</h1>
			<?php 	
			 }else{ 
			?>
			 <h1>Error al Modificar la categoria</h1>
			<?php	
            } 
            header("location:../../admin/categoria.php");
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