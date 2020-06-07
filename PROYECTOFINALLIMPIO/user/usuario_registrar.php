<html>
<head>
    <title>Registro</title>
    <link rel="icon" href=IMG/logo.webp">


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/estilo_inicio.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <style>

        nav ul li[class="registro"]{
            border-bottom: 2px solid darkorange;
        }
        body{
            height: 95%;
        }
    </style>

</head>

<body>
<nav>
    <ul>
        <li class="inicio_sesion"><a href="sesion-inicio.php">Inicio de sesión</a></li>
        <li class="registro"><a href="usuario_registrar.php">Registrate aquí</a></li>
        <li class="recuperar_contra"><a href="usuario_recuperar_contrasenna.php">Recordar contraseña</a></li>


    </ul>
</nav>

<div class="container">
    <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="logo">
                <a href=""><img src="IMG/logo.webp" alt=""></a>
            </div>

            <div class="panel-body">

                <form id="signupform" class="form-horizontal" role="form" action="gestion_registro.php" method="POST"
                      autocomplete="off">
                    <?php
                    if (isset($_REQUEST["incorrecto"])) {
                        echo "<p>no se ha podido enviar el correo de activacion.</p>";
                    }

                    if (isset($_REQUEST["errUs"])) {
                        echo "<p>Este nombre de usuario ya se encuentra en uso, por favor elija otro.</p>";
                    }

                    if (isset($_REQUEST["errEm"])) {
                        echo "<p>Este email ya se encuentra en uso, por favor elija otro.</p>";
                    }
                    ?>
                    <div id="signupalert" style="display:none" class="alert alert-danger">
                        <p>Error:</p>
                        <span></span>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre"
                               value="<?php if (isset($nombre)) echo $nombre; ?>" required>
                    </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="nombreUsuario" placeholder="Usuario"
                               value="<?php if (isset($usuario)) echo $usuario; ?>" required>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="contrasenna" placeholder="Password" required>
                    </div>
                    <div style="margin-bottom: 10px" class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email"
                               value="<?php if (isset($email)) echo $email; ?>" required>
                    </div>
                    <div style="margin-bottom: 20px;" class="form-group">

                        <div  style="width: 100%;display: flex;justify-content: center" class="g-recaptcha col-md-9" data-sitekey="6LfsnuwUAAAAAPJ50ZZ1POX1vF5jXyCNv9Lpxngf"></div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9 registro-btn">
                            <button id="btn-signup" type="submit" >Registrarse
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>													