<?php
session_start();
if ($_SESSION['Roles_idRoles']==1) { 
    require('../conexion.php');
    $idProductos=$_GET['idProductos'];
    $sql= "UPDATE productos SET estado=0 WHERE idProductos='$idProductos'";
    if ($con->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $con->error;
    }
    header("location:../../admin/admin.php");
}else{
    header("Location:../../inicio.php");
}
?>