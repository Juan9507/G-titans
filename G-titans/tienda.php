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
  <title>Tienda</title>
  <!-- Bootstrap core CSS -->
  <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
  <!-- Custom styles for this estilos -->
  <link href="css/inicio.css" rel="stylesheet">
  <!-- http icono -->
  <link rel="Shortcut Icon" href="logo/favicon.ico" type="image/x-icon" />
  <link href="css/juego.css" rel="stylesheet">
  <!-- Lin css buscador juego -->
  <link rel="stylesheet" href="jquery-editable-select-master/src/jquery-editable-select.css">
  <!-- Lin css Swiper -->
  <link rel="stylesheet" href="css/swiper.min.css">
  <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
  <!-- Css estrellas -->
  <!-- <script src="https://kit.fontawesome.com/c5f9d99660.js" crossorigin="anonymous"></script> -->
  <style>
  .swiper-container {
      width: 100%;
      height: 100%;
    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      
    }
  </style>
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
          <li class="nav-item">
            <a class="nav-link" href="inicio.php">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item active">
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

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-4">

        <h1 class="my-4"><img class="logo" src="svg/logo3.svg" alt=""></h1>
        

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-8 mb-2">

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

        <!-- <div class="row"> -->
        
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
        <div class="container">
         <div class="row">
          <div class="col-4">
          </div>
          <div class="col-6 mb-5">
              <!-- consulta producto -->
              <?php
              include("crud/conexion.php");
              $query_juego="SELECT idProductos,nombre,nombre_pla FROM productos INNER JOIN plataforma WHERE productos.plataforma_idPlataforma=plataforma.id_plataforma && estado=1";
              $resultado_juego=$con->query($query_juego);
              ?>
              <h5 for="">Buscar un juego en especifico</h5>
              <form action="ver_juego/ver_juego.php" method="GET">
              <input type="hidden" name="idProductos" id="idProductos1">
                <select id="editable" name="idProductos1"  class="form-control" required>
                <?php while ($row=$resultado_juego->fetch_assoc()) { ?>
                  <option data-cc="<?=$row['idProductos'];?>"><?=$row['nombre']." (".$row['nombre_pla'].")";?></option>
                  <?php
                }
                ?>
                </select>
          </div>
          <div class="col-1 align-self-end mb-5">
              <input type="submit" class="btn btn-secondary" value="enviar">
              </form>
              </div>
         </div>
         <div class="row">
           <?php 
            // CONSULTA ENVIADA DESDE LA PAGINA DE INICIO
            //include('crud/conexion.php');
            if (isset($_GET["plataforma"],$_GET["categoria"])) {
              $plataforma=$_GET["plataforma"];
              $categoria=$_GET["categoria"];
              // print_r($_POST);
              $resul=mysqli_query($con,"select idProductos,imagen,nombre,nombre_ca,nombre_pla,valorunitario from productos INNER JOIN categoria,plataforma WHERE productos.juego_idJuego=categoria.id_juego && productos.plataforma_idPlataforma=plataforma.id_plataforma && estado=1 && nombre_ca='$categoria' && nombre_pla='$plataforma' ")or die(mysqli_error($con));
            while ($f=mysqli_fetch_array($resul)) { ?>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="imagenes/<?php echo $f['imagen'];?>" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo $f['nombre']; ?></a>
                  </h4>
                  <h5>Precio: $<?php echo $f['valorunitario']; ?></h5>
                  <h5>Categoria: <?php echo $f['nombre_ca']; ?></h5>
                  <h5><a class="btn btn-secondary btn-sm btn-block" href="ver_juego/ver_juego.php?idProductos=<?php echo $f['idProductos'];?>">Ir al juego</a></h5> 
                </div>
              </div>
            </div>
            <?php
            }
            ?>
            </div>
            <?php
           }else{
            $resul=mysqli_query($con,"select idProductos,imagen,nombre,nombre_ca,nombre_pla,valorunitario from productos INNER JOIN categoria,plataforma WHERE productos.juego_idJuego=categoria.id_juego && productos.plataforma_idPlataforma=plataforma.id_plataforma && id_plataforma=2 && estado=1")or die(mysqli_error($con));?>
            <!-- <h1>Juegos PlayStation 4</h1> -->
            <!-- <div class="row"> -->
              <div class="col-lg-12 text-center mb-5">
                <img class="ps4" src="imagenes/ps4.png" alt="">
              </div>
            <!-- </div> -->
            <div class="swiper-container"><!--COMIENZO SWIPER-->
              <div class="swiper-wrapper">
                <?php while ($f=mysqli_fetch_array($resul)) { ?>
                <!-- <div class="col-lg-3 col-md-6 mb-4"> -->
                  <div class="card h-100 swiper-slide">
                      <a><img class="card-img-top" src="imagenes/<?php echo $f['imagen'];?>" alt=""></a>
                      <div class="card-body">
                        <h4 class="card-title">
                          <a href="ver_juego/ver_juego.php?idProductos=<?php echo $f['idProductos'];?>"><?php echo $f['nombre']; ?></a>
                        </h4>
                        <h5>Precio: $<?php echo $f['valorunitario']; ?></h5>
                        <h5>Categoria: <?php echo $f['nombre_ca']; ?></h5>
                        <h5><a class="btn btn-secondary btn-sm btn-block" href="ver_juego/ver_juego.php?idProductos=<?php echo $f['idProductos'];?>">Ir al juego</a></h5> 
                      </div>
                </div>
                <!-- </div> -->
                <!-- Add Pagination -->
                <?php
                    }
                  
                ?>
                <!-- Add Pagination -->
              </div><br><br>
              <div class="swiper-pagination"></div>
            </div><br><!--FIN SWIPER-->
            <!-- SIGUIENTE SWIPER -->
            <div class="col-lg-12 text-center mb-5">
              <img class="xbox360" src="imagenes/xbox360.png" alt="">
            </div>
            <?php $resul=mysqli_query($con,"select idProductos,imagen,nombre,nombre_ca,nombre_pla,valorunitario from productos INNER JOIN categoria,plataforma WHERE productos.juego_idJuego=categoria.id_juego && productos.plataforma_idPlataforma=plataforma.id_plataforma && id_plataforma=1 && estado=1")or die(mysqli_error($con));?>
            <div class="swiper-container"><!--COMIENZO SWIPER-->
              <div class="swiper-wrapper">
                <?php while ($f=mysqli_fetch_array($resul)) { ?>
                <!-- <div class="col-lg-3 col-md-6 mb-4"> -->
                  <div class="card h-100 swiper-slide">
                      <a href="#"><img class="card-img-top" src="imagenes/<?php echo $f['imagen'];?>" alt=""></a>
                      <div class="card-body">
                        <h4 class="card-title">
                          <a href="#"><?php echo $f['nombre']; ?></a>
                        </h4>
                        <h5>Precio: $<?php echo $f['valorunitario']; ?></h5>
                        <h5>Categoria: <?php echo $f['nombre_ca']; ?></h5>
                        <h5><a class="btn btn-secondary btn-sm btn-block" href="ver_juego/ver_juego.php?idProductos=<?php echo $f['idProductos'];?>">Ir al juego</a></h5> 
                      </div>
                </div>
                <!-- </div> -->
                <!-- Add Pagination -->
                <?php
                    }
                  }
                ?>
                <!-- Add Pagination -->
              </div><br><br>
              <div class="swiper-pagination"></div>
            </div><!--FIN SWIPER-->

             <!-- FIN LOGICA DE COMPRA -->
          </div>
        </div>   
        <!-- FIN CONSULTA ENVIADA DESDE LA PAGINA DE INICIO  -->
      </div>
     </div>
  </div>
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
  <script src="jquery-editable-select-master/src/jquery-editable-select.js"></script>
  <script src="js/swiper.min.js"></script>
  <!-- <script>
    window.onload = function () {
    $('#editable').editableSelect();
    }
  </script> -->
  <script> 
	$('#editable').editableSelect({
		//  ... sus opciones de configuración del complemento
	}).on('select.editable-select', function (e,el) {
		 // el es el elemento seleccionado "opción" 
		$ ('#idProductos1').val(el.data('cc'));
	});
</script>

<script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 3,
      spaceBetween: 30,
      freeMode: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
  </script>
</body>

</html>