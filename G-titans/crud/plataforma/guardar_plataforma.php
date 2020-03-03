<?php
session_start();
if ($_SESSION['Roles_idRoles']==1) { 
    include('../conexion.php');
    $nombre_pla=$_POST['nombre_pla'];
    print_r($_POST);
    $sql="INSERT INTO plataforma (nombre_pla,estado_pla) VALUES ('".$nombre_pla."',1)";
    if (mysqli_query($con, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
     header("location:../../admin/plataforma.php");
}else{
    header("Location:../../inicio.php");
}
?>