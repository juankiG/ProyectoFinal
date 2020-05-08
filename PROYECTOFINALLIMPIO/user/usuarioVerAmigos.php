<?php
require_once "../_com/comunes-app.php";
$arrayAmigos = DAO::usuarioSolicitudesAceptadas($_SESSION['id']);
$usuario = DAO::usuarioObtenerPorId($_SESSION['id']);
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
if(!$arrayAmigos){
    ?>
    <h1>Su lista de amigos está vacia</h1>
    <a href="usuarioPerfil.php?nombreUsuario=<?=$_SESSION['nombreUsuario']?>">Volver al perfil</a>
    <?php
}else{
    ?>
    <h1>Ésta es tu lista de amigos</h1>
    <a href="usuarioPerfil.php?nombreUsuario=<?=$_SESSION['nombreUsuario']?>">Volver al perfil</a>
    <?php
    foreach ($arrayAmigos as $amigo) {
        if($amigo['idUsuarioEnviador']==$_SESSION['id']){
            $usuarioAmigo = DAO::usuarioObtenerPorId($amigo['idUsuarioSolicitado']);
            $idUsuarioSolicitud = $usuarioAmigo->getId();
            $nombreUsuarioSolicitud = $usuarioAmigo->getNombreUsuario();
        }else{
            $usuarioAmigo = DAO::usuarioObtenerPorId($amigo['idUsuarioEnviador']);
            $idUsuarioSolicitud = $usuarioAmigo->getId();
            $nombreUsuarioSolicitud = $usuarioAmigo->getNombreUsuario();
        }


        ?>
        <form action="gestionarSolicitud.php">
            <p><?=$nombreUsuarioSolicitud?> (<a href="usuarioPerfil.php?nombreUsuario=<?=$nombreUsuarioSolicitud?>">Ver perfil</a>)</p>
            <input type="submit" name="eliminar" value="Eliminar">
            <input type="hidden" name="idEnviador" value="<?=$idUsuarioSolicitud?>">
            <input type="hidden" name="nombreUsuario" value="<?=$usuario->getNombreUsuario()?>">
        </form>


        <?php
    }}
?>
</body>
</html>
