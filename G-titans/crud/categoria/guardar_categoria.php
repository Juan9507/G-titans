<?php
session_start();
if ($_SESSION['Roles_idRoles']==1) { 
    include('../conexion.php');
    $nombre=$_POST['nombre'];
    print_r($_POST);
    $sql="INSERT INTO categoria (nombre_ca,estado_categoria) VALUES ('".$nombre."',1)";
    if (mysqli_query($con, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
     header("location:../../admin/categoria.php");
}else{
    header("Location:../../inicio.php");
}
?>