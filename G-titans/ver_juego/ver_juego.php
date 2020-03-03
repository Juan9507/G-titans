<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="ver_juego.css">
    <!-- http icono -->
    <link rel="Shortcut Icon" href="logo/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../css/starrr.css">
    <script src="https://kit.fontawesome.com/c5f9d99660.js" crossorigin="anonymous"></script>
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <title>Juego</title>
</head>
  <!-- Js para estrellas -->
  <script type="text/javascript">(function(d, t, e, m){
    
    // Async Rating-Widget initialization.
    window.RW_Async_Init = function(){
                
        RW.init({
            huid: "447064",
            uid: "c70e5226b17e18799f9d6d7b8b4c5d34",
            source: "website",
            options: {
                "advanced": {
                    "font": {
                        "hover": {
                            "color": "#3C68BB"
                        },
                        "italic": true,
                        "color": "#3C68BB",
                        "type": "arial"
                    }
                },
                "size": "large",
                "label": {
                    "background": "#B6C3DB"
                },
                "lng": "es",
                "style": "oxygen1_blue",
                "isDummy": false
            } 
        });
        RW.render();
    };
        // Append Rating-Widget JavaScript library.
    var rw, s = d.getElementsByTagName(e)[0], id = "rw-js",
        l = d.location, ck = "Y" + t.getFullYear() + 
        "M" + t.getMonth() + "D" + t.getDate(), p = l.protocol,
        f = ((l.search.indexOf("DBG=") > -1) ? "" : ".min"),
        a = ("https:" == p ? "secure." + m + "js/" : "js." + m);
    if (d.getElementById(id)) return;              
    rw = d.createElement(e);
    rw.id = id; rw.async = true; rw.type = "text/javascript";
    rw.src = p + "//" + a + "external" + f + ".js?ck=" + ck;
    s.parentNode.insertBefore(rw, s);
    }(document, new Date(), "script", "rating-widget.com/"));</script>
  <!--Fin Js para estrellas -->
<body>
    <?php
    include('../crud/conexion.php');
    $idProductos=$_GET['idProductos'];
    //$idProductos1=$_GET['idProductos1'];
    // echo $idProductos;
    $resul=mysqli_query($con,"select idProductos,imagen,nombre,nombre_ca,nombre_pla,valorunitario,descripcion,trailer from productos INNER JOIN categoria,plataforma WHERE productos.juego_idJuego=categoria.id_juego && productos.plataforma_idPlataforma=plataforma.id_plataforma && idProductos='".$idProductos."' ")or die(mysqli_error($con));
    $f=mysqli_fetch_array($resul);
    ?>
     <div class="imagen" style="background-image: linear-gradient(rgba(20,30,48,.8), rgba(36,59,85,.7)),url('../imagenes/<?=$f['imagen']; ?>');">
         <div class="container"><br>
             <div class="row">
                  <div class="col-sm-5">
                      <img src="../imagenes/<?= $f['imagen']?>" class="img-fluid" data-container="body" data-toggle="popover-hover"  title="G-TITANS"  
                      data-content="Te invito para que le des click a la imagen y puedas conocer la pagina ideal para comprar tus juegos"><!--Acomoda la imagen al tamaño del contenedor--><!--<img src='imagenes/imagen_home.png' width='200' /><br>Toggle popover-->
                  </div>
                  <div class="col-md-6" style="margin-left: 17px;">
                   <h2><?= $f['nombre']; ?></h2>
                   <span class="original"><strong>Título original:</strong> <?= $f['nombre']; ?></span>
                   <br/>
                   <span class="original">Géneros: <?= $f['nombre_ca']; ?></span><br/>
                    </p>
                    <hr/>
                   </b> <div class="rw-ui-container"></div>
                    <hr/>
                    <?php
                    if (isset($_SESSION['idUsuarios'])) { ?>
                        <h5><a class="btn btn-secondary btn-sm btn-block" href="../crud/ventas/form_ventas.php?idProductos=<?php echo $f['idProductos'];?>">Comprar</a></h5> 
                    <?php
                      }else{ ?>
                        <h5><a class="btn btn-secondary btn-sm btn-block" data-toggle="modal" data-target="#ModalCompra">Comprar</a></h5>
                    <?php
                      }
                    //  }
                    
                    ?>
                    <!--FIN LOGICA DE COMPRAR --> 
                    <h4> SINOPSIS</h4>
                   <i><?= $f['descripcion']; ?></i>
                     <iframe type="text/html" width="100%" height="300" src="<?=$f['trailer'];?>?rel=0" frameborder="0" allowfullscreen></iframe>
                     <!-- https://developers.google.com/youtube/player_parameters?hl=es#rel -->
                </div>
             </div>
         </div>
         <!-- MODAL PARA MOSTRAR MENSAJE DI NO HA INICIADO SESION -->
        <div class="modal fade" id="ModalCompra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Oh, no has iniciado sesion!</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                Primero debes de registarte o iniciar sesión para poder realizar la compra
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="../crud/usuarios/login.php" method="post">
                <input type="submit" class="btn btn-primary" value="Iniciar sesión">
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- FIN MODAL PARA MOSTRAR MENSAJE DE NO HA INICIADO SESION -->
         <footer class="py-5 bg-dark">
            <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
            </div>
            <!-- /.container -->
        </footer>
    </div>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/starrr.js"></script>
    <script>
     $('#Estrellas').starrr({
       rating:3,
       change:function(e,valor){
           alert(valor);
           
       }
       
   });
    </script>
</body>
</html>