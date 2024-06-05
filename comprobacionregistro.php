<?php
    require_once("config.php");
    $errors = [];

    if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['telefono']) && !empty($_POST['usuario']) && !empty($_POST['contrasena'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        $nombre = trim(htmlspecialchars($nombre));
        $apellido = trim(htmlspecialchars($apellido));
        $telefono = trim(htmlspecialchars($telefono));
        $usuario = trim(htmlspecialchars($usuario));
        $contrasena = trim(htmlspecialchars($contrasena));
    }else {
        $errors[] = "Los campos no pueden estar vacios.";
    }

    if(!isset($errors)){
        echo "<p stye='color:red;'>";
        foreach($errors as $e){
            echo $e . "<br>";
        }
    }else{

        try{
            $conex = new PDO(DSN,BBDD_USER,BBDD_PASSWORD);
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $password=md5($contrasena);

            $sql = "INSERT INTO usuarios (name, lastname, phone, username, password) VALUES (:nombre,:apellido,:telefono,:usuario,:contrasena)";
            $stmt = $conex->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':contrasena', $password);
            $stmt->execute();

            header('Location: login.php');

        }catch(PDOException $e){
            echo "Error " . $e->getMessage();
        }
    }
?>