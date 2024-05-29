<?php
    require_once("config.php");

    function limpiar($valor){
        $valor = htmlspecialchars($valor);
        $valor = trim($valor);
        return $valor;
      }
  
      if(!empty($_POST["nombre"])){
        $name = limpiar($_POST["nombre"]);
      }else{
        $error[]="<br>Debes de introducir el nombre <br>";
      }
  
      if(!empty($_POST["apellidos"])){
        $lastname = limpiar($_POST["apellidos"]);
      }else{
        $error[]="<br>Debes de introducir los apellidos <br>";
      }
      
      if(!empty($_POST["telefono"])){
        $phone = limpiar($_POST["telefono"]);
      }else{
        $error[]="<br>Debes de introducir el telefono <br>";
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

      $mail=null;
  
      if(!empty($error)){
        echo "<p style='color:red';>";
        foreach($error as $valor){
          echo $valor;
        }
        echo "</p>";
      }else{
          $password=md5($contra);
          $this->db = new PDO(dsn,BBDD_USER,BBDD_PASSWORD);
              if(mysqli_connect_errno()){
                  printf("Conexion fallida");
                  exit();
              }else{
                $conexion= $this->db = new PDO(dsn,BBDD_USER,BBDD_PASSWORD);
                if($conexion->connect_errno){
                    echo "Conexion fallida";
                    exit;
                } else {
                    $preparada = $conexion->prepare("INSERT INTO tienda values $name, $lastname, $phone, $mail, $username, $password");
                    $preparada->execute();
                    if($conexion->affected_rows > 0){
                        echo "insertado";
                    } else {
                        echo "No se ha insertado ningún registro";
                    }
                }
              }
          $conexion -> close();
      }


