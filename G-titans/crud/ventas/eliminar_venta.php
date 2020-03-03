<?php
session_start();
if ($_SESSION['Roles_idRoles']==1) { 
    require('../conexion.php');
    $idVentas=$_GET['idVentas'];
    $sql= "UPDATE ventas SET estado_ventas=0 WHERE idVentas='$idVentas'";
    if ($con->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $con->error;
    }
    header("location:../../admin/ventas.php");
}else{
    header("Location:../../inicio.php");
}
?>