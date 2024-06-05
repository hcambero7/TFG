<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Regalos y Manualidades Anabel</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../adicional2.css">
        <link rel="stylesheet" href="../css/adicional.css">
        <link rel="stylesheet" href="../productos.css">
        <style>
            .row {
                background-color: salmon;
                margin-top: 200px;
            }
            .contenedor {
                background: beige;
                text-align: center;
                padding: 20px;
                border: 1px solid blueviolet;
                text-align: left;
            }
            .contenido {
                margin-top: 200px;
            }
            footer {
                margin-top: 100px;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="container">
                <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-pink">
                    <div class="container-fluid">
                        <a href="../index.html" class="navbar-brand">
                            <img src="../img/logo.png" height="100px">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link text-primary" href="../index.html">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-primary" href="../redes.html">Redes Sociales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-primary" href="../productos.html">Productos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-primary" href="../login.php">Iniciar Sesion / Registrarse</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-primary" href="../subcribirse.html">Suscribete</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-primary" href="../ayuda.html">Ayuda</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <div class="container">
            <div class="row">
                <?php

                require_once("../config.php");

                try {

                    $conn = new PDO(DSN,BBDD_USER,BBDD_PASSWORD);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                    $stmt = $conn->prepare("SELECT titulo, imagen, precio, descripcion FROM productos WHERE id = :id");
                    $stmt->bindParam(':id', $id);
                    $id = 2; 
                    $stmt->execute();

                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $producto = $stmt->fetch();

                    if ($producto) {
                        $imagenBase64 = base64_encode($producto["imagen"]);
                        echo '
                        <div class="contenedor col-md-6 col-12 main">
                            <img src="data:image/jpeg;base64,' . $imagenBase64 . '" alt="" height="400px" width="600px">
                        </div>

                        <div class="contenedor col-md-6 col-12 aside">
                            <div class="mb-3">
                                <h1>' . htmlspecialchars($producto["titulo"]) . '</h1>
                                <h5 class="card-subtitle text-muted mb-2">
                                    <p>' . htmlspecialchars($producto["descripcion"]) . '</p>
                                </h5>
                                <h4>' . htmlspecialchars($producto["precio"]) . '€</h4>
                            </div>
                            
                            <form action="">
                                <div class="mb-3 mt-5">
                                    <h1><label for="mensaje" class="form-label">Modificaciones</label></h1>
                                    <textarea class="form-control" name="mensaje" id="Mensaje"></textarea>
                                    <div id="ayuda-correo" class="form-text">
                                        Si lo quieres del mismo color y mismo tamaño INTRODUZCA: Lo quiero igual
                                    </div>
                                    <div id="ayuda-correo" class="form-text">
                                        Si lo quieres de otra manera INTRODUZCA: Los colores, el tamaño, etc...
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-5">Enviar Formulario</button>
                            </form>
                        </div>';
                    } else {
                        echo "No se encontraron resultados";
                    }
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }

                $conn = null;
                ?>
            </div>
        </div>

        <footer class="text-light text-center p-3" class="contenedor">
            <p>&copy; Regalos y Manualidades Anabel</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
        
    </body>
</html>
