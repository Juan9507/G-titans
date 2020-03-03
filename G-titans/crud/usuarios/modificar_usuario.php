<?php
  session_start();
  require('../conexion.php');
  // $idUsuarios=$_POST['idUsuarios'];
  $idUsuarios=$_GET['idUsuarios'];
  $query="SELECT idUsuarios,nombres,apellidos,correo,clave,telefono,direccion,ciudad FROM usuarios WHERE idUsuarios='$idUsuarios'";
  $resultado=$con->query($query);
  $row=$resultado->fetch_assoc() or die($conn->error);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Bootstrap core CSS -->
     <link href="../../bootstrap/bootstrap.min.css" rel="stylesheet">
     <link href="../../css/usuario.css" rel="stylesheet">
    <title>Modificar usuario</title>
  </head>
  <body>
     <div class="container">
     <form method="post" action="modificar_usuario_validar.php">
       <div class="row">
         <div class="col">
           <label for="">Digite sus nombres</label>
           <input type="text" class="form-control" name="nombres" value="<?php echo $row['nombres'];?>" required pattern="[A-Za-z\s]{1,40}" title="Solo letras" id=""><br>
         </div>
         <div class="col">
           <label for="">Digite sus apellidos</label>
           <input type="text" class="form-control" name="apellidos" value="<?php echo $row['apellidos'];?>" required pattern="[A-Za-z\s]{1,40}" title="Solo letras" id=""><br>
         </div>
       </div>
       <div class="row">
         <div class="col">
           <label for="">Digite su correo</label>
           <input type="email" class="form-control" name="correo" value="<?php echo $row['correo'];?>" required><br>
         </div>
         <div class="col">
           <label for="">Digite su cotraseña nuevamente</label>
           <input type="password" class="form-control" value="" required name="contraseña"  id=""><br>
         </div>
       </div>
       <div class="row">
         <div class="col">
           <label for="">Digite su telefono</label>
           <input type="tel" class="form-control" name="telefono" value="<?php echo $row['telefono'];?>" required pattern="[0-9]{1,15}" title="Solo numeros" id=""><br>
         </div>
         <div class="col">
           <label for="">Digite su dirección</label>
           <input type="text" class="form-control" name="direccion" value="<?php echo $row['direccion'];?>" required id=""><br>
         </div>
         <div class="col">
           <label for="">Digite su ciudad</label>
           <input type="text" class="form-control" required name="ciudad" value="<?php echo $row['ciudad'];?>" id=""><br>
         </div>
       </div>
          <input type="hidden" name="idUsuarios" value="<?php echo $row['idUsuarios']; ?>">
          <input type="submit" class="btn btn-secondary btn-lg btn-block" value="Actualizar"/>  
     </form>
     </div>
  </body>
</html>