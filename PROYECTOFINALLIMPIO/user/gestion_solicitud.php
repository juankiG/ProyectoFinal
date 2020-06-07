<?php
require_once "../_com/comunes-app.php";

if(isset($_REQUEST['aceptar'])){
    if(isset($_REQUEST['nombreUsuario'])){
        DAO::usuarioAceptarSolicitud($_SESSION['id'], $_REQUEST['idEnviador']);
        redireccionar('perfil_usuario.php?nombreUsuario='.$_REQUEST['nombreUsuario']);
    }
    DAO::usuarioAceptarSolicitud($_SESSION['id'], $_REQUEST['idEnviador']);
    redireccionar('perfil_solicitudes.php');
}

if(isset($_REQUEST['rechazar'])){
    if(isset($_REQUEST['nombreUsuario'])){
        DAO::usuarioRechazarSolicitud($_SESSION['id'], $_REQUEST['idEnviador']);
        redireccionar('perfil_usuario.php?nombreUsuario='.$_REQUEST['nombreUsuario']);
    }
    DAO::usuarioRechazarSolicitud($_SESSION['id'], $_REQUEST['idEnviador']);
    redireccionar('perfil_solicitudes.php');
}

if(isset($_REQUEST['eliminar'])){
    DAO::usuarioEliminarSolicitud($_SESSION['id'], $_REQUEST['idEnviador']);
    redireccionar('perfil_usuario.php?nombreUsuario='.$_REQUEST['nombreUsuario']);
}

if(isset($_REQUEST['enviar'])){
    DAO::usuarioEnviarSolicitud($_REQUEST['idEnviador'], $_SESSION['id']);
    redireccionar('perfil_usuario.php?nombreUsuario='.$_REQUEST['nombreUsuario']);
}
?>
