<?php
session_start();
require_once "_com/requireonces-comunes.php";
require "_com/info-sesion.php";
$usuario=DAO::clienteObtenerPorId($id);


?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
</head>
<body>
<h1>Bienvenido!!</h1>
<div id="informacionUsuario">
    <p>Sesión iniciada por: <?=$usuario->getUsuario()?></p>
    <a href="sesion-cerrar.php"> Cerrar sesión</a>
</div>

</body>
</html>