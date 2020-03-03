<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/inicio.css">
    <!-- http icono -->
  <link rel="Shortcut Icon" href="../logo/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../css/agency.min.css">
    <link rel="stylesheet" href="contactanos.css">
    <script src="https://kit.fontawesome.com/c5f9d99660.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Contactanos</title>
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
            <a class="nav-link" href="../inicio.php">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../tienda.php">Tienda</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Contáctanos</a>
          </li>
          <?php 
            if (isset($_SESSION['idUsuarios'])) {?>
                 <li class="nav-item">
                  <a class="nav-link" href="../perfil/perfil.php"><?php echo $_SESSION['nombres'];?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="boton" href="../crud/usuarios/cerrar_sesion.php">Cerrar sesión</a>
                 </li>
             <?php
              }else{?>
                <li class="nav-item">
                   <a class="nav-link" id="boton" href="../crud/usuarios/form_usuario.php">Crear cuenta</a>
                 </li>
                  <li class="nav-item">
                    <a class="nav-link" id="boton" href="../crud/usuarios/login.php">login</a>
                  </li>
             <?php
              }
             ?>
        </ul>
      </div>
    </div>
  </nav><br>
  <!-- Fin Navigation -->
  <div class="container mb-5">
      <h2>Toggleable Tabs</h2>
      <br>
       <!-- Nav tabs -->
       <ul class="nav nav-tabs">
         <li class="nav-item">
           <a class="nav-link active" data-toggle="tab" href="#home">G-titans</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" data-toggle="tab" href="#menu1">Misión</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" data-toggle="tab" href="#menu2">Visión</a>
         </li>
       </ul>
       <!-- Tab panes -->
       <div class="tab-content">
          <div id="home" class="container tab-pane active"><br>
            <!-- <h3>G-titans</h3> -->
            <img class="logo" src="../logo/logoFD(4).png" alt="">
            <p><i>G-TITANS es un proyecto diseñado para ejecutar un Sistema de Gestión de Puntos de Ventas
                  enfocado en comercializar videojuegos en línea.
                  Para lo cual desarrollamos un análisis de la industria del videojuego en Colombia a fin de identificar
                  su problemática, sus objetivos, las oportunidades de negocio y de crecimiento económico,
                  permitiéndonos diseñar la plataforma de un programa que nos permita integrarnos al mundo de la
                  comercialización de videojuegos, de una manera fácil y segura, que son tendencia en el sector de
                  la tecnología, un sector muy productivo con grandes fortalezas, donde no existen fronteras y con
                  una estructura distribuida por todo el mundo dada la naturaleza digital del producto....
            </i></p>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <h3>Misión</h3>
            <p><i>La misión de G-Titans es ser la empresa
                  líder en comercialización de productos del
                  mundo Gaming, e innovación en la
                  industria de tecnología en videojuegos
                  para las diferentes plataformas,
                  revolucionando las necesidades de
                  interacción y entretenimiento de nuestros
                  clientes, garantizando el mejor servicio....
            </i></p>
          </div>
          <div id="menu2" class="container tab-pane fade"><br>
            <h3>Visión</h3>
            <p><i>Para el 2024 ser una empresa reconocida a
                  nivel nacional en la venta de videojuegos
                  con nuevas tecnologías, implementando
                  nuevas líneas de servicios y productos con
                  calidad, para que nuestros clientes puedan
                  disfrutar de la mejor dimensión en el
                  desarrollo de videojuegos, brindando
                  satisfacción a sus necesidades....
            </i></p>
          </div>
        </div>
    <!-- Desarrollador -->
    <section class="bg-light page-section" id="team">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Lead Developer</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="team-member">
            <img class="rounded-circle" src="../imagenes/juan.jpg" alt="">
            <h4>Juan Rivera Naranjo</h4>
            <p class="text-muted">Lead Developer</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
        <!-- <div class="col-sm-6">
          <div class="team-member">
            <img class="rounded-circle" src="../imagenes/Snapchat-1096315152.jpg" alt="">
            <h4>Laura Andrea Caicedo</h4>
            <p class="text-muted">Lead Developer</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div> -->
  </section> 
  </div>
  <!-- </div>fin container -->
  <!-- Contact -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Contáctanos</h2>
          <h3 class="section-subheading text-muted">Te responderemos rapido.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form action="mensaje.php" name="mensaje" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" name="nombre" type="text" placeholder="Nombre *" required>
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" name="email" type="email" placeholder="Email *" required="required">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" name="telefono" type="tel" placeholder="Telefono*" required="required">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" name="mensaje" placeholder="Mensaje*" required="required" ></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <input type="submit" class="btn btn-primary btn-xl text-uppercase" value="Enviar mensaje">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
      
    </div>
    <!-- /.container -->
  </footer>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>  
  <script src="../js/popper.min.js"></script>  
</body>
</html>