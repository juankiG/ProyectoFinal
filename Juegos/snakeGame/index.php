<?php
require_once "../../administrador/dao.php";

$recordActual= DAO::usuarioObtenerRecord();
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        .canvas{
            padding-left: 0;
            padding-right: 0;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }
        .puntuacion,
        .recordActual{
            text-align: center;
        }
    </style>
    <title>Juega snake!</title>
</head>
<body>

<canvas class="canvas" id="canvas" height="300" width="300" style="background-color: #009900"></canvas>

<div>
    <h1 class="puntuacion"></h1>
    <h1 class="recordActual">Tu record actual es: <?= $recordActual ?></h1>
</div>

<script type="text/javascript" src="fruta.js"></script>
<script type="text/javascript" src="bloque.js"></script>
<script type="text/javascript" src="snake.js"></script>
<script type="text/javascript" src="draw.js"></script>



</body>
</html>