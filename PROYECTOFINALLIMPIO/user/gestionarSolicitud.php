<?php
require_once "../_com/comunes-app.php";

if(isset($_REQUEST['aceptar'])){
    if(isset($_REQUEST['nombreUsuario'])){
        DAO::usuarioAceptarSolicitud($_SESSION['id'], $_REQUEST['idEnviador']);
        redireccionar('usuarioPerfil.php?nombreUsuario='.$_REQUEST['nombreUsuario']);
    }
    DAO::usuarioAceptarSolicitud($_SESSION['id'], $_REQUEST['idEnviador']);
    redireccionar('usuarioVerSolicitudes.php');
}

if(isset($_REQUEST['rechazar'])){
    if(isset($_REQUEST['nombreUsuario'])){
        DAO::usuarioRechazarSolicitud($_SESSION['id'], $_REQUEST['idEnviador']);
        redireccionar('usuarioPerfil.php?nombreUsuario='.$_REQUEST['nombreUsuario']);
    }
    DAO::usuarioRechazarSolicitud($_SESSION['id'], $_REQUEST['idEnviador']);
    redireccionar('usuarioVerSolicitudes.php');
}

if(isset($_REQUEST['eliminar'])){
    DAO::usuarioEliminarSolicitud($_SESSION['id'], $_REQUEST['idEnviador']);
    redireccionar('usuarioPerfil.php?nombreUsuario='.$_REQUEST['nombreUsuario']);
}

if(isset($_REQUEST['enviar'])){
    DAO::usuarioEnviarSolicitud($_REQUEST['idEnviador'], $_SESSION['id']);
    redireccionar('usuarioPerfil.php?nombreUsuario='.$_REQUEST['nombreUsuario']);
}
?>
