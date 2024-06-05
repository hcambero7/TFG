<?php
    header('Content-Type: application/json');

    require_once("config.php");

    try {
        $conn = new PDO(DSN,BBDD_USER,BBDD_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT name, email FROM suscribete");
        $stmt->execute();

        $suscriptores = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($suscriptores) > 0) {
            echo json_encode($suscriptores);
        } else {
            echo json_encode(array("mensaje" => "No se encontraron suscriptores"));
        }
    } catch(PDOException $e) {
        echo json_encode(array("mensaje" => "Error en la conexión: " . $e->getMessage()));
    }

    $conn = null;
?>
