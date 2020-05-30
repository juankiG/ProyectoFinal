<?php
require_once "../_com/comunes-app.php";
//si viene desde el perfil del usuario
if(isset($_REQUEST['idUsr'])){
    $idUsuario = $_REQUEST['idUsr'];

}

//si viene desde mi perfil
if(isset($_REQUEST['usrName'])){
    $idUsuario = DAO::usuarioObtenerIdPorNombreUsuario($_REQUEST['usrName']);

}

$idConversacion = DAO::conversacionVerOCrear($idUsuario);


redireccionar("usuarioVerConversaciones.php?idC=".$idConversacion."&usrId=".$_SESSION['id']);


?>
