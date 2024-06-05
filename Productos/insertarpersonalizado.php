<?php
    require_once("../config.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $phone = $_POST['telefono'];
        $mensaje = $_POST['mensaje'];
        $imagen = $_FILES['imagen'];

        $nombre = trim(htmlspecialchars($nombre));
        $phone = trim(htmlspecialchars($phone));
        $mensaje = htmlspecialchars($mensaje);

        if (!empty($imagen['tmp_name']) && is_uploaded_file($imagen['tmp_name'])) {
            $ruta_temporal = $imagen['tmp_name'];
            $contenido_imagen = file_get_contents($ruta_temporal);
        } else {
            echo "No se ha subido ninguna imagen.";
            exit;
        }

        $conexion = new PDO(DSN,BBDD_USER,BBDD_PASSWORD);

        $sql = "INSERT INTO pedidopersonalizado (name, phone, imagen, mensaje) VALUES (:nombre, :phone, :imagen_contenido, :mensaje)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':imagen_contenido', $contenido_imagen, PDO::PARAM_LOB);
        $stmt->bindParam(':mensaje', $mensaje);

        if ($stmt->execute()) {
            header('Location: proceso.html');
            exit;
        } else {
            echo "Error al subir el producto: " . $stmt->errorInfo()[2];
        }
    }
?>
