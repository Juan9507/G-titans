<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Bootstrap core CSS -->
    <link href="../../bootstrap/bootstrap.min.css" rel="stylesheet">
     <!-- Custom styles for this template -->
    <link href="../../css/shop-homepage.css" rel="stylesheet">
     <!-- Custom styles for this estilos -->
    <!-- <link href="../../css/inicio.css" rel="stylesheet"> -->
    <link href="../../css/login.css" rel="stylesheet">
    <link href="../../css/home.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <!------ Include the above in your HEAD tag ---------->
        <div class="wrapper fadeInDown">
          <div id="formContent">
             <!-- Tabs Titles -->
             <!-- Icon -->
             <div class="fadeIn first">
               <img src="../../svg/logo3.svg" id="icon" alt="User Icon" />
             </div>
                <!-- Login Form -->
                <form action="login.php" method="post">
                    <input type="email" id="login" class="fadeIn second" name="correo" required=""  placeholder="Email">
                    <input type="password" id="password" class="fadeIn third" name="contraseña" required="" placeholder="Password">
                    <input type="submit" class="fadeIn fourth" value="Log In">
                </form>
                <!------- VALIDACION DEL LOGIN (INICIO DE SESION) ---------->
          <?php
            if (isset($_POST['correo']) && $_POST['contraseña']!='') {
                include("../conexion.php");
                $correo = $_POST['correo'];
                $contraseña = $_POST['contraseña'];
                $contrasenia_encrip=md5($contraseña);
                $consulta = mysqli_query($con,"SELECT * FROM usuarios WHERE correo = '$correo'");  
                if($f2=mysqli_fetch_array($consulta)){
                    if($contrasenia_encrip==$f2['clave'] && $f2['Roles_idRoles']==1){
                        $_SESSION['idUsuarios']=$f2['idUsuarios'];
                        $_SESSION['nombres']=$f2['nombres'];
                        $_SESSION['Roles_idRoles']=$f2['Roles_idRoles'];?>
                        <!-- <script>alert("BIENVENIDO ADMINISTRADOR")</script>  -->
                        <script>location.href='../../admin/admin.php?idUsuarios=<?php echo $_SESSION['idUsuarios'] ;?>'</script>
                      <?php  
                    }elseif($contrasenia_encrip==$f2['clave'] && $f2['Roles_idRoles']==2){
                            $_SESSION['idUsuarios']=$f2['idUsuarios'];
                            $_SESSION['nombres']=$f2['nombres'];?>
                            <!-- <script>alert("BIENVENIDO")</script>  -->
                            <script>location.href='../../inicio.php?idUsuarios=<?php echo $_SESSION['idUsuarios'] ;?>'</script>
                          <?php  
                        }else{
                           echo "<div class='alert alert-danger' role='alert'>
                           Correo o Contraseña incorrecta
                         </div>";
                        } 
                    }     
                }    
              ?>
                <!-- Remind Passowrd -->
                <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
                </div>
            </div>
        </div>
     


    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>
</html>