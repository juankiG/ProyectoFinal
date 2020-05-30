<?php
require_once "../_com/comunes-app.php";

DAO::conversacionNuevoMensaje($_REQUEST['idConversacion'], $_REQUEST['mensaje'], $_REQUEST['fecha']);

redireccionar("usuarioVerConversaciones.php?idC=".$_REQUEST['idConversacion']."&usrId=".$_SESSION['id']);
?>