<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Bootstrap core CSS -->
    <link href="../../bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/usuario.css" rel="stylesheet">
    <title>Registro usuario</title>
</head>
<body>
     <div class="container">
      <form action="guardar_usuario.php" method="post">
      <div class="row ">
        <div class="col ">
          <label for="">Digite sus nombres</label>
          <input type="text" name="nombres" class="form-control" required pattern="[A-Za-z\s]{1,40}" title="Solo letras" id=""><br>
        </div>
        <div class="col">
           <label for="">Digite sus apellidos</label>
           <input type="text" name="apellidos" class="form-control" required pattern="[A-Za-z\s]{1,40}" title="Solo letras" id=""><br>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="">Digite su correo</label>
          <input type="email" name="correo" class="form-control" required><br>
        </div>
        <div class="col">
          <label for="">Digite su cotraseña</label>
          <input type="password" required name="contraseña" class="form-control" id=""><br>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="">Digite su telefono</label>
          <input type="tel" name="telefono"class="form-control" required pattern="[0-9]{1,15}" title="Solo numeros" id=""><br>
        </div>
        <div class="col">
          <label for="">Digite su dirección</label>
          <input type="text" name="direccion"class="form-control" required id=""><br>
        </div>
        <div class="col">
          <label for="">Digite su ciudad</label>
          <input type="text" required name="ciudad" class="form-control" id="">
        </div>
      </div>
        <input type="hidden" name="rol" value=2><br>
		    <input type="hidden" name="estado" value=1>
        <input type="submit" class="btn btn-secondary btn-lg btn-block" value="Registrar">
    </form>
   </div>
</body>
</html>