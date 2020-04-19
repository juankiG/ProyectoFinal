<?php
require_once "../_com/comunes-app.php";
$arraySolicitudes = DAO::usuarioSolicitudesPendientes($_SESSION['id']);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Amigos</title>
</head>
<body>

<?php
if(!$arraySolicitudes){
    ?>
    <h1>Actualmente no tiene solicitudes</h1>
    <a href="usuarioPerfil.php?nombreUsuario=<?= $_SESSION['nombreUsuario']?>">Volver al perfil</a>
    <?php
}else{
?>
    <h1>Estas son todas tus solicidudes de amistad</h1>
    <a href="usuarioPerfil.php?nombreUsuario=<?= $_SESSION['nombreUsuario']?>">Volver al perfil</a>
<?php
foreach ($arraySolicitudes as $solicitud) {
    $usuarioSolicitud = DAO::usuarioObtenerPorId($solicitud['idUsuarioEnviador']);
    $idUsuarioSolicitud = $usuarioSolicitud->getId();
    $nombreUsuarioSolicitud = $usuarioSolicitud->getNombreUsuario();

    ?>
    <form action="gestionarSolicitud.php">
        <p><?=$nombreUsuarioSolicitud?> quiere ser tu amigo (<a href="usuarioPerfil.php?nombreUsuario=<?=$nombreUsuarioSolicitud?>">Ver perfil</a>)</p>
        <input type="submit" name="aceptar" value="Aceptar">
        <input type="submit" name="rechazar" value="Rechazar">
        <input type="hidden" name="idEnviador" value="<?=$idUsuarioSolicitud?>">
    </form>

    <?php
}}
?>
</body>
</html>
