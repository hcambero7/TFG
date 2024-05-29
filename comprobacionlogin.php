<?php
    require_once("config.php");

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
      echo "<p style='color:red';>";
      foreach($error as $valor){
        echo $valor;
      }
      echo "</p>";
    }else{
        $password=md5($contra);
        $conexion = $this->db = new PDO(dsn,BBDD_USER,BBDD_PASSWORD);
            if(mysqli_connect_errno()){
                printf("Conexion fallida");
                exit();
            }else{
              $preparada = $this->db->prepare("SELECT username FROM teinda where username =:usuario and password=: password");
              $preparada->bindParam(':usuario',$username);
              $preparada->bindParam(':password',$password);
              $preparada->execute();
              $row=$preparada->fetch();
            }
        $conexion -> close();
    }