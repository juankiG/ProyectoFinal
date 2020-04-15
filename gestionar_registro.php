<?php
require_once "_com/requireonces-comunes.php";
$nombre=$_REQUEST["nombre"];
$usuario=$_REQUEST["usuario"];
$contrasenna=$_REQUEST["password"];
$email=$_REQUEST["email"];
DAO::clienteAgregarBD($nombre,$usuario,$contrasenna,$email);
redireccionar("index.php");

?>