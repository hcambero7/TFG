<?php
    require_once("config.php");
    $conn = new PDO(DSN, BBDD_USER, BBDD_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $getMesg = $_POST['data'];
    $getMesg = htmlspecialchars($getMesg); 

    
    $check_data = "SELECT replies FROM chatbot WHERE queries LIKE ?";
    $stmt = $conn->prepare($check_data);
    $stmt->execute(["%$getMesg%"]);

    
    if ($stmt->rowCount() > 0) {   
        $fetch_data = $stmt->fetch(PDO::FETCH_ASSOC);
        $reply = $fetch_data['replies'];
        echo $reply;
    } else {
        echo "¡Lo siento, no puedo ayudarte con este inconveniente! Favor comunícate con el administrador en el siguiente enlace: <a href='contacto.html'>Contacto</a>";
    }
?>