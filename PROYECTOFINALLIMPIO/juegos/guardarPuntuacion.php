<?php
require_once "../../administrador/dao.php";
require_once "../../administrador/utilidades.php";

$recordActual= DAO::usuarioObtenerRecord();

if($_REQUEST['puntuacion'] > $recordActual){
DAO::actualizarRecord($_REQUEST['puntuacion']);
redireccionar("jugarDeNuevo.php?record=".$_REQUEST['puntuacion']);
}
redireccionar("jugarDeNuevo.php?");




