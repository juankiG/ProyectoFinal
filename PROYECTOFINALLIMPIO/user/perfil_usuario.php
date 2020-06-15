<?php
session_start();
require_once "../_com/comunes-app.php";





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



