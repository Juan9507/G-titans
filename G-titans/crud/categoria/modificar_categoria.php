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
       $id_juego=$_GET['id_juego'];
       $sql=mysqli_query($con,"SELECT * FROM categoria WHERE id_juego='$id_juego'");
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
        <a href="../../admin/categoria.php" class="list-group-item list-group-item-action bg-light">Categoria</a>
        <a href="../../admin/plataforma.php" class="list-group-item list-group-item-action bg-light">Plataforma</a>
        <a href="../../admin/usuarios.php" class="list-group-item list-group-item-action bg-light">Usuarios</a>
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
         <form method="post" action="modificar_categoria_validar.php">
                 <div class="row mt-4">
                   <div class="col-12 mb-4">
                        <label for="">Nombre categoria</label>
                        <input type="text" name="nombre_ca" class="form-control" value="<?php echo $f2['nombre_ca'];?>" required pattern="[a-z]{1,40}" title="Solo letras" id=""><br>
                   </div>
                 </div>
                 <input type="hidden" name="id_juego" value="<?php echo $id_juego?>">
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