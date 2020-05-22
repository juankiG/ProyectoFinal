<?php
require_once "../_com/comunes-app.php";
$juego=DAO::juegoObtenerPorNombre($_REQUEST['Nombre']);



$usuario=DAO::usuarioObtenerPorNombreUsuario($_REQUEST['Nombre']);

if($juego!=null){
    $nombreJuego= $juego->getNombre();
    redireccionar("../juegos/".$nombreJuego."Game/index.php?juego=".$nombreJuego);
}elseif ($usuario!=null){
    $nombreUsuario=$usuario->getNombreUsuario();
    redireccionar("usuarioPerfil.php?nombreUsuario=".$nombreUsuario);
}else{
    redireccionar('../_com/recursoNoDisponible.php');

}