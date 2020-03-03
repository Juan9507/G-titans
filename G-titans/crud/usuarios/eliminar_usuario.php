<?php
require('../conexion.php');
$idUsuarios=$_GET['idUsuarios'];
$sql= "UPDATE usuarios SET estado=0 WHERE idUsuarios='$idUsuarios'";
if ($con->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $con->error;
}
header("location:consultar_usuario.php");
?>