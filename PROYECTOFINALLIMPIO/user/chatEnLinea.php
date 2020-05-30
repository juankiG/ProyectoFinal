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

        function scrollAbajo() {

            var objDiv = document.getElementById("chat");
            objDiv.scrollTop = objDiv.scrollHeight;
        }

        function ajax() {
            scrollAbajo();
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
<body onload="ajax()">

<div id="contenedor">
    <div id="caja-chat">
        <p style="width: 100%;height:10%color: white;margin: 0;display: flex;justify-content: center;align-items: center; font-size: 10px;
    color: white;font-family: 'Jost', sans-serif;text-transform: uppercase;font-weight: 500;letter-spacing: .6px;">Chat
            en línea</p>
        <div id="chat">

        </div>
    </div>
    <form action="" method="post">
        <input type="hidden" value="<? echo $_SESSION['id'] ?>">
        <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
        <button type="submit" name="Enviar" value="Enviar">Enviar</button>
    </form>
</div>

</body>
</html>