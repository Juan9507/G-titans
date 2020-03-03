<?php
session_start();
if ($_SESSION['Roles_idRoles']==1) { 
    require('../conexion.php');
    $id_plataforma=$_GET['id_plataforma'];
    $sql= "UPDATE plataforma SET estado_pla=0 WHERE id_plataforma='$id_plataforma'";
    if ($con->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $con->error;
    }
    header("location:../../admin/plataforma.php");
}else{
    header("Location:../../inicio.php");
}
?>