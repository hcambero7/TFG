<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
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
        background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
      }
      
      .main{
        margin-top: 150px;
        margin-left: 15%;
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
  </style>
  </head>
  <body>
    <header>
      <div class="container">
          <nav class="navbar navbar-expand-lg fixed-top">
              <div class="container-fluid">
                  <a href="index.html" class="navbar-brand"><img src="img/logo.png" alt="" height="100px"></a>
                  <nav>
                      <a href="index.html">Inicio</a>
                      <a href="contacto.html">Contactanos</a>
                      <a href="redes.html">Redes Sociales</a>
                      <a href="productos.html">Productos</a>
                      <a href="subcribirse.html">Suscribete</a>
                      <a href="ayuda.html">Ayuda</a>
                  </nav>
              </div>
          </nav>
      </div>
    </header>

    <div class="main">  	
		  <input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form action="comprobacionregistro.php" method="post">
					<label for="Registro" aria-hidden="true">Registro</label>
          <input type="text" name="nombre" placeholder="Nombre" required>
          <input type="text" name="apellido" placeholder="Apellido" required>
          <input type="number" name="telefono" placeholder="Telefono" required=""> <!--minlegth="9" maxlegth="9"-->
					<input type="text" name="usuario" placeholder="Usuario" required="">
					<input type="password" name="contraseña" placeholder="Contraseña" required="">
					<button>Enviar</button>
				</form>
			</div>

			<div class="login">
				<form action="comprobacionlogin.php" method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="username" placeholder="Usuario" required="">
					<input type="password" name="contaseña" placeholder="Contaseña" required="">
					<button>Login</button>
				</form>
			</div>
	</div>
    
  </body>
</html>