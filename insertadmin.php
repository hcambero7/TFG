<?php
    require_once("config.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $precio = $_POST['precio'];
        $tipo = $_FILES['imagen'];
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

        $conexion = new PDO(DSN,BBDD_USER,BBDD_PASSWORD);

        if ($conexion->connect_error) {
            die('Error de conexión: ' . $conexion->connect_error);
        }

        $sql = "INSERT INTO productos (titulo, descripcion, precio, imagen) VALUES ('$titulo', '$subtitulo', '$precio', '$imagen')";

        if ($conexion->query($sql) === TRUE) {
            echo "Producto subido y guardado en la base de datos.";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }

        $conexion->close();
    }

?>
