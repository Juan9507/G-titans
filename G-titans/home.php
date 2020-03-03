<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <!--tipo de letra-->
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet"> 
    <script src="https://kit.fontawesome.com/c5f9d99660.js" crossorigin="anonymous"></script>
    <!--FONT AWESOM--> 
    <!-- <script src="https://kit.fontawesome.com/8af95f6543.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="css/home.css">
    <!-- http icono -->
    <link rel="Shortcut Icon" href="logo/favicon.ico" type="image/x-icon" />
    <title>home</title>
</head>
<body>  
      <div class = "container"> <!--contenedor para todo el home-->
         <div class=row><!--creamos la fila con bootstrap-->
                <div class = "col-sm-6 my-4"><!--numero de columnas y sm para dispositivos pequeños-->
                    <a href="inicio.php">
                       <img class = "logo" src="logo/logoFD(4).png" alt="">
                    </a>
                    
                </div>
            <div class="col-sm-6 my-5 list-inline text-right"><!--numero de columnas y sm para dispositivos pequeños-->
                 <ul class="list-unstyled my-4 mover"><!--Quita el punto que aparece en la lista-->
                     <li class="list-inline-item"><!--Posiciona el texto uno al lado del otro-->
                         <a class="btn btn-danger" href="inicio.php">
                            Ir al inicio
                         </a>
                     </li>
                     <li class="list-inline-item"><!--Posiciona el texto uno al lado del otro-->
                         <a class="btn btn-dark" href="crud/usuarios/form_usuario.php">
                            Crear cuenta
                         </a>
                     </li>
                     <li class="list-inline-item ml-3"><!--Posiciona el texto uno al lado del otro-->
                         <a class="btn btn-dark" href="crud/usuarios/login.php"><!--Diseño del a-->
                             Iniciar sesión
                         </a>
                     </li>
                 </ul>
            </div>
            <div class ="col-sm-12 text-center display-4">
                  <h1>Technology and gaming</h1>
            </div>
            <div class="col-sm-6">
                   <a href="inicio.php">
                      <img src="imagenes/imagen_home.png" class="img-fluid" data-container="body" data-toggle="popover-hover"  title="G-TITANS"  
                      data-content="Te invito para que le des click a la imagen y puedas conocer la pagina ideal para comprar tus juegos"><!--Acomoda la imagen al tamaño del contenedor--><!--<img src='imagenes/imagen_home.png' width='200' /><br>Toggle popover-->
                  </a>
            </div>
            <div class="col-sm-6 p-5 mt-4 text-center">
                  <!-- <a href="inicio.php"> -->
                     <p>Estimada o estimado visitante, 
                        Me complace darle la más cordial bienvenida al sitio web G-titans.
                        Este portal le informa sobre los mejores videojuegos que puedes comprar a un muy buen precio y recibirlo a la puerta de tu casa, además encontrarán información sobre noticias de nuevos juegos.</p>
                  <!-- </a> -->
                  <ul class="list-unstyled list-inline mt-4"><!--quitamos el punto de la lista y posicinamos cada iciono-->
                    <li class="list-inline-item"><!--Posicionamos un elemento al lado del otro-->
                        <a href="">
                            <i class="fab fa-facebook-f"></i><!--especificar iconos-->
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="">
                            <i class="fab fa-twitter"></i><!--especificar iconos-->
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="">
                            <i class="fab fa-instagram"></i><!--especificar iconos-->
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="">
                            <i class="fab fa-youtube"></i><!--especificar iconos-->
                        </a>
                    </li>
                </ul>
            </div>
         </div>            
      </div>
      <!-- Footer -->
  <footer class="py-5 bg-dark">
    <!-- <div class="container"> -->
      <p class="m-0 text-center text-white">Copyright &copy; G-titans 2019</p>
    <!-- </div> -->
    <!-- /.container -->
  </footer> 
      <script src="js/jquery-3.4.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/bootstrap.bundle.js"></script>
      <script>    
	 $('[data-toggle="popover-hover"]').popover({
          //trigger: 'focus',
		  trigger: 'hover',
          html: true,
          placement: 'bottom',
          content: function () {
				return '<img src="'+$(this).data('img') + '" />';
          },
          title: 'Toolbox'
});
      </script>
</body>
</html>