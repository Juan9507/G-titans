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
        include("../conexion.php");
        $idProductos=$_GET['idProductos'];
        $sql=mysqli_query($con, "SELECT * FROM productos WHERE idProductos='$idProductos'");
        $f2=mysqli_fetch_array($sql);
      ?>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><img class="logo" src="../../svg/logo3.svg" alt=""> </div>
      <div class="list-group list-group-flush">
        <a href="../../admin/admin.php" class="list-group-item list-group-item-action bg-light">Productos</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">ventas</a>
        <a href="../../admin/categoria.php" class="list-group-item list-group-item-action bg-light">Categoria</a>
        <a href="../../admin/plataforma.php" class="list-group-item list-group-item-action bg-light">Plataforma</a>
        <a href="../../admin/usuario.php" class="list-group-item list-group-item-action bg-light">Usuarios</a>
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
           <form action="modificarproducto_validar.php" method="post">
                 <div class="row mt-4">
                   <div class="col-12 mb-4">
                      <label for="">Digite el nombre del juego:</label>
                      <input type="text" class="form-control" style="text-transform:uppercase;" name="nombre" value="<?= $f2['nombre'];?>" required id="">
                   </div>
                   <div class="col-12 mb-1">
                      <label for="">Digite la descripcion del juego:</label><br>
                      <textarea name="descripcion" class="form-control" style="text-transform:lowercase;"  id="" cols="30" rows="4"  required><?= $f2['descripcion'];?></textarea><br>
                   </div>
                   <div class="w-100"></div>
                   <div class="col-12 mb-4">
                      <label for="">Digite el precio del jego:</label>
                      <input type="number" class="form-control" name="precio" value="<?= $f2['valorunitario'];?>" required id="">
                   </div>
                   <div class="col-12 mb-4">
                      <label for="">Digite la cantidad:</label>
                      <input type="text" class="form-control" name="cantidad" value="<?= $f2['cantidad'];?>" required id="">
                   </div>
                   <div class="w-100"></div>
                   <div class="col-6 mb-4">
                      <label for="">Edite el nombre del archivo del juego:</label>
                      <input type="text" class="form-control" name="juego" value="<?= $f2['imagen'];?>" id="">
                   </div>
                   <div class="col-6 mb-4">
                      <label for="">Edite el link del video del juego:</label>
                      <input type="text" class="form-control" name="trailer" value="<?= $f2['trailer'];?>" id="">
                   </div>
                 </div>
                    <input type="hidden" name="idProductos" value="<?= $f2['idProductos'] ?>">
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