<?php



?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript">
        function ajax() {
            var req = new XMLHttpRequest();
            req.onreadystatechange = function () {
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById('chat').innerHTML = req.responseText;
                }
            }
            req.open('GET', 'chat.php', true);
            req.send();
        }

        setInterval(function () {
            ajax();
        }, 1000);
    </script>
</head>
<body onload="ajax()" >

<div id="contenedor">
    <div id="caja-chat">
        <div id="chat">

        </div>
    </div>
    <form action="usuarioPantallaPrincipal.php">
        <textarea name="mensaje" id="" cols="30" rows="10"></textarea>
        <button type="submit" name="Enviar" value="Enviar"></button>
    </form>
</div>
</body>
</html>