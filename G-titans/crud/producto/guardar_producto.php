<?php
session_start();
if ($_SESSION['Roles_idRoles']==1) { 
    include('../conexion.php');
    $nombre=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];
    $categoria=$_POST['categoria'];
    $plataforma=$_POST['plataforma'];
    $precio=$_POST['precio'];
    $cantidad=$_POST['cantidad'];
    $trailer=$_POST['trailer'];
    $img_juego=$_POST['img_juego'];
    print_r($_POST);
    $sql="INSERT INTO productos (nombre,juego_idJuego,plataforma_idPlataforma,descripcion,valorunitario,cantidad,imagen,trailer,estado) VALUES ('".$nombre."','".$categoria."','".$plataforma."','".$descripcion."','".$precio."','".$cantidad."','".$img_juego."','".$trailer."',1)";
    if (mysqli_query($con, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
     header("location:../../admin/admin.php");
}else{
    header("Location:../../inicio.php");
}
?>