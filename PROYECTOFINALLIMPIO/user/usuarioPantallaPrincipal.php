<?php
session_start();
require_once "../_com/comunes-app.php";
$id = $_SESSION['id'];
$usuario= DAO::usuarioObtenerPorId($id);

$juegos = DAO::juegoObtenerTodos();

?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
</head>
<body>
<h1>Bienvenido!!</h1>
<div>
    <?php require "../_com/info-sesion.php"; ?>
</div>
<br>
<div id="buscarUsuario">
    <p>¿Buscar un usuario?</p>
    <form action="usuarioPerfil.php">
        <input type="text" name="nombreUsuario" placeholder="Nombre usuario...">
        <input type="submit" value="Buscar">
    </form>
</div>
<br>
<h3>¿A qué vamos a jugar?</h3>

<?php
foreach ($juegos as $juego) {
    $nombreJuego= $juego->getNombre();
    $linkImagen= $juego->getLinkImagen();

?>
    <p><a href="../juegos/<?= $nombreJuego?>Game/pantallaInicio.php"><img src="<?= $linkImagen?>.jpg"/></a></p>

<?php
}
?>


</body>
</html>