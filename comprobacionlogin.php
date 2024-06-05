<?php
    require_once("config.php");
        $errors = [];
    
        if(!empty($_POST['username']) && !empty($_POST['contrasena'])){
            $usuario = $_POST['username'];
            $contrasena = $_POST['contrasena'];
    
            $usuario = trim(htmlspecialchars($usuario));
            $contrasena = trim(htmlspecialchars($contrasena));
        }else {
            $errors[] = "Nombre o email no pueden estar vacios.";
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
    
                $sql = "SELECT name FROM usuarios WHERE username = :usuario AND password = :contrasena";
                $stmt = $conex->prepare($sql);
                $stmt->bindParam(':usuario', $nombre);
                $stmt->bindParam(':contrasena', $password);
                $stmt->execute();
    
                header('Location: productos.html');
    
            }catch(PDOException $e){
                echo "Error " . $e->getMessage();
            }
        }
?>