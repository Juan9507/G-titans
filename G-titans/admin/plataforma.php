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

  <title>Administrador plataforma</title>

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
        <a href="ventas.php" class="list-group-item list-group-item-action bg-light">ventas</a>
        <a href="categoria.php" class="list-group-item list-group-item-action bg-light">Categoria</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Plataforma</a>
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
         <h1 class="mt-4">Plataforma</h1>
          <!-- COMIENZO DE LA CONSULTA DE VENTAS -->
          <?php
            include("../crud/conexion.php");
            $sql=mysqli_query($con,"SELECT * FROM plataforma  WHERE estado_pla=1");
          ?>
          <div class="container">
            <div class="row">
              <div class="col">
                <a href="#" class="btn btn-secondary btn-lg mb-4" data-toggle="modal" data-target="#Modal">Registrar plataforma</a>
              </div>
              <div class="col mb-4">
              </div>
            </div>
          </div>
          <!-- MODAL REGISTRAR PRODUCTO -->
     <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Registrar plataforma</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="../crud/plataforma/guardar_plataforma.php" method="post">
                 <div class="row">
                   <div class="col">
                      <label for="">Digite el nombre de la plataforma ejemplo Xbox one, PS4:</label>
                      <input type="text" class="form-control" style="text-transform:lowercase;" name="nombre_pla" required id="">
                   </div>
                 </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
     <!-- FIN DEL MODAL -->
          <!-- TABLA DE LA CONSULTA -->
          <table class="table table-bordered" id="example">
            <thead class="thead-dark">
              <tr>
                <th><b>Id plataforma</b></th>
                <th><b>Nombre</b></th>
                <th><b>Estado</b></th>
                <!-- <td><b>Estado</b></td> -->
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php while($row=mysqli_fetch_array($sql)){?>
              <tr>
                <td>
                  <?php echo $row['id_plataforma'];?>
                </td>
                <td>
                  <?php echo $row['nombre_pla'];?>
                </td>
                <td>
                  <?php echo $row['estado_pla'];?></a>
                </td>
                <!-- <td>
                  <?php //echo $row['estado'];?> 
                </td> -->
                <td>
                  <a href="../crud/plataforma/modificar_plataforma.php?id_plataforma=<?php echo $row['id_plataforma'];?>"><i class="fas fa-user-edit"></i></a>
                </td>
                <td>
                  <a href="../crud/plataforma/eliminar_plataforma.php?id_plataforma=<?php echo $row['id_plataforma'];?>"><i class="fas fa-backspace"></i></a>
                </td>
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