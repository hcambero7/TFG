<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adicional.css">
    <link rel="stylesheet" href="css/adicional2.css">
    <link rel="stylesheet" href="css/login.css">
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
                  </nav>
              </div>
          </nav>
      </div>
    </header>

    <div class="login-box">
      <h2>Login</h2>
      <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <div class="user-box">
          <input type="text" name="usuario" required>
          <label>Usuario</label>
        </div>
        <div class="user-box">
          <input type="password" name="password" required>
          <label>Contraseña</label>
        </div>
        <a>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Enviar
        </a>
        <a>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Registrate
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
    if(!empty($_POST["usuario"])){
      $username = limpiar($_POST["usuario"]);
    }else{
      $error[]="<br>Debes de introducir el usuario <br>";
    }

    if(!empty($_POST["password"])){
      $password = limpiar($_POST["password"]);
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
                $query= "SELECT * FROM  tienda WHERE username = '$username' and password = '$password'";
                if($result = $conex->query($query)){
                    $result->data_seek(0);
                    if($fila = $result -> fetch_assoc()){
                        echo"<br>";
                        printf("BIENVENIDO %s\n <br>", $fila["name"]);
                        session_start();
                        $_SESSION['name']=$fila['name'];
                        header('Location: index.html');
                    }
                }
            }
        $conex -> close();
    }
?>