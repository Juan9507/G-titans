<?php
session_start();
if ($_SESSION['Roles_idRoles']==1) { 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <script src="https://kit.fontawesome.com/c5f9d99660.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.20/af-2.3.4/b-1.6.1/b-flash-1.6.1/cr-1.5.2/fh-3.1.6/sc-2.0.1/datatables.min.css"/>


  <title>Administrador</title>

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
        <a href="ventas.php" class="list-group-item list-group-item-action bg-light">Ventas</a>
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
        <h1 class="mt-4">Productos</h1>
          <!-- COMIENZO DE LA CONSULTA DE PRODUCTOS -->
          <?php 
    include("../crud/conexion.php");
    // COSULTA CATEGORIA
    $query_ca="SELECT * FROM categoria WHERE estado_categoria=1";
    $resultado_ca=$con->query($query_ca);
    // COSULTA PLATAFORMA
    $query_pla="SELECT * FROM plataforma WHERE estado_pla=1";
    $resultado_pla=$con->query($query_pla);
    ?>
    <div class="container">
     <div class="row">
        <div class="col">
          <a href="#" class="btn btn-secondary btn-lg mb-4" data-toggle="modal" data-target="#Modal">Registrar producto</a>
        </div>
        <div class="col">
        </div>
     </div>
     <!-- MODAL REGISTRAR PRODUCTO -->
     <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Registrar juego</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="../crud/producto/guardar_producto.php" method="post">
                 <div class="row">
                   <div class="col">
                      <label for="">Digite el nombre del juego:</label>
                      <input type="text" class="form-control" style="text-transform:uppercase;" name="nombre" required id="">
                   </div>
                   <div class="col">
                      <label for="">Digite la descripcion del juego:</label><br>
                      <textarea name="descripcion" class="form-control" style="text-transform:lowercase;" id="" cols="30" rows="1" required></textarea><br>
                   </div>
                   <div class="w-100"></div>
                   <div class="col">
                      <label for="">Digite el precio del jego:</label>
                      <input type="number" class="form-control" name="precio" required id="">
                   </div>
                   <div class="col">
                      <label for="">Digite la categoria del juego:</label>
                      <select class="form-control" name="categoria" id="">
                        <?php while($row_ca=$resultado_ca->fetch_assoc()){?>
                          <option value="<?= $row_ca["id_juego"]; ?>"><?= $row_ca["nombre_ca"];?></option>
                        <?php } ?>
                      </select>
                   </div>
                   <div class="col mb-4">
                      <label for="">Digite la plataforma del juego:</label>
                      <select class="form-control" name="plataforma" id="">
                        <?php while($row_pla=$resultado_pla->fetch_assoc()){?>
                          <option value="<?= $row_pla["id_plataforma"]; ?>"><?= $row_pla["nombre_pla"];?></option>
                        <?php } ?>
                      </select>
                   </div>
                   <div class="w-100"></div>
                   <div class="col mb-4">
                      <label for="">Digite la cantidad:</label>
                      <input type="text" class="form-control" name="cantidad" required id="">
                   </div>
                   <div class="col mb-4">
                      <label for="">Digite el trailer del juego:</label>
                      <input type="text" class="form-control" name="trailer" required id="">
                   </div>
                   <div class="w-100"></div>
                   <div class="col">
                      <label for="">seleccio el archivo del juego:</label>
                      <input type="file" name="img_juego" class="form-control-file" accept="image/png, image/jpeg" require id="">
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
     <?php
     // COSULTA PRODUCTOS
    $query="SELECT idProductos,nombre,nombre_ca,nombre_pla,descripcion,valorunitario,cantidad,imagen,trailer FROM productos INNER JOIN categoria,plataforma WHERE productos.juego_idJuego=categoria.id_juego && productos.plataforma_idPlataforma=plataforma.id_plataforma && estado=1";
    $resultado=$con->query($query);
    ?>
    <table class="table table-bordered" id="example">
    	<thead class="thead-dark">
    	  <tr>
          <th><b>Id del juego</b></th>
          <th><b>Nombre</b></th>
          <th><b>Categoria</b></th>
          <th><b>Plataforma</b></th>
          <th><b>Descripcion</b></th>
          <th><b>Valor unitario</b></th>
          <th><b>Cantidad</b></th>
          <th><b>imagen</b></th>
          <!-- <td><b>Estado</b></td> -->
          <th></th>
          <th></th>
        </tr>
      </thead>
            <tbody>
               <?php while($row=$resultado->fetch_assoc()){?>
                <tr>
                  <td>
                    <?php echo $row['idProductos'];?>
                  </td>
                  <td>
                    <?php echo $row['nombre'];?>
                  </td>
                  <td>
                    <?php echo $row['nombre_ca'];?>
                  </td>
                  <td>
                    <?php echo $row['nombre_pla'];?>
                  </td>
                  <td>
                    <?php echo $row['descripcion'];?>
                  </td>
                  <td>
                    <?php echo $row['valorunitario'];?>
                  </td>
                  <td>
                    <?php echo $row['cantidad'];?>
                  </td>
                  <td>
                    <img style="width:150px;" src="../imagenes/<?php echo $row['imagen'];?>" alt=""> 
                  </td>
                  <!-- <td>
                    <?php //echo $row['estado'];?> 
                  </td> -->
                  <td>
                  <a href="../crud/producto/modificar_producto.php?idProductos=<?php echo $row['idProductos'];?>"><i class="fas fa-user-edit"></i></a> 
                  </td>
                  <td>
                    <a href="../crud/producto/eliminar_producto.php?idProductos=<?php echo $row['idProductos'];?>"><i class="fas fa-backspace"></i></a>
                  </td>
               </tr>
                 <?php
                  }
                 ?>
            </tbody>
    </table>
          <!-- FIN DE LA CONSULTA DE PRODUCTOS -->
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
  </div>
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
    $('#example').DataTable( {
        "scrollX": true
    } );
   } );
  </script>
</body>
</html>
