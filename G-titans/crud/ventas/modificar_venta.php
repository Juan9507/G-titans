<?php
session_start();
if ($_SESSION['Roles_idRoles']==1) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Modificar producto</title>
  <!-- Bootstrap core CSS -->
  <link href="../../bootstrap/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../css/simple-sidebar.css" rel="stylesheet">
  <style>
     .container {
       width: 80% !important;
     }
  </style>
</head>

<body>
      <?php
       require('../conexion.php');
       $idVentas=$_GET['idVentas'];
       $sql=mysqli_query($con,"SELECT * FROM ventas WHERE idVentas='$idVentas'");
       $f2=mysqli_fetch_array($sql);
      //  $row=$resultado->fetch_array() or die($conn->error);
      ?>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><img class="logo" src="../../svg/logo3.svg" alt=""> </div>
      <div class="list-group list-group-flush">
        <a href="../../admin/admin.php" class="list-group-item list-group-item-action bg-light">Productos</a>
        <a href="../../admin/ventas.php" class="list-group-item list-group-item-action bg-light">ventas</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#"><?= $_SESSION['nombres']; ?> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../crud/usuarios/cerrar_sesion.php">Cerrar sesion</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container">
         <form method="post" action="modificar_venta_validar.php">
                 <div class="row mt-4">
                   <div class="col-12 mb-4">
                   <label for="">id Usuario</label>
                   <input type="text" name="Usuarios_idUsuarios" class="form-control" readonly value="<?php echo $f2['Usuarios_idUsuarios'];?>" required pattern="[a-z]{1,40}" title="Solo letras" id=""><br>
                   </div>
                   <div class="col-12 mb-1">
                   <label for="">fecha</label>
                   <input type="text" name="fecha" class="form-control" readonly value="<?php echo $f2['fecha'];?>" required><br>
                   </div>
                   <div class="w-100"></div>
                   <div class="col-12 mb-4">
                   <label for="">Cantidad</label>
                   <input type="text" value="<?php echo $f2['cantidad_ventas'];?>" required name="cantidad" class="form-control"><br>
                   </div>
                   <div class="col-12 mb-4">
                   <label for="">Valor a pagar</label>
                   <input type="tel" name="valorapagar" class="form-control" value="<?php echo $f2['valorapagar'];?>" required pattern="[0-9]{1,15}" title="Solo numeros"><br>
                   </div>
                   <div class="w-100"></div>
                 </div>
                    <input type="hidden" name="idVentas" value="<?php echo $idVentas?>">
                    <button type="submit" class="btn btn-primary">Modificar</button>
              </form>
            </div>
    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->
  </div>
  <?php
  }else{
    header("Location:../../inicio.php");
  }
?>
  <!-- Bootstrap core JavaScript -->
  <script src="../../js/jquery-3.4.1.min.js"></script>
  <script src="../../js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</body>
</html>