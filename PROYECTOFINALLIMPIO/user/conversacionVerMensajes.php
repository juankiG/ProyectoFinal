<?php

require_once "../_com/comunes-app.php";

$fechaActual = date('m/d/Y H:i:s', time());

$fechaActual = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $fechaActual)));


if (isset($_REQUEST['idC'])) {
    $_SESSION['idC'] = $_REQUEST['idC'];
}

$rsMensajes = DAO::conversacionObtenerMensajes($_SESSION['idC']);

$noMensajes = "";
if (!$rsMensajes) {
    $noMensajes = "No hay mensajes aún";
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .scrolleable {
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

        #textboxid {
            height: 200px;
            font-size: 14pt;
        }
    </style>
    <title>Document</title>
    <script type="text/javascript">


        function ajax() {
            var usrId = document.getElementById('usrId').value;
            var idc = document.getElementById('idC').value;

            var req = new XMLHttpRequest();
            req.onreadystatechange = function () {
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById('chat').innerHTML = req.responseText;

                }
            }
            req.open('GET', "chatConversacion.php?idC=" + idc + "&usrId=" + usrId, true);
            req.send();
        }


        setInterval(function () {
            ajax();
        }, 1000);
    </script>
</head>

<body onload="ajax()">
<div id="contenedor">
    <div id="caja-chat">

        <div class="scrolleable" id="chat">

        </div>
    </div>
    <form action="nuevoMensajeGestionar.php">
        <textarea name="mensaje" class="textbox" placeholder="Escribe un nuevo mensaje"></textarea>
        <input type="hidden" name="fecha" value="<?= $fechaActual ?>">
        <input type="hidden" name="idConversacion" id="idC" value="<?= $_REQUEST['idC'] ?>">
        <input type="hidden" name="usrId" id="usrId" value="<?= $_REQUEST['usrId'] ?>">
        <input type="submit" value="Enviar">
    </form>

</div>

</body>
</html>
