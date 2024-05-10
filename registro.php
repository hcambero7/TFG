<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adicional.css">
    <link rel="stylesheet" href="css/adicional2.css">
    <link rel="stylesheet" href="css/registro.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Login</title>
  </head>
  <body>
    <header>
      <div class="container">
          <nav class="navbar navbar-expand-lg fixed-top">
              <div class="container-fluid">
                  <a href="index.html" class="navbar-brand"><img src="img/logo.jpeg" alt="" height="100px"></a>
                  <nav>
                      <a href="index.html">Inicio</a>
                      <a href="php/productos.php">Productos</a>
                      <a href="contacto.html">Contacto</a>
                      <a href="login.php">Login</a>
                  </nav>
              </div>
          </nav>
      </div>
    </header>

    <div class="login-box ">
      <h2>Reguistro</h2>
      <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <div class="user-box">
          <input type="text" name="nombre" required="">
          <label>Nombre</label>
        </div>
        <div class="user-box">
            <input type="text" name="apellidos" required="">
            <label>Apellidos</label>
        </div>
        <div class="user-box">
            <input type="texto" name="telefono" required="">
            <label>Telefono</label>
        </div>
        <div class="user-box">
            <input type="email" name="correo" required="">
            <label>Email</label>
        </div>
        <div class="user-box">
            <input type="text" name="usuario" required="">
            <label>Usuario</label>
        </div>
        <div class="user-box">
          <input type="password" name="contra" required="">
          <label>Contraseña</label>
        </div>
        <a>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Enviar
        </a>
      </form>
    </div>
  </body>
</html>
<?php
    function limpiar($valor){
      $valor = htmlspecialchars($valor);
      $valor = trim($valor);
      return $valor;
    }

    if(!empty($_POST["nombre"])){
      $name = limpiar($_POST["nombre"]);
    }else{
      $error[]="Debes de introducir tu nombre <br>";
    }

    if(!empty($_POST["apellidos"])){
      $lastname = limpiar($_POST["apellidos"]);
    }else{
      $error[]="Debes de introducir tus apellidos <br>";
    }

    if(!empty($_POST["telefono"])){
      $phone = limpiar($_POST["telefono"]);
    }else{
      $error[]="Debes de introducir tu telefono <br>";
    }

    if(!empty($_POST["correo"])){
      $email = limpiar($_POST["correo"]);
    }else{
      $error[]="Debes de introducir tu email <br>";
    }

    if(!empty($_POST["usuario"])){
      $usuario = limpiar($_POST["usuario"]);
    }else{
      $error[]="<br>Debes de introducir el usuario <br>";
    }

    if(!empty($_POST["contra"])){
      $password = limpiar($_POST["contra"]);
    }else{
      $error[]="Debes de introducir la contraseña <br>";
    }

    if(!empty($error)){
      echo "<p style:color:'red'>";
      foreach($error as $valor){
        echo $valor;
      }
      echo "</p>";
    }else{
        $password=md5($contra);
        $conex = new mysqli("localhost", "Hugo14", "V[VH4LlzAkREe]Sy", "tienda");
            if(mysqli_connect_errno()){
                printf("Conexion fallida");
                exit();
            }else{
                $query= "INSERT INTO `usuarios`(`name`, `lastname`, `phone`, `email`, `username`, `password`) VALUES ('$name','$lastname','$phone','$email','$username','$password')";
                if($result = $conex->query($query)){
                    $result->data_seek(0);
                    if($fila = $result -> fetch_assoc()){
                        echo"<br>";
                        printf("NOMBRE %s\n <br> USUARIO %s\n <br>" ,$fila["name"], $fila["username"]);
                        session_start();
                        $_SESSION['username']=$fila['username'];
                        header('Location: login.php');
                    }
                }
            }
        $conex -> close();
    }
?>