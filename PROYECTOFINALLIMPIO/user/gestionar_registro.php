<?php

require_once "../_com/requireonces-comunes.php";


require_once "../_com/emailFuncion.php";

$nombre=$_REQUEST["nombre"];
$usuario=$_REQUEST["nombreUsuario"];
$contrasenna=$_REQUEST["contrasenna"];
$email=$_REQUEST["email"];

DAO::clienteAgregarBD($nombre,$usuario,$contrasenna,$email);


$cliente=DAO::usuarioObtenerPorUsuarioYContrasenna($usuario,$contrasenna);

$asunto = 'Activar Cuenta - Sistema de Usuarios';
$cuerpo=  'mundo';

if(enviarEmail($email, $nombre, $asunto, $cuerpo)){

    echo "Para terminar el proceso de registro siga las instrucciones que le hemos enviado la direccion de correo electronico: $email";
    echo "<br><a href='sesion-inicio.php' >Iniciar Sesion</a>";
    exit;
} else {
    redireccionar("registrarUsuario.php?incorrecto=true");
}


?>