<?php
session_start();
if ($_SESSION['Roles_idRoles']==1) { 
include('../conexion.php');
$nombre_pla=$_POST['nombre_pla'];
$id_plataforma=$_POST['id_plataforma'];
print_r($_POST);
	$query="UPDATE plataforma SET nombre_pla='".$nombre_pla."' WHERE id_plataforma='".$id_plataforma."'";
	$resultado=$con->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar plataforma</title>
	</head>
	
	<body>
		<center>
			<?php 
			 if($resultado>0){
			?>
			<h1>plataforma modificada</h1>
			<?php 	
			 }else{ 
			?>
			 <h1>Error al Modificar la plataforma</h1>
			<?php	
            } 
            header("location:../../admin/plataforma.php");
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