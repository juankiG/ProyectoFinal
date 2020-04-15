<?php
require_once "_com/comunes-app.php";
$juegos=DAO::juegosObtenerTodos();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>img{
            width: 50px;
            height: 50px;
        }</style>
</head>
<body>
<?php foreach ($juegos as $juego) { ?>
    <tr>
        <td>
            <a href='juego-detalle.php?id=<?=$juego->getId()?>'><?=$juego->getNombre()?></a>
        </td>
        <td>
            <img src="./admin/JuegoImagen/<?=$juego->getImg()?>" alt="">

        </td>
        <td>
            <a href='./admin/Juego/<?=$juego->getLink()?>'>JUGARRR</a>
           
        </td>

    </tr>
<?php } ?>
<a href="admin/subirJuego.php">subir juego</a>
<a href="sesion-cerrar.php">cerrar sesion</a>
</body>
</html>
