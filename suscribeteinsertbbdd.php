<?php
require_once("config.php");
    $errors = [];

    if(!empty($_POST['nombre']) && !empty($_POST['email'])){
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];

        $nombre = trim(htmlspecialchars($nombre));
        $email = trim(htmlspecialchars($email));
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

            $sql = "INSERT INTO suscribete (name,email) VALUES (:nombre,:email)";
            $stmt = $conex->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            header('Location: subcribirse.html');

        }catch(PDOException $e){
            echo "Error " . $e->getMessage();
        }
    }

?>