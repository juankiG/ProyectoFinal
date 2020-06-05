<?php
session_start();
require_once "../_com/sesiones.php";

if (haySesionIniciada() || comprobarCookieRecurdame()&& !isset($_REQUEST['noToken'])) redireccionar("index.php");

?>



<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" >
    <link rel="stylesheet" href="css/estilo_inicio.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <script src="js/bootstrap.min.js" ></script>
    <style>
        nav ul li[class="inicio_sesion"]{

            border-bottom: 2px solid darkorange;
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
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="logo">
                <a href=""><img src="IMG/logo.webp" alt=""></a>
            </div>

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form id="loginform" class="form-horizontal" role="form" action="index.php" method="POST" autocomplete="off">
                    <?php
                    if (isset($_REQUEST["incorrecto"])) {
                        echo "<p>Usuario o contraseña incorrectos.</p>";
                    }
                    if (isset($_REQUEST["noToken"])) {
                        echo "<p>Debes activar tu cuenta.</p>";
                    }
                    if (isset($_REQUEST["sesionCerrada"])) {
                        echo "<p>Ha salido correctamente, su sesión está ahora cerrada.</p>";
                    }
                    if(isset($_REQUEST['invUsr'])){
                        echo "<p>Usuario y/o contraseña incorrectos.</p>";
                    }
                    ?>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="usuario" type="text" class="form-control" name="nombreUsuario" value="" placeholder="usuario" required>
                    </div>

                    <div  class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="contrasenna" type="password" class="form-control" name="contrasenna" placeholder="password" required>
                    </div>

                    <div  class="input-group">

                        <label>Recordar contraseña</label>
                        <input id="recuerdame" type="checkbox" class="form-control" name="recuerdame"  >
                    </div>
                    <div id="form-group">
                        <div class="col-sm-12 controls">
                            <button id="btn-login" type="submit" >Iniciar Sesi&oacute;n</a></button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>