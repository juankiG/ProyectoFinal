<?php

require_once "../_com/comunes-app.php";

$fechaActual = date('m/d/Y H:i:s', time());

$fechaActual = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $fechaActual)));

if($_REQUEST['usrId']!=$_SESSION['id']){
    redireccionar("../_com/recursoNoDisponible.php");
}

$rsMensajes = DAO::conversacionObtenerMensajes($_REQUEST['idC']);

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .scrolleable{
            background-color: white;
            width: 500px;
            height: 700px;
            overflow: scroll;
        }
        .TextBox {
            width: 500px;
            height: 50px;
            background: white;
            margin-left: auto;
            margin-right: auto;
        }
        #textboxid
        {
            height:200px;
            font-size:14pt;
        }
    </style>
    <title>Document</title>
</head>
<body>
<div class="scrolleable">

<?php
if(!$rsMensajes){
    echo("<p> No hay mensajes aún </p>");
}

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
<?php
}
?>
</div>
<form action="nuevoMensajeGestionar.php">
    <textarea name="mensaje" class="textbox" placeholder="Escribe un nuevo mensaje"></textarea>
   <!-- <input type="text" id="textboxid" placeholder="Escribe un mensaje" name="mensaje"> -->
    <input type="hidden" name="fecha" value="<?=$fechaActual?>">
    <input type="hidden" name="idConversacion" value="<?=$_REQUEST['idC']?>">
    <input type="submit" value="Enviar">
</form>
</body>
</html>
