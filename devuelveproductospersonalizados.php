<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    header('Content-Type: application/json');

    require_once("config.php");

    try {
        $conn = new PDO(DSN,BBDD_USER,BBDD_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT name, phone, imagen, mensaje FROM pedidopersonalizado");
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($result)) {
            echo json_encode(["mensaje" => "No hay productos personalizados."]);
        } else {
            echo json_encode($result);
        }
    } catch (PDOException $e) {
        echo json_encode(["mensaje" => "Error: " . $e->getMessage()]);
    }

    $conn = null;
?>
