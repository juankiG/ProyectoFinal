<?php

require_once "../_com/comunes-app.php";

$idjuego=$_REQUEST['idJuego'];

$recordActual= DAO::usuarioObtenerRecord($_SESSION['id'],$idjuego);

if($_REQUEST['puntuacion'] > $recordActual){
DAO::actualizarRecord($_SESSION['id'],$idjuego,$_REQUEST['puntuacion']);
redireccionar("juego_reiniciar.php?record=".$_REQUEST['puntuacion']."&idJuego=".$idjuego);
}
redireccionar("juego_reiniciar.php?record=".$_REQUEST['puntuacion']."&idJuego=".$idjuego);




