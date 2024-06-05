<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adicional.css">
    <link rel="stylesheet" href="adicional2.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Login</title>
    <style>
      body{
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        font-family: 'Jost', sans-serif;
        background: linear-gradient(to bottom, #7fd8f8, #86a8e7); /* Aqua background color */
        background-image: url("img/fondo.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
      }
      
      .main{
        margin-top: 150px;
        margin-left: 35%;
        width: 350px;
        height: 540px;
        background: red;
        overflow: hidden;
        background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
        border-radius: 10px;
        box-shadow: 5px 20px 60px #000;
      }
      
      #chk{
        display: none;
      }
      
      .signup{
        position: relative;
        width:100%;
        height: 100%;
      }
      
      label{
        color: #fff;
        font-size: 2.3em;
        justify-content: center;
        display: flex;
        margin: 50px;
        font-weight: bold;
        cursor: pointer;
        transition: .5s ease-in-out;
      }
      
      input{
        width: 60%;
        height: 10px;
        background: #e0dede;
        justify-content: center;
        display: flex;
        margin: 20px auto;
        padding: 12px;
        border: none;
        outline: none;
        border-radius: 5px;
      }
      
      button{
        width: 60%;
        height: 40px;
        margin: 10px auto;
        justify-content: center;
        display: block;
        color: #fff;
        background: #573b8a;
        font-size: 1em;
        font-weight: bold;
        margin-top: 30px;
        outline: none;
        border: none;
        border-radius: 5px;
        transition: .2s ease-in;
        cursor: pointer;
      }
      
      button:hover{
        background: #6d44b8;
      }
      
      .login{
        height: 460px;
        background: #eee;
        border-radius: 60% / 10%;
        transform: translateY(-180px);
        transition: .8s ease-in-out;
      }

      .login label{
        color: #573b8a;
        transform: scale(.6);
      }

      #chk:checked ~ .login{
        transform: translateY(-500px);
      }
      #chk:checked ~ .login label{
        transform: scale(1);	
      }
      #chk:checked ~ .signup label{
        transform: scale(.6);
      }
      .admin{
        margin-top:600px;
        margin-left:500px;
      }
  </style>
  </head>
  <body>
  <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-pink">
                <div class="container-fluid">
                    <a href="index.html" class="navbar-brand">
                        <img src="img/logo.png" alt="" height="100px">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="contacto.html">Contacto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="redes.html">Redes Sociales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="productos.html">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="login.php">Iniciar Sesión / Registro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="subcribirse.html">Suscribete</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="ayuda.html">Ayuda</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="main">  	
		  <input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form action="comprobacionregistro.php" method="POST">
					<label for="Registro" aria-hidden="true">Registro</label>
          <input type="text" name="nombre" placeholder="Nombre" required>
          <input type="text" name="apellido" placeholder="Apellido" required>
          <input type="number" name="telefono" placeholder="Telefono" required=""> 
					<input type="text" name="usuario" placeholder="Usuario" required="">
					<input type="password" name="contrasena" placeholder="Contraseña" required="">
					<button>Enviar</button>
				</form>
			</div>

			<div class="login">
				<form action="comprobacionlogin.php" method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="username" placeholder="Usuario" required="">
					<input type="password" name="contrasena" placeholder="Contaseña" required="">
					<button>Login</button>
				</form>
			</div>
	</div>
  <div class="admin">
    <a href="registroadmin.php">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-braces" viewBox="0 0 16 16">
        <path d="M2.114 8.063V7.9c1.005-.102 1.497-.615 1.497-1.6V4.503c0-1.094.39-1.538 1.354-1.538h.273V2h-.376C3.25 2 2.49 2.759 2.49 4.352v1.524c0 1.094-.376 1.456-1.49 1.456v1.299c1.114 0 1.49.362 1.49 1.456v1.524c0 1.593.759 2.352 2.372 2.352h.376v-.964h-.273c-.964 0-1.354-.444-1.354-1.538V9.663c0-.984-.492-1.497-1.497-1.6M13.886 7.9v.163c-1.005.103-1.497.616-1.497 1.6v1.798c0 1.094-.39 1.538-1.354 1.538h-.273v.964h.376c1.613 0 2.372-.759 2.372-2.352v-1.524c0-1.094.376-1.456 1.49-1.456V7.332c-1.114 0-1.49-.362-1.49-1.456V4.352C13.51 2.759 12.75 2 11.138 2h-.376v.964h.273c.964 0 1.354.444 1.354 1.538V6.3c0 .984.492 1.497 1.497 1.6"/>
      </svg>
    </a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  
  </body>
</html>