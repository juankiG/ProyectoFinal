<?php
session_start();
require_once "../_com/sesiones.php";

if (haySesionIniciada() || comprobarCookieRecurdame()) redireccionar("usuarioPantallaPrincipal.php");

?>



<html>

<head>
    <meta charset="UTF-8">
</head>

<body>

<?php
if (isset($_REQUEST["incorrecto"])) {
    echo "<p>Usuario o contraseña incorrectos.</p>";
}
if (isset($_REQUEST["sesionCerrada"])) {
    echo "<p>Ha salido correctamente. Su sesión está ahora cerrada.</p>";
}
?>

<h1>Iniciar sesión</h1>

<form action="usuarioPantallaPrincipal.php" method="POST">
    <label><b>Usuario: </b></label><input name="nombreUsuario" type="text" placeholder="Nombre de usuario"><br />
    <label><b>Contraseña: </b></label><input type="password" name="contrasenna" placeholder="Contraseña"/><br />
    <label><b>Recuérdame</b></label><input type="checkbox" name="recuerdame" /><br />
    <br />
    <input type="Submit" value="Iniciar sesión" />
</form>

</body>
</html>