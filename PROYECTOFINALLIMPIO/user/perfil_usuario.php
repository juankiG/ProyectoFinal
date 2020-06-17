<?php
require_once "../_com/comunes-app.php";

$usuarioId = DAO::usuarioObtenerIdPorNombreUsuario($_REQUEST['nombreUsuario']);


if ($usuarioId == 0) {
    redireccionar('../_com/recurso_no_disponible.php');
}
?>

<?php
if ($usuarioId == $_SESSION['id']) {
    $usuario = DAO::usuarioObtenerPorId($_SESSION['id']);
    $nomre_usuario = $usuario->getNombreUsuario();
    $correo_usuario = $usuario->getEmail();
    $tipo_usuario = $usuario->getTipoUsuario();
    $rango = "";
    if ($tipo_usuario == 1) {
        $rango = "Administrador";
    } else {
        $rango = "Usuario";
    }


    $solicitudesAceptadas = DAO::usuarioSolicitudesAceptadas($_SESSION['id']);
    $solicitudesPendientes = DAO::usuarioSolicitudesPendientes($_SESSION['id']);
    $solicitudesRechazadas = DAO::usuarioSolicitudesRechazadas($_SESSION['id']);


    $juegos= DAO::juegoObtenerTodos()
    ?>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/estilo_perfil.css">
        <title><?= $usuario->getNombreUsuario() ?></title>
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
                    <li style="background-color: rgb(15, 15, 31);border-bottom: 1px solid darkorange;"><a
                                href="perfil_usuario.php?nombreUsuario=<?= $nomre_usuario ?>">Tu perfil</a></li>
                    <li><a href="perfil_amigos.php">Amigos (<?= count($solicitudesAceptadas) ?>)</a></li>
                    <li><a href="perfil_solicitudes.php">Solicitudes
                            (<?= count($solicitudesPendientes) ?>)</a></li>
                    <li><a href="perfil_solicitudes_rechazadas.php">Solicitudes rechazadas
                            (<?= count($solicitudesRechazadas) ?>)</a></li>
                    <li><a href="perfil_mensajes.php">Mensajes</a></li>
                </ul>
            </div>
            <div class="mostrar-info">
                <div class="info">
                    <p>Nombre de usuario </p>
                    <input type="text" disabled value="  <?= $nomre_usuario ?>" >
                    <p>Correo electrónico </p>
                    <input type="text" disabled value="  <?= $correo_usuario ?>">
                    <p>Rango en Minijuegos </p>
                    <input type="text" disabled value="  <?= $rango ?>">
                    <div class="records">
                      <table>
                             <tr>
                                <th>Juego</th>
                                <th>Puntuación</th>
                            </tr>
                         <?php
                        foreach ($juegos as $juego) {
                            $nombreJuego = $juego->getNombre();
                            $record = DAO::usuarioObtenerRecord($usuarioId, $juego->getId());


                            ?>


                            <tr>
                                <td><?= $nombreJuego ?></td>
                                <td><?= $record ?></td>
                            </tr>
                            <?php
                        }
 ?>

                        </table>
                    </div>
                </div>

            </div>

        </div>


    </main>


    </body>

    </html>
    <?php
} else {
    $usuario = DAO::usuarioObtenerPorId($_SESSION['id']);
    $nomre_usuario = $usuario->getNombreUsuario();
    $solicitudesAceptadas = DAO::usuarioSolicitudesAceptadas($_SESSION['id']);
    $solicitudesPendientes = DAO::usuarioSolicitudesPendientes($_SESSION['id']);
    $solicitudesRechazadas = DAO::usuarioSolicitudesRechazadas($_SESSION['id']);

    $usuario = DAO::usuarioObtenerPorId($usuarioId);

$juegos=DAO::juegoObtenerTodos();


    //relacion de session id con id del perfil visitado
    $estadoRelacionDeAmistad = DAO::comprobarRelacionAmistad($_SESSION['id'], $usuarioId);

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
        <title><?= $usuario->getNombreUsuario() ?></title>
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
                    <li><a href="perfil_amigos.php">Amigos (<?= count($solicitudesAceptadas) ?>)</a></li>
                    <li><a href="perfil_solicitudes.php">Solicitudes
                            (<?= count($solicitudesPendientes) ?>)</a></li>
                    <li><a href="perfil_solicitudes_rechazadas.php">Solicitudes rechazadas
                            (<?= count($solicitudesRechazadas) ?>)</a></li>
                    <li><a href="perfil_mensajes.php">Mensajes</a></li>
                </ul>
            </div>
            <div class="mostrar-info">
                <div class="info">
                    <p>Perfil de:</p>
                    <h1> <?= $usuario->getNombreUsuario() ?></h1>
                    <?php
                    switch ($estadoRelacionDeAmistad) {
                        case 'amigos':
                            ?>
                            <p>Tu y este usuario sois amigos</p>
                            <?php
                            break;
                        case 'rechazadaPorUsuarioSesion':
                            ?>
                            <p>Has rechazado la solicitud de <?= $usuario->getNombreUsuario() ?>, revisa tu perfil para aceptarla o
                                eliminarla</p>
                            <?php
                            break;
                        case 'pendientePorUsuarioSesion':
                            ?>
                            <p>Este usuario le envió una solicitud</p>
                            <form action="gestion_solicitud.php">
                                <input type="submit" name="aceptar" value="Aceptar">
                                <input type="submit" name="rechazar" value="Rechazar">
                                <input type="hidden" name="idEnviador" value="<?= $usuarioId ?>">
                                <input type="hidden" name="nombreUsuario" value="<?= $_REQUEST['nombreUsuario'] ?>">
                            </form>

                            <?php
                            break;
                        case 'agregar':
                            ?>
                            <p>Enviar solicitud de amistad</p>
                            <form action="gestion_solicitud.php">
                                <input type="submit" name="enviar" value="Enviar solicitud">
                                <input type="hidden" name="idEnviador" value="<?= $usuarioId ?>">
                                <input type="hidden" name="nombreUsuario" value="<?= $_REQUEST['nombreUsuario'] ?>">
                            </form>
                            <?php
                            break;
                        case 'rechazadaPorUsuarioReceptor':
                            ?>
                            <p>Este usuario rechazó tu solicitud, no podrás enviar una nueva hasta que la elimine de su
                                bandeja o te
                                agregue como amigo</p>
                            <?php
                            break;
                        case 'pendientePorUsuarioReceptor':
                            ?>
                            <p>Tu solicitud de amistad a este usuario aún esta pendiente.</p>
                            <?php
                            break;
                        default:
                            ?>
                            <p>default</p>
                            <?php
                            break;
                    }
                    ?>

                    <button><a href="buscador_mensajes.php?idUsr=<?= $usuario->getId() ?>">Enviar mensaje</a>

                    </button>
                    <div class="records">
                        <table>
                            <tr>
                                <th>Juego</th>
                                <th>Puntuación</th>
                            </tr>
                            <?php
                            foreach ($juegos as $juego) {
                                $nombreJuego = $juego->getNombre();
                                $record = DAO::usuarioObtenerRecord($usuarioId, $juego->getId());


                                ?>


                                <tr>
                                    <td><?= $nombreJuego ?></td>
                                    <td><?= $record ?></td>
                                </tr>
                                <?php
                            }
                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    </body>
    </html>
    <?php
}
?>



