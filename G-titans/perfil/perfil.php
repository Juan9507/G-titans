<?php
session_start();
if (isset($_SESSION['idUsuarios'])) {
include('../crud/conexion.php');
$query="SELECT * FROM usuarios WHERE estado=1 && ".$_SESSION['idUsuarios']."=idUsuarios ";
$resultado=$con->query($query);
$row=$resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- propio perfil CSS -->
    <link href="../css/perfil.css" rel="stylesheet">
    <link href="../css/inicio.css" rel="stylesheet">
    <!-- fonts google CSS -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet"> -->
    <title>Mi perfil</title>
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" >
    <div class="container">
      <a class="navbar-brand" href="#"><!--<img class="logo" src="logo3.svg" alt="">--></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../inicio.php">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../tienda.php">Tienda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../contactanos/contactanos.php">Contáctanos</a>
          </li>
          <?php 
            if (isset($_SESSION['idUsuarios'])) {?>
                 <li class="nav-item active">
                  <a class="nav-link" href="perfil.php"><?php echo $_SESSION['nombres'];?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="boton" href="../crud/usuarios/cerrar_sesion.php">Cerrar sesión</a>
                 </li>
             <?php
              }else{?>
                <li class="nav-item">
                   <a class="nav-link" id="boton" href="crud/usuarios/form_usuario.php">Crear cuenta</a>
                 </li>
                  <li class="nav-item">
                    <a class="nav-link" id="boton" href="crud/usuarios/login.php">login</a>
                  </li>
             <?php
              }
             ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- FIN NAVAR -->
  <!-- COMIENZO DEL CONTAINER -->
  <div class="container">
     <div id="row" class="row align-items-center">
            <div class="col-sm-5 mb-4">
                <img class="perfil_foto" data-toggle="popover-hover" src="../imagenes/pacman.jpeg" data-container="body" alt="">
            </div>
            <div class="col">
                <p><b class="perfil_texto">Nombre: <?=$row['nombres']; ?></b>
                <b class="perfil_texto">Apellido: <?=$row['apellidos']; ?></b>
                <b class="perfil_texto">Telefono: <?=$row['telefono']; ?></b><br></p>
                <p><b class="perfil_texto">Direccion: <?=$row['direccion']; ?></b>
                <b class="perfil_texto">Ciudad: <?=$row['ciudad']; ?></b>
                <b class="perfil_texto">Password: *******</b></p>
                <div class="row">
                  <div class="col-6">
                    <a class="btn btn-secondary btn-sm btn-block mb-4" href="../crud/usuarios/modificar_usuario.php?idUsuarios=<?php echo $row['idUsuarios'];?>"><b>Actualizar mis datos</b></a>
                  </div>
                  <div class="col-6">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-secondary btn-sm btn-block mb-4" data-toggle="modal" data-target="#exampleModal">
                      <b>Actualizar mi contraseña</b>
                    </button>
                </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Actualizar contraseña</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="perfil.php" method="post">
                              <div class="row">
                                <div class="col-12 mb-3">
                                  <label for="">Digite su contraseña actual</label>
                                  <input class="form-control" type="password" required name="contrasenia" id="">
                                </div>
                              </div>
                              <div class="row">
                                 <div class="col">
                                  <label for="">Digite su contraseña nueva</label>
                                  <input class="form-control" type="password" required name="contraseniaNueva" id="">
                                 </div>
                                 <div class="col mb-3">
                                  <label for="">Vuelva a escribir la contraseña</label>
                                  <input class="form-control" type="password" required name="contraseniaRepetir" id="">
                                 </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                   <input type="hidden" name="idUsuarios" value="<?php echo $row['idUsuarios'];?>" >
                                  <input class="btn btn-primary btn-sm btn-block mb-4" type="submit" name="submit" value="Actualizar">
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                       <!-- LOGICA CAMBIAR CONTRASEÑA -->
                        <?php 
                          if (isset($_POST['submit'])) {
                               $idUsuarios=$_POST['idUsuarios'];
                               $contrasenia=$_POST['contrasenia'];
                               $contrasenia_encrip=md5($contrasenia);
                               $contrasenia_nueva=$_POST['contraseniaNueva'];
                               $contrasenia_nueva_encrip=md5($contrasenia_nueva);
                               $contrasenia_repetir=$_POST['contraseniaRepetir'];
                               $contrasenia_repetir_encrip=md5($contrasenia_repetir);
                               if ($contrasenia_encrip==$row['clave']) {
                                   if ($contrasenia_nueva_encrip==$contrasenia_repetir_encrip) {
                                        $query="UPDATE usuarios SET clave='".$contrasenia_nueva_encrip."' WHERE idUsuarios='".$idUsuarios."' ";
                                        $resultado=$con->query($query);
                                        if ($resultado>0) {
                                          echo "<div class='col-12 text-center'>
                                                  <div class='alert alert-success alert-dismissible'>
                                                      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                                      <strong>Éxito! </strong>La contraseña ha sido actualizada sastifatoriamente.
                                                  </div>
                                                </div>";
                                        }else{
                                          echo "Error al modificar la contraseña";
                                        }
                                   }else{
                                     echo "<div class='col-12 text-center'>
                                              <div class='alert alert-danger alert-dismissible'>
                                                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                                  <strong>ERROR! </strong>La nueva contaseña no coincide con la de volver a escribirla intentalo de nuevo.
                                              </div>
                                            </div>";
                                   }
                               }else{
                                 echo "
                                 <div class='col-12 text-center'>
                                   <div class='alert alert-danger alert-dismissible'>
                                      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                      <strong>ERROR! </strong>La contaseña que digitaste es invalida.
                                   </div>
                                 </div>";
                               }
                            }
                        ?>
                      <!-- FIN LOGICA CAMBIAR CONTRASEÑA -->
                  </div>
                <!-- </div> -->
            </div>
      </div>
      <h4>Mis compras</h4><br>
      <?php
       $resul=mysqli_query($con,"select fecha,valorapagar,nombre,imagen,descripcion from ventas INNER JOIN productos WHERE ventas.Productos_idProductos=productos.idProductos && ".$_SESSION['idUsuarios']."=Usuarios_idUsuarios && estado_ventas=1")or die(mysqli_error($con));
      //  $row=mysqli_fetch_array($resul);
      if (mysqli_fetch_array($resul)>0) {
        $resul=mysqli_query($con,"select 
        fecha,valorapagar,nombre,imagen,descripcion from ventas INNER JOIN productos WHERE ventas.Productos_idProductos=productos.idProductos && ".$_SESSION['idUsuarios']."=Usuarios_idUsuarios && estado_ventas=1")or die(mysqli_error($con));
        while ($f=mysqli_fetch_array($resul)) { ?> 
          <div class="card mb-3" >
              <div class="row no-gutters">
                 <div class="col-md-4">
                    <img src="../imagenes/<?php echo $f['imagen'];?>" class="card-img" alt="...">
                 </div>
                 <div class="col-md-8">
                     <div class="card-body">
                           <h5 class="card-title"><?=$f['nombre']; ?></h5>
                           <i class="card-text">$<?=$f['valorapagar']; ?></i>
                           <p class="card-text"><?=$f['descripcion']; ?></p>
                           <p class="card-text"><small class="text-muted"><?=$f['fecha']; ?></small></p>
                     </div>
                 </div>
             </div>
           </div>
        <?php
          }
        }else{
        ?>
          <div class="col-12 text-center">
            <p>Todos los juegos que compres los podras visualizar por este espacio.</p><p> No esperes más compra los juegos de mayor calidad.</p>
            <hr>
            <p class="mb-0">G-titans.</p>
          </div>
          <?php
          }
        
        ?>
        <br>
    </div>
    <footer class="py-5 bg-dark">
      <div class="container clear-top">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
      </div>
      <!-- /.container -->
    </footer>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>  
</body>
</html>
<?php
}else{
  header("Location:../inicio.php");
}
?>