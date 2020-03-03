<?php
session_start();
if (!$_SESSION['idUsuarios']) {
  header("../../Location:inicio.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../../bootstrap/bootstrap.min.css" rel="stylesheet">
    <title>Ventas</title>
    <style></style>
  <style>
    body{
      background: linear-gradient(rgba(52,148,230,.8), rgba(236,110,173,.7)),url('../../imagenes/fondo_home.jpg') no-repeat;
      background-attachment: fixed;
      background-size: cover;
      background-position: center;
      height:100vh;
      /* width: 100%; */
      min-height: 100vh;
      padding-top:55px;
      margin-left:30px;
      margin-right:30px;
    }
    label{
      color:white;
    }
    .container{
      background: linear-gradient(rgba(15,32,39), rgba(32,58,67), rgba(44,83,100));
      padding-bottom: 22px;
      border-radius:10px;
     }
   @media (min-width: 1200px){
    .container {
      max-width: 500px;
    }
   }
  </style>
	<script>
		function cambiar(){
			cantidad = document.getElementById("cantidad").value;
			vunit = document.getElementById("vunit").value;
			total = cantidad * vunit;
			document.getElementById("vtotal").value = total;
		}
	</script>
</head>
<body>
   <div class="container">
     <form action="form_ventas.php" method="post">
        <!-- <label for="">Id usuario:</label> -->
        <input type="hidden" min="1" name="Usuarios_idUsuarios" value="<?=$_SESSION['idUsuarios']; ?>" id=""><br>
           <?php
              date_default_timezone_set('America/Bogota');
              $fecha_actual=date("y-m-d");
              include('../conexion.php');
              $idProductos=$_GET['idProductos'];
              $query="SELECT * from productos WHERE idProductos='$idProductos'";
              $resultado=$con->query($query);
              $row=$resultado->fetch_assoc();
           ?>
          <div class="form-group">
            <label for="">Nombre del juego:</label>
            <input type="hidden" name="juego" value="<?=$row['nombre'];?>">
            <select name="nombre" class="form-control" id="">
          </div>
               <option value="<?=$row['idProductos'];?>"><?=$row['nombre'];?></option>
            </select><br>
            <label for="">fecha</label>
              <input type="datetime" name="fecha" class="form-control" readonly id="" value="<?= $fecha_actual;?>"><br>
            <label for="">Cantidad:</label>
              <select name="cantidad" id="cantidad" class="form-control" onChange='cambiar();'>
                <?php
                  for ($i=1; $i <= $row['cantidad']; $i++) { ?>
                      <option value="<?=$i?>"><?=$i?></option>
                <?php   
                }
                ?>
              </select><br>
            <label for="">valor unitario es de:</label>
              <input type='text' class="form-control" value='<?=$row['valorunitario']; ?>' readonly id='vunit' name='vunit'>
	            <br>
            <label for="">valor total es de:</label>
              <input type='text' class="form-control" value='<?=$row['valorunitario']; ?>' readonly id='vtotal' name='vtotal'><br>
              <input type="hidden" name="productos" value="<?= $idProductos?>">
	          <!-- Modal confirmacion compra-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confimación de compra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    La compra del video juego <?=$row['nombre']; ?> se realizara.<br>
                    click en la (x) si no desea realizar la compra.
                  </div>
                  <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-primary" value="Aceptar">
                  </div>
                </div>
              </div>
            </div>
            <!-- FIN MODAL -->
      </form>
      <input type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal" value="comprar">
    </div>
    <!-- Logica de comprar -->
    <?php
      if (isset($_POST['submit'])) {
        include('../conexion.php');
        $Usuarios_idUsuarios=$_POST['Usuarios_idUsuarios'];
        $fecha=$_POST['fecha'];
        $cantidad=$_POST['cantidad'];
        $productos=$_POST['productos'];
        $vtotal=$_POST['vtotal'];
        $juego=$_POST['juego'];
        $sql= "INSERT INTO ventas (Usuarios_idUsuarios,Productos_idProductos,fecha,cantidad_ventas,valorapagar,estado_ventas) VALUES ('".$Usuarios_idUsuarios."','".$productos."','".$fecha."','".$cantidad."','".$vtotal."',1)";
        if (mysqli_query($con, $sql)) {
            // echo '<script>alert("Comprar exitosa")</script> ';
            // echo "<script>location.href='../../inicio.php'</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
        // mysqli_close($con);
        // header("location:../../inicio.php");
       }
      //  Fin Logica de comprar 
      $query="SELECT 	* FROM usuarios  WHERE idUsuarios=".$_SESSION['idUsuarios']." && estado=1";
      $resultado=$con->query($query);
      $f=$resultado->fetch_assoc();
      if (isset($_POST['submit'])) {
        require '../../src/Exception.php';
        require '../../src/PHPMailer.php';
        require '../../src/SMTP.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'juandavidnaranjo75@gmail.com';                     // SMTP username


            //https://support.google.com/mail/answer/185833?hl=es-419 POR ACA INGRESAN PARA CREAR LA CLAVE DE LA APP
            $mail->Password   = 'fvjrkhedacasuazb';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('juandavidnaranjo75@gmail.com', 'G-titans');        
          

            $mail->addAddress($f['correo'], $f['correo']);     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Mensaje automatico';
            $mail->Body    = $f['nombres'].' <i>Su compra se harealizado correctamente<br> '.$juego.'</i><img src="cid:logo"></img>';
            $mail->AddEmbeddedImage(dirname(__FILE__) . '/logo.png','logo');
            $mail->AltBody = 'Su compra se harealizado correctamente</b>';

            $mail->send();

            // echo 'Message has been sent';

        } catch (Exception $e) {
            echo "Error en el envio del correo: {$mail->ErrorInfo}";
        }
        header("location:../../inicio.php");
      }
         
        //  mysqli_close($con);
        //  echo "<script> alert (\"Registro exitoso\"); </script>";
        //  echo "<script language=Javascript> location.href=\"../../inicio.php\"; </script>";
    ?>
     <script src="../../js/jquery-3.4.1.min.js"></script>
     <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>