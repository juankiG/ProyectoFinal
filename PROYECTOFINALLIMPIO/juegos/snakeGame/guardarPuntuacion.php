<?php
require_once "../../_com/comunes-app.php";

$idJuego = $_REQUEST['idJuego'];
$recordActual= DAO::usuarioObtenerRecord($_SESSION['id'], $idJuego);

if($_REQUEST['puntuacion'] > $recordActual){
DAO::actualizarRecord($_SESSION['id'], $idJuego, $_REQUEST['puntuacion']);
redireccionar("jugarDeNuevo.php?record=".$_REQUEST['puntuacion']);
}
redireccionar("jugarDeNuevo.php?");




