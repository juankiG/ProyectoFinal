<?php
require_once "../_com/comunes-app.php";

$id=$_REQUEST["id"];
DAO::usuarioEliminar($id);
redireccionar("../_ad/ad_lista_usuarios.php");