<?php

require_once "../_com/requireonces-comunes.php";
require_once "../_com/comunes-app.php";


if (isset($_REQUEST['idC'])) {
    $_SESSION['idC'] = $_REQUEST['idC'];
}

$rsMensajes = DAO::conversacionObtenerMensajes($_SESSION['idC']);
$usuarioPerfil = DAO::usuarioObtenerPorId($_SESSION['id']);


if (!$rsMensajes) {
    echo("<p> No hay mensajes aún </p>");
} ?>
<html>
<head>
    <style>
        #datos-chat table tbody tr {
            display: flex;
            width: 100%;
            flex-wrap: wrap;
            justify-content: flex-end;
            margin-top: 10px;
        }

        #datos-chat table tbody tr td:first-child {
            display: flex;
            width: 100%;
            font-family: 'Jost', sans-serif;
            color: darkorange;
            font-size: 12px;
        }

        #datos-chat table tbody tr td:nth-child(3) {
            display: flex;
            width: 15%;
            background-color: rgb(67, 75, 110);
            font-family: 'Jost', sans-serif;
            font-size: 10px;
            padding: 5px;
            margin: 0;
            color: gray;
            justify-content: flex-end;
        }

        #datos-chat table tbody tr td:nth-child(2) {
            display: flex;
            width: 60%;
            padding: 5px;
            padding-left: 10px;
            margin: 0;
            background-color: rgb(67, 75, 110);
            font-family: 'Jost', sans-serif;
            font-size: 14px;
        }
    </style>

</head>
<div id="datos-chat">

    <table>
        <?php
        foreach ($rsMensajes

        as $mensaje) {

        $idUsuarioConversacion = $mensaje['idAutorMensaje'];

        $usuario = DAO::usuarioObtenerPorId($idUsuarioConversacion);
        ?>

        <tr style=" <?php if ($usuario->getNombreUsuario() != $usuarioPerfil->getNombreUsuario()
        ) { ?>
                justify-content: flex-start;
        <?php } else { ?>
                justify-content: flex-end;<?php

        } ?>">
            <td style="
            <?php if ($usuario->getNombreUsuario() == $usuarioPerfil->getNombreUsuario()
            ) { ?>
                    justify-content: flex-end;
            <?php } else {
            } ?>
                    "

            ><?= $usuario->getNombreUsuario() ?></td>
            <td style=" <?php if ($usuario->getNombreUsuario() != $usuarioPerfil->getNombreUsuario()
            ) { ?>
                    border-top-left-radius: 10px;
                color: white;

            <?php } else { ?>
                    border-top-left-radius:10px ;
                    border-bottom-left-radius:10px ;
                    background-color: #cdc9ff;
                <?php

            } ?>"><?= $mensaje['textoMensaje'] ?></td>
            <td style=" <?php if ($usuario->getNombreUsuario() != $usuarioPerfil->getNombreUsuario()
            ) { ?>
                    border-top-right-radius:10px ;
                    border-bottom-right-radius:10px ;
                    color: darkgray;

            <?php } else { ?>
                    border-top-right-radius:10px ;
                    background-color: #cdc9ff;

                <?php

            } ?>"><?= $mensaje['fechaMensaje'] ?></td>
        </tr>

        <br>
</div>
<?php
}
?>
</table>

</div>


</html>