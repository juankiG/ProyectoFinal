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
        $solicitudesPendientes = DAO::usuarioSolicitudesPendientes($_SESSION['id']);
        $solicitudesAceptadas = DAO::usuarioSolicitudesAceptadas($_SESSION['id']);
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
                <br><a href="../user/usuarioPantallaPrincipal.php">Volver a la página de inicio</a>

        </body>
        </html>
<?php
    }

else{
    $usuario= DAO::usuarioObtenerPorId($usuarioId);
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
    </body>
    </html>
    <?php
}
?>



