<?php
require_once "../_com/comunes-app.php";

if(isset($_REQUEST['aceptar'])){
    DAO::usuarioAceptarSolicitud($_SESSION['id'], $_REQUEST['idEnviador']);
    redireccionar('usuarioVerSolicitudes.php');
}

if(isset($_REQUEST['rechazar'])){
    DAO::usuarioRechazarSolicitud($_SESSION['id'], $_REQUEST['idEnviador']);
    redireccionar('usuarioVerSolicitudes.php');
}

if(isset($_REQUEST['eliminar'])){
    DAO::usuarioEliminarSolicitud($_SESSION['id'], $_REQUEST['idEnviador']);
    redireccionar('usuarioPerfil.php');
}
?>
