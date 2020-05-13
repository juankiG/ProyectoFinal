<?php

require_once "../_com/requireonces-comunes.php";


require_once "../_com/emailFuncion.php";

$nombre=$_REQUEST["nombre"];
$usuario=$_REQUEST["nombreUsuario"];
$contrasenna=$_REQUEST["contrasenna"];
$email=$_REQUEST["email"];

DAO::clienteAgregarBD($nombre,$usuario,$contrasenna,$email);




$cliente=DAO::usuarioObtenerPorUsuarioYContrasenna($usuario,$contrasenna);
$clienteid=$cliente->getId();
$url="ActivarCuenta.php?id=".$clienteid."";
$asunto = 'Activar Cuenta - Sistema de Usuarios';
$cuerpo=  "Estimado $nombre: <br /><br />Para continuar con el proceso de registro, es indispensable que haga click en el siguiente enlace <a href='$url'>Activar Cuenta</a>";

enviarEmail($email, $nombre, $asunto, $cuerpo);
?>
<html>
<head>
    <link rel="stylesheet" href="css/estilo_entre_pantallas.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<div class="info">
    <div class="logo">
        <a href=""><img src="IMG/logo.webp" alt=""></a>
    </div>
    <p>Se le ha enviado un e-mail a su direccion de correo electrónico, por favor valide su cuenta para iniciar sesion.</p>
    <button><a href="sesion-inicio.php">Aceptar</a></button>
</div>

</body>
</html>
