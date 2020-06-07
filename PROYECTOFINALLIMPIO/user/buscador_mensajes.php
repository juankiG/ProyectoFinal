<?php
require_once "../_com/comunes-app.php";
//si viene desde el perfil del usuario
if (isset($_REQUEST['idUsr'])) {
    $idUsuario = $_REQUEST['idUsr'];
    if($idUsuario==0){
        redireccionar("perfil_mensajes.php");
    }else{
        $idConversacion = DAO::conversacionVerOCrear($idUsuario);
        redireccionar("perfil_mensajes.php?idC=" . $idConversacion . "&usrId=" . $_SESSION['id']);
    }

}

//si viene desde mi perfil
if (isset($_REQUEST['usrName'])) {
    $idUsuario = DAO::usuarioObtenerIdPorNombreUsuario($_REQUEST['usrName']);

    if($idUsuario==0){
        redireccionar("perfil_mensajes.php");
    }else{
        $idConversacion = DAO::conversacionVerOCrear($idUsuario);
        redireccionar("perfil_mensajes.php?idC=" . $idConversacion . "&usrId=" . $_SESSION['id']);
    }

}







?>
