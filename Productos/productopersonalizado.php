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
                    <div class="contenedor col-md-6 col-12 main">
                        <img src="../img/personaliza.png" alt="" height="400px" width="600px">
                    </div>

                    <div class="contenedor col-md-6 col-12 aside">
                        <div class="mb-3">
                            <h1>Personaliza tu propio pedido</h1>
                            <h5 class="card-subtitle text-muted mb-2">
                                <p>En este apartado podras subir tu foto y nos pondremos en contacto contigo para dercite presupuesto, tiempo de realización entre otras preguntas que tengas</p>
                            </h5>
                            <h4>X€</h4>
                        </div>
                        
                        <form action="insertarpersonalizado.php" enctype="multipart/form-data" method="post">
                            <div class="mb-3 mt-5">
                                <h1><label for="mensaje" class="form-label">
                                    Personalizar
                                </label></h1>
                                <label for="nombre">
                                    Nombre: 
                                </label>
                                <input type="text" name="nombre" id="nombre" required>
                                <label for="telefono">
                                    Teléfono: 
                                </label>
                                <input type="number" name="telefono" id="telefono" required>
                                <br><br>
                                <label for="imagen">
                                    Imagen: 
                                </label>
                                <input type="file" name="imagen" id="imagen" acept="image/*" required>
                                <textarea class="form-control mt-3" name="mensaje" id="Mensaje"></textarea>
                                <div id="ayuda-correo" class="form-text">
                                    Si lo quieres del mismo color y mismo tamaño INTRODUZCA: Lo quiero igual
                                </div>
                                <div id="ayuda-correo" class="form-text">
                                    Si lo quieres de otra manera INTRODUZCA: Los colores, el tamaño, etc...
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Enviar Formulario</button>
                        </form>
                    </div>
                </div>
            </div>

        <footer class="text-light text-center p-3" class="contenedor">
            <p>&copy; Regalos y Manualidades Anabel</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    </body>
</html>
