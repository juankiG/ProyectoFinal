<?php

require_once "../_com/comunes-app.php";

if(isset($_REQUEST['idC'])){
    $_SESSION['idC']=$_REQUEST['idC'];
}

$rsMensajes = DAO::conversacionObtenerMensajes($_SESSION['idC']);


if(!$rsMensajes){
    echo("<p> No hay mensajes aún </p>");
}?>
<div id="datos-chat">
    <?php
    foreach ($rsMensajes as $mensaje) {

        $idUsuarioConversacion = $mensaje['idAutorMensaje'];

        $usuario = DAO::usuarioObtenerPorId($idUsuarioConversacion);
        ?>

        <table>
            <tr>
                <td><?=$usuario->getNombreUsuario()?></td>
            </tr>
            <tr>
                <td><?=$mensaje['textoMensaje']?></td>
            </tr>
            <tr>
                <td><?=$mensaje['fechaMensaje']?></td>
            </tr>
        </table>
        <br>
        </div>
        <?php
    }
    ?>

</div>


