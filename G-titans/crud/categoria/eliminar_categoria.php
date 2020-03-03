<?php
session_start();
if ($_SESSION['Roles_idRoles']==1) { 
    require('../conexion.php');
    $id_juego=$_GET['id_juego'];
    $sql= "UPDATE categoria SET estado_categoria=0 WHERE id_juego='$id_juego'";
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