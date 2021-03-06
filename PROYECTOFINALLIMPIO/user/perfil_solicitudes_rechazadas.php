<?php
require_once "../_com/comunes-app.php";
$arraySolicitudes = DAO::usuarioSolicitudesRechazadas($_SESSION['id']);
$usuario = DAO::usuarioObtenerPorId($_SESSION['id']);
$nomre_usuario = $usuario->getNombreUsuario();
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
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo_perfil.css">
    <title><?= $usuario->getNombreUsuario() ?> | Solicitudes rechazadas</title>
</head>
<body>
<nav>
    <div class="logo">
        <a href="index.php"><img src="IMG/logo.webp" alt=""></a>
    </div>
    <div class="buscar">
        <form action="buscador.php">
            <input type="text" name="Nombre" placeholder="Buscar...">
            <input type="submit" value="Buscar">
        </form>
    </div>
    <div class="menu">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li class="perfil"><a>Perfil</a>
                <div class="submenu">
                    <ul>
                        <li><a style="padding: 0">
                                <form class="ver-perfil-form" action="perfil_usuario.php" method="post">
                                    <input type="submit" value="Ver mi perfil">
                                    <input type="hidden" name="nombreUsuario"
                                           value="<?= $_SESSION["nombreUsuario"] ?>">
                                </form>
                            </a></li>
                        <?php
                        if ($usuario->getTipoUsuario() == 1) {
                            ?>

                            <li><a href="../_ad/ad_subir_juego.php">subir juego</a></li><li><a href="../_ad/ad_lista_usuarios.php">Usuarios</a></li><?php
                        }
                        ?>
                        <li><a href="sesion-cerrar.php">cerrar sesion</a></li>

                    </ul>
                </div>

            </li>
        </ul>
    </div>
</nav>
<main>
    <div id="container-perfil">
        <div class="menu-perfil">
            <ul>
                <li><a
                            href="perfil_usuario.php?nombreUsuario=<?= $nomre_usuario ?>">Tu perfil</a></li>
                <li><a
                            href="perfil_amigos.php">Amigos (<?= count($solicitudesAceptadas) ?>)</a></li>
                <li ><a
                            href="perfil_solicitudes.php">solicitudes
                        (<?= count($solicitudesPendientes) ?>)</a></li>
                <li style="background-color: rgb(15, 15, 31);border-bottom: 1px solid darkorange;"><a href="perfil_solicitudes_rechazadas.php">Solicitudes rechazadas
                        (<?= count($solicitudesRechazadas) ?>)</a></li>
                <li><a href="perfil_mensajes.php">mensajes</a></li>
            </ul>
        </div>
        <div class="mostrar-info">
            <div class="solicitudes">
                <?php
                if (!$arraySolicitudes) {
                    ?>
                    <h1>Actualmente no tiene solicitudes rechazadas</h1>

                    <?php
                } else {
                ?>
                <h1>Solicitudes rechazadas</h1>
                <p>¿Desea aceptarlas o eliminarlas para siempre?</p>
                <div class="lista">
                    <ul>


                        <?php
                        foreach ($arraySolicitudes as $solicitud) {
                            $usuarioSolicitud = DAO::usuarioObtenerPorId($solicitud['idUsuarioEnviador']);
                            $idUsuarioSolicitud = $usuarioSolicitud->getId();
                            $nombreUsuarioSolicitud = $usuarioSolicitud->getNombreUsuario();

                            ?>
                            <li>
                                <a href="perfil_usuario.php?nombreUsuario=<?= $nombreUsuarioSolicitud ?>"><?= $nombreUsuarioSolicitud ?></a>
                                <form action="gestion_solicitud.php">
                                    <input type="submit" name="aceptar" value="Aceptar">
                                    <input type="submit" name="eliminar" value="Eliminar">
                                    <input type="hidden" name="idEnviador" value="<?= $idUsuarioSolicitud ?>">
                                </form>
                            </li>

                            <?php
                        }
                        ?></ul><?php
                    }
                    ?>
                </div>
            </div>
        </div>
</main>

</body>
</html>