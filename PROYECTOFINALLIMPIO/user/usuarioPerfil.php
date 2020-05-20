<?php
require_once "../_com/comunes-app.php";

$usuarioId= DAO::usuarioObtenerIdPorNombreUsuario($_REQUEST['nombreUsuario']);
if($usuarioId == 0){
    redireccionar('../_com/recursoNoDisponible.php');
}
?>

<?php
    if($usuarioId == $_SESSION['id']){
        $usuario= DAO::usuarioObtenerPorId($_SESSION['id']);

        $solicitudesAceptadas = DAO::usuarioSolicitudesAceptadas($_SESSION['id']);
        $solicitudesPendientes = DAO::usuarioSolicitudesPendientes($_SESSION['id']);
        $solicitudesRechazadas = DAO::usuarioSolicitudesRechazadas($_SESSION['id']);
?>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title><?=$usuario->getNombreUsuario()?></title>
        </head>
        <body>
                <h1>Esta es tu página de perfil de usuario</h1>
                <a href="../user/usuarioVerAmigos.php">Ver amigos (<?=count($solicitudesAceptadas)?>)</a><br>
                <a href="../user/usuarioVerSolicitudes.php">Ver solicitudes (<?=count($solicitudesPendientes)?>)</a><br>
                <a href="../user/usuarioVerSolicitudesRechazadas.php">Solicitudes rechazadas (<?=count($solicitudesRechazadas)?>)</a><br>
                <a href="../user/usuarioVerConversaciones.php">Ver mensajes</a>
                <br><a href="../user/usuarioPantallaPrincipal.php">Volver a la página de inicio</a>

        </body>
        </html>
<?php
    }

else{
    $usuario= DAO::usuarioObtenerPorId($usuarioId);
    $estadoRelacionDeAmistad = DAO::comprobarRelacionAmistad($_SESSION['id'], $usuarioId);
    //print_r($estadoRelacionDeAmistad);
    ?>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?=$usuario->getNombreUsuario()?></title>
    </head>
    <body>
    <h1>Esta es la página de otro usuario (<?=$usuario->getNombreUsuario()?>)</h1>
    <?php
    switch ($estadoRelacionDeAmistad) {
    case 'amigos':
        ?>
        <h3>Tu y este usuario sois amigos</h3>
        <?php
        break;
    case 'rechazadaPorUsuarioSesion':
        ?>
        <h3>La solicitud de este usuario fue rechazada por ti, revisa tu perfil para aceptarla o eliminarla</h3>
        <?php
        break;
    case 'pendientePorUsuarioSesion':
        ?>
        <h3>Este usuario le envió una solicitud</h3>
        <form action="gestionarSolicitud.php">
            <input type="submit" name="aceptar" value="Aceptar">
            <input type="submit" name="rechazar" value="Rechazar">
            <input type="hidden" name="idEnviador" value="<?=$usuarioId?>">
            <input type="hidden" name="nombreUsuario" value="<?=$_REQUEST['nombreUsuario']?>">
        </form>

        <?php
        break;
    case 'agregar':
        ?>
        <h3>Enviar solicitud de amistad</h3>
        <form action="gestionarSolicitud.php">
            <input type="submit" name="enviar" value="Enviar solicitud">
            <input type="hidden" name="idEnviador" value="<?=$usuarioId?>">
            <input type="hidden" name="nombreUsuario" value="<?=$_REQUEST['nombreUsuario']?>">
        </form>
        <?php
        break;
        case 'rechazadaPorUsuarioReceptor':
            ?>
            <h3>Este usuario rechazó tu solicitud, no podrás enviar una nueva hasta que la elimine de su bandeja o te agregue como amigo</h3>
            <?php
            break;
        case 'pendientePorUsuarioReceptor':
            ?>
            <h3>Tu solicitud de amistad a este usuario aún esta pendiente.</h3>
            <?php
            break;
        default:
            ?>
            <h3>default</h3>
            <?php
            break;
    }
    ?>

    <button><a href="nuevoMensajePerfilGestionar.php?idUsr=<?=$usuario->getId()?>">Enviar mensaje</a></button>
    <br><br><a href="../user/usuarioPantallaPrincipal.php">Volver a la página de inicio</a>
    </body>
    </html>
    <?php
}
?>



