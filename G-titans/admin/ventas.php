<?php
session_start();
if ($_SESSION['Roles_idRoles']==1) { ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <script src="https://kit.fontawesome.com/c5f9d99660.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.20/af-2.3.4/b-1.6.1/b-flash-1.6.1/cr-1.5.2/fh-3.1.6/sc-2.0.1/datatables.min.css"/>

  <title>Administrador venta</title>

  <!-- Bootstrap core CSS -->
  <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><img class="logo" src="../svg/logo3.svg" alt=""> </div>
      <div class="list-group list-group-flush">
        <a href="admin.php" class="list-group-item list-group-item-action bg-light">Productos</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">ventas</a>
        <a href="categoria.php" class="list-group-item list-group-item-action bg-light">Categoria</a>
        <a href="plataforma.php" class="list-group-item list-group-item-action bg-light">Plataforma</a>
        <a href="usuario.php" class="list-group-item list-group-item-action bg-light">Usuarios</a>
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

      <div class="container-fluid">
         <h1 class="mt-4">Ventas</h1>
          <!-- COMIENZO DE LA CONSULTA DE VENTAS -->
          <?php
            include("../crud/conexion.php");
            $query="SELECT idVentas,nombres,nombre,fecha,cantidad_ventas,valorapagar,Usuarios_idUsuarios,Productos_idProductos  FROM ventas INNER JOIN usuarios,productos WHERE ventas.Usuarios_idUsuarios=usuarios.idUsuarios && ventas.Productos_idProductos=productos.idProductos && estado_ventas=1";
            $resultado=$con->query($query);
          ?>
          <div class="container">
            <div class="row">
              <div class="col-6 align-items-end">
                <a href="../pdf/reportes.php" class="btn btn-secondary btn-lg mb-4">Descargar reporte los diez juegos más vendidos</a> 
              </div>
              <!-- <div class="col mb-4">
              </div> -->
            </div>
          </div>
          <!-- TABLA DE LA CONSULTA -->
          <table class="table table-bordered" id="example">
            <thead class="thead-dark">
              <tr>
                <th><b>Id venta</b></th>
                <th><b>Id usuario</b></th>
                <th><b>usuario</b></th>
                <th><b>Id producto</b></th>
                <th><b>producto</b></th>
                <th><b>Fecha</b></th>
                <th><b>Cantidad</b></th>
                <th><b>Valor a apagar</b></th>
                <!-- <td><b>Estado</b></td> -->
                <!-- <th></th>
                <th></th> -->
              </tr>
            </thead>
            <tbody>
              <?php while($row=$resultado->fetch_assoc()){?>
              <tr>
                <td>
                  <?php echo $row['idVentas'];?>
                </td>
                <td>
                  <?php echo $row['Usuarios_idUsuarios'];?>
                </td>
                <td>
                  <?php echo $row['nombres'];?></a>
                </td>
                <td>
                  <?php echo $row['Productos_idProductos'];?></a>
                </td>
                <td>
                  <?php echo $row['nombre'];?></a>
                </td>
                <td>
                  <?php echo $row['fecha'];?>
                </td>
                <td>
                  <?php echo $row['cantidad_ventas'];?>
                </td>
                <td>
                  <?php echo $row['valorapagar'];?>
                </td>
                <!-- <td>
                  <?php //echo $row['estado'];?> 
                </td> -->
                <!-- <td>
                  <a href="../crud/ventas/modificar_venta.php?idVentas=<?php echo $row['idVentas'];?>">modificar</a>
                </td>
                <td>
                  <a href="../crud/ventas/eliminar_venta.php?idVentas=<?php echo $row['idVentas'];?>">Eliminar</a>
                </td> -->
              </tr>
                <?php
                }
                ?>
            </tbody>
          </table><br>
          <!-- FIN TABLA DE LA CONSULTA  -->
          <!-- FIN DE LA CONSULTA DE VENTAS -->
      </div>
    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->
  <?php
  }else{
    header("Location:../inicio.php");
  }
?>
  <!-- Bootstrap core JavaScript -->
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/jquery-3.3.1.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/datatables.min.js"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  <script>
    $(document).ready(function() {
    $('#example').DataTable();
   } );
  </script>
</body>

</html>