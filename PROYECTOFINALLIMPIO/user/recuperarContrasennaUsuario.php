
<html>
	<head>
		<title>Recuperar Password</title>
		
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/estilo_inicio.css">
		<script src="js/bootstrap.min.js" ></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <style>

            nav ul li[class="recuperar_contra"]{

                border-bottom: 2px solid darkorange;
            }
        </style>
		
	</head>
	
	<body>
    <nav>
        <ul>
            <li class="inicio_sesion"><a href="sesion-inicio.php">Inicio de sesión</a></li>
            <li class="registro"><a href="registrarUsuario.php">Registrate aquí</a></li>
            <li class="recuperar_contra"><a href="recuperarContrasennaUsuario.php">Recordar contraseña</a></li>



        </ul>
    </nav>
		
		<div class="container">

			<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
				<div class="panel panel-info" >

                    <div class="logo">
                        <a href=""><img src="IMG/logo.webp" alt=""></a>
                    </div>
					<div style="padding-top:30px" class="panel-body" >
						
						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						
						<form id="loginform" class="form-horizontal" role="form" action="gestionarRecuperarContrasenna.php" method="POST" autocomplete="off">
							
							<div style="margin-bottom: 25px;flex-wrap: wrap;justify-content: center" class="input-group">
                                <?php
                                if(isset($_REQUEST['noEmail'])){
                                    echo "<p>El correo no existe .</p>";
                                }?>
								<input style="border-radius: 10px" id="email" type="email" class="form-control" name="email" placeholder="email" required>
							</div>
                            <div style="margin-bottom: 20px;" class="form-group">

                                <div  style="width: 100%;display: flex;justify-content: center" class="g-recaptcha col-md-9" data-sitekey="6LfsnuwUAAAAAPJ50ZZ1POX1vF5jXyCNv9Lpxngf"></div>
                            </div>
							
							<div style="margin-top:10px;justify-content: center;margin: 0" class="form-group">
								<div class="col-sm-12 controls">
                                    <button id="btn-login" type="submit" >Enviar</a></button>
								</div>
							</div>
							

						</form>
					</div>                     
				</div>  
			</div>
		</div>
	</body>
</html>							