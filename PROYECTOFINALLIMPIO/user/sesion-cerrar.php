<?php

require_once "../_com/comunes-app.php";

// TODO Poner función destruirSesion() en sesiones.php y llamarle desde aquí.
destruirSesionYCookies($_SESSION["nombreUsuario"]);



redireccionar("sesion-inicio.php");


?>

