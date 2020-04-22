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
$url="http://localhost/php/ProyectoFP/PROYECTOFINALLIMPIO/user/ActivarCuenta.php?id=".$clienteid."";
$asunto = 'Activar Cuenta - Sistema de Usuarios';
$cuerpo=  "Estimado $nombre: <br /><br />Para continuar con el proceso de registro, es indispensable de click en la siguiente liga <a href='$url'>Activar Cuenta</a>";

enviarEmail($email, $nombre, $asunto, $cuerpo);


?>