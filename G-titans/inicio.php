<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Inicio</title>
  <!-- Bootstrap core CSS -->
  <link href="bootstrap/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
  <!-- http icono -->
  <link rel="Shortcut Icon" href="logo/favicon.ico" type="image/x-icon" />
  <!-- Custom styles for this estilos -->
  <link href="css/inicio.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#"><!--<img class="logo" src="logo3.svg" alt="">--></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tienda.php">Tienda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactanos/contactanos.php">Contáctanos</a>
          </li>
          <?php 
            if (isset($_SESSION['idUsuarios'])) {?>
                 <li class="nav-item">
                  <a class="nav-link" href="perfil/perfil.php"><?php echo $_SESSION['nombres'];?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="boton" href="crud/usuarios/cerrar_sesion.php">Cerrar sesión</a>
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
  <?php
  //  Consulta categoria

  ?>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4"><img class="logo" src="svg/logo3.svg" alt=""></h1>
        <div class="menu_acordion">
          <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                     Xbox 360
                  </button>
                </h5>
              </div>
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                     <div class="row">
                       <div class="col-12 mb-3">
                        <form action="tienda.php" method="GET">
                          <input type="hidden" name="plataforma" value="xbox 360">
                          <input type="hidden" name="categoria" value="accion">
                          <input type="submit" class="btn btn-outline-danger btn-block" value="Acción...">
                        </form>
                       </div>
                       <div class="col-12 mb-3">
                         <form action="tienda.php" method="GET">
                          <input type="hidden" name="plataforma" value="xbox 360">
                          <input type="hidden" name="categoria" value="aventura">
                          <input type="submit" class="btn btn-outline-danger btn-block" value="Aventura...">
                         </form>
                       </div>
                       <div class="col-12 mb-3">
                         <form action="tienda.php" method="GET">
                          <input type="hidden" name="plataforma" value="xbox 360">
                          <input type="hidden" name="categoria" value="carreras">
                          <input type="submit" class="btn btn-outline-danger btn-block" value="Carreras...">
                         </form>
                       </div>
                       <div class="col-12 mb-3">
                         <form action="tienda.php" method="GET">
                          <input type="hidden" name="plataforma" value="xbox 360">
                          <input type="hidden" name="categoria" value="deportes">
                          <input type="submit" class="btn btn-outline-danger btn-block" value="Deportes...">
                         </form>
                       </div>
                     </div>
                </div>
              </div>
            </div>
            <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    PLAYSTATION 4
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                 <div class="card-body">
                     <div class="row">
                       <div class="col-12 mb-3">
                        <form action="tienda.php" method="GET">
                          <input type="hidden" name="plataforma" value="ps4">
                          <input type="hidden" name="categoria" value="accion">
                          <input type="submit" class="btn btn-outline-danger btn-block" value="Acción...">
                        </form>
                       </div>
                       <div class="col-12 mb-3">
                         <form action="tienda.php" method="GET">
                          <input type="hidden" name="plataforma" value="ps4">
                          <input type="hidden" name="categoria" value="aventura">
                          <input type="submit" class="btn btn-outline-danger btn-block" value="Aventura...">
                         </form>
                       </div>
                       <div class="col-12 mb-3">
                         <form action="tienda.php" method="GET">
                          <input type="hidden" name="plataforma" value="ps4">
                          <input type="hidden" name="categoria" value="carreras">
                          <input type="submit" class="btn btn-outline-danger btn-block" value="Carreras...">
                         </form>
                       </div>
                       <div class="col-12 mb-3">
                         <form action="tienda.php" method="GET">
                          <input type="hidden" name="plataforma" value="ps4">
                          <input type="hidden" name="categoria" value="deportes">
                          <input type="submit" class="btn btn-outline-danger btn-block" value="Deportes...">
                         </form>
                       </div>
                     </div>
                </div>
              </div>
            </div>
            <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Xbox one
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                     <div class="row">
                       <div class="col-12 mb-3">
                        <form action="tienda.php" method="GET">
                          <input type="hidden" name="plataforma" value="xbox one">
                          <input type="hidden" name="categoria" value="accion">
                          <input type="submit" class="btn btn-outline-danger btn-block" value="Acción...">
                        </form>
                       </div>
                       <div class="col-12 mb-3">
                         <form action="tienda.php" method="GET">
                          <input type="hidden" name="plataforma" value="xbox one">
                          <input type="hidden" name="categoria" value="aventura">
                          <input type="submit" class="btn btn-outline-danger btn-block" value="Aventura...">
                         </form>
                       </div>
                       <div class="col-12 mb-3">
                         <form action="tienda.php" method="GET">
                          <input type="hidden" name="plataforma" value="xbox one">
                          <input type="hidden" name="categoria" value="carreras">
                          <input type="submit" class="btn btn-outline-danger btn-block" value="Carreras...">
                         </form>
                       </div>
                       <div class="col-12 mb-3">
                         <form action="tienda.php" method="GET">
                          <input type="hidden" name="plataforma" value="xbox one">
                          <input type="hidden" name="categoria" value="deportes">
                          <input type="submit" class="btn btn-outline-danger btn-block" value="Deportes...">
                         </form>
                       </div>
                     </div>
                </div>
              </div>
            </div><!--Cierre del ultimo accordion-->
            <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
          </div>
        </div><!--Cierre del contenedor del accordion-->

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="imagenes/slider1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="imagenes/slider2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="imagenes/slider3.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
              <div class=" col-sm-5 mb-5" >
                  <div class="card" >
                    <div class="card-body">
                      <h5 class="card-title">Special nuevos juegos</h5>
                      <p class="card-text">1->8,0. Pokémon Espada / Pokémon Escudo. Switch. ...<br>2->6,5. Blacksad: Under the Skin. PCPS4XOneSwitchMac. ...
                    <br>3->Diablo IV. PCPS4XOne. Rol > Acción RPG / Por determinar. ...<br>4->Age of Empires II: Definitive Edition. PC. ...
                  <br>5->Star Wars Jedi: Fallen Order. PCPS4XOne. ...<br>6->Death Stranding. PCPS4. ...<br>7->Kingdom Under Fire II. PCPS4. ...<br>......</p>
                      <!-- <a href="#" class="btn btn-primary">Ver las novedades</a> --><br>
                    </div>
                  </div>
                </div>
                <div class="card col-md-7 mb-5">
                    <img src="imagenes/novedades.jpg" class="card-img-top" alt="...">
                    <div class="card-body" >
                      <h5 class="card-title">Death Stranding 2º trimestre de 2020</h5>
                      <p class="card-text">Death Stranding es el primer gran proyecto de Hideo Kojima tras su polémica salida de Konami, y después del cierre de su mano 
                        sobre la saga Metal Gear con el controvertido Metal Gear Solid 5: The Phantom Pain. El prestigioso creativo nipón recupera el pulso de los videojuegos 
                        con esta obra desarrollada por la propia Kojima Productions y que se lanza en PC y PlayStation 4..</p>
                      <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                    </div>
                </div>
                <ul class="list-unstyled">
                <?php 
                  include('crud/conexion.php');
                  $consul=mysqli_query($con,"SELECT descripcion,imagen,nombre,Productos_idProductos, COUNT(Productos_idProductos) from ventas INNER JOIN productos WHERE ventas.Productos_idProductos=idProductos
                  Group by Productos_idProductos 
                  Order by count(1) desc LIMIT 3");
                  while ($f=mysqli_fetch_array($consul)) { ?>
                    <li class="media mb-3">
                      <img src="imagenes/<?= $f['imagen'];?>" class="mr-3" alt="...">
                      <div class="media-body">
                        <h5 class="mt-0 mb-1"><?= $f['nombre']; ?>: Lo más vendido</h5>
                        <p class="text_vendido"><?=$f['descripcion']; ?>.<p>
                      </div>
                    </li>   
                 <?php
                  }
                 ?>
                  </ul>         
               </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>
