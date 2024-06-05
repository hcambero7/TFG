<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Regalos y Manualidades Anabel</title>
        <style>
            body {
                background-image: url("img/fondoadmin.jpg");
                background-size: 2000px;
                background-repeat: no-repeat;
                background-position: center;
                margin:200px;
                margin-left:650px;
            }
        </style>
    </head>
    <body>
    <h1>LOGIN ADMIN</h1>
        <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
            <label for="usuario"> Introduce el usuario</label>
            <input type="text" id="usuario" name="usuario">
            <br><br>
            <label for="contra"> Introduce la contraseña</label>
            <input type="password" id="contra" name="contra">
            <br><br>
            <input type="submit" value="Enviar">
        </form>
        <?php
            require_once("config.php");

            session_start();

            function limpiar($valor){
                $valor = htmlspecialchars($valor);
                $valor = trim($valor);
                return $valor;
            }

            $error = [];

            if(!empty($_POST["usuario"])){
                $usuario = limpiar($_POST["usuario"]);
            }else{
                $error[] = "<br>Debes de introducir el usuario o correo <br>";
            }

            if(!empty($_POST["contra"])){
                $contra = limpiar($_POST["contra"]);
            }else{
                $error[] = "Debes de introducir la contraseña <br>";
            }

            if(!empty($error)){
                foreach($error as $valor){
                    echo $valor;
                }
            }else{
                try {
                    $conex = new PDO(DSN,BBDD_USER,BBDD_PASSWORD);
                    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $password = md5($contra);

                    $query = "SELECT username FROM admin WHERE username = :username AND password = :password";
                    $stmt = $conex->prepare($query);
                    $stmt->execute(['username' => $usuario, 'password' => $password]);

                    if($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo "<br>";
                        printf("NOMBRE %s\n <br> ", $fila["name"]);
                        
                        $_SESSION['name'] = $fila['name'];
                        header('Location: admin.html');
                        exit();
                    } else {
                        echo "Usuario o contraseña incorrectos.";
                    }
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            }
        ?>
    </body>
</html>
