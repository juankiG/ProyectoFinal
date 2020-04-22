<?php
session_start();
require_once "../_com/sesiones.php";

if (haySesionIniciada() || comprobarCookieRecurdame()&& !isset($_REQUEST['noToken'])) redireccionar("usuarioPantallaPrincipal.php");

?>



<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" >
    <script src="js/bootstrap.min.js" ></script>

</head>

<body>
<?php
if (isset($_REQUEST["incorrecto"])) {
    echo "<p>Usuario o contraseña incorrectos.</p>";
}
if (isset($_REQUEST["noToken"])) {
    echo "<p>Debes Activar la Cuenta .</p>";
}
if (isset($_REQUEST["sesionCerrada"])) {
    echo "<p>Ha salido correctamente. Su sesión está ahora cerrada.</p>";
}
?>

<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Iniciar Sesi&oacute;n</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="recuperarContrasennaUsuario.php">¿Se te olvid&oacute; tu contraseña?</a></div>
            </div>

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form id="loginform" class="form-horizontal" role="form" action="usuarioPantallaPrincipal.php" method="POST" autocomplete="off">

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="usuario" type="text" class="form-control" name="nombreUsuario" value="" placeholder="usuario" required>
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="contrasenna" type="password" class="form-control" name="contrasenna" placeholder="password" required>
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"></i></span>
                        <label>Recuerdame</label>
                        <input id="recuerdame" type="checkbox" class="form-control" name="recuerdame"  >
                    </div>
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <button id="btn-login" type="submit" class="btn btn-success">Iniciar Sesi&oacute;n</a></button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                No tiene una cuenta! <a href="registrarUsuario.php">Registrate aquí</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>