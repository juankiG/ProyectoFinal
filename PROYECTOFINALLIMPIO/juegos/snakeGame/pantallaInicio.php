<?php
require_once "../../_com/comunes-app.php";
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="POST">
    <input type="hidden" name="juego" value="snake">
    <input type="submit" name="jugar" value="jugar Snake!">

</form>
</body>
</html>
