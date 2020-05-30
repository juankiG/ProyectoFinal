<?php
require_once "../_com/comunes-app.php";

$rs = DAO::obtenerConversacionesUsuario($_SESSION['id']);

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
    <title><?= $usuario->getNombreUsuario() ?> | mensajes</title>
</head>
<body>
<nav>
    <div class="logo">
        <a href="usuarioPantallaPrincipal.php"><img src="IMG/logo.webp" alt=""></a>
    </div>
    <div class="buscar">
        <form action="buscador.php">
            <input type="text" name="Nombre" placeholder="Buscar...">
            <input type="submit" value="Buscar">
        </form>
    </div>
    <div class="menu">
        <ul>
            <li><a href="usuarioPantallaPrincipal.php">Inicio</a></li>
            <li class="perfil"><a>Perfil</a>
                <div class="submenu">
                    <ul>
                        <li><a style="padding: 0">
                                <form class="ver-perfil-form" action="../user/usuarioPerfil.php" method="post">
                                    <input type="submit" value="Ver mi perfil">
                                    <input type="hidden" name="nombreUsuario"
                                           value="<?= $_SESSION["nombreUsuario"] ?>">
                                </form>
                            </a></li>
                        <?php
                        if ($usuario->getTipoUsuario() == 1) {
                            ?>

                            <li><a href=".././_ad/subirJuego.php">subir juego</a></li><?php
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
                            href="usuarioPerfil.php?nombreUsuario=<?= $nomre_usuario ?>">Tu perfil</a></li>
                <li><a
                            href="../user/usuarioVerAmigos.php">Amigos (<?= count($solicitudesAceptadas) ?>)</a></li>
                <li><a href="../user/usuarioVerSolicitudes.php">Solicitudes
                        (<?= count($solicitudesPendientes) ?>)</a></li>
                <li><a href="../user/usuarioVerSolicitudesRechazadas.php">Solicitudes rechazadas
                        (<?= count($solicitudesRechazadas) ?>)</a></li>
                <li style="background-color: rgb(15, 15, 31);border-bottom: 1px solid darkorange;"><a
                            href="../user/usuarioVerConversaciones.php">Mensajes</a></li>
            </ul>
        </div>
        <div class="mostrar-mensajes">
            <div class="buscar-mensaje">
                <p>Nuevo mensaje para:</p>
                <form action="nuevoMensajePerfilGestionar.php">
                    <input type="text" name="usrName" placeholder=" Usuario">
                    <input type="submit" value="buscar">
                </form>
            </div>
            <div class="lista-mensajes">
                <p>Conversaciones</p>
                <ul>
                    <?php

                    if (!$rs) {
                        echo("<p> No hay conversaciones aún</p>");
                    }
                    foreach ($rs as $fila) {
                        if ($fila['idUsuarioUno'] == $_SESSION['id']) {
                            $idUsuarioConversacion = $fila['idUsuarioDos'];
                        }

                        if ($fila['idUsuarioDos'] == $_SESSION['id']) {
                            $idUsuarioConversacion = $fila['idUsuarioUno'];
                        }

                        $usuario = DAO::usuarioObtenerPorId($idUsuarioConversacion);
                        ?>
                        <li>
                            <a href="usuarioPerfil.php?nombreUsuario=<?= $usuario->getNombreUsuario() ?>"><?= $usuario->getNombreUsuario() ?>
                            </a>
                            <a href="usuarioVerConversaciones.php?idC=<?= $fila['idConversacion'] ?>&usrId=<?= $_SESSION['id'] ?>">Ver
                                mensajes</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>

            </div>

        </div>
        <div class="conversacion">
            <div class="nombre-chat">
                <h2>
                    <?php

                    if (isset($_REQUEST['idC'])) {
                        foreach ($rs as $fila) {

                            if ($fila['idConversacion'] == $_REQUEST['idC'] && $fila['idUsuarioDos'] == $_SESSION['id']) {

                                $idUsuarioConversacion = $fila['idUsuarioUno'];


                            }
                            if ($fila['idConversacion'] == $_REQUEST['idC'] && $fila['idUsuarioUno'] == $_SESSION['id']) {
                                $idUsuarioConversacion = $fila['idUsuarioDos'];
                            }
                        }
                        $usuarioChat = DAO::usuarioObtenerPorId($idUsuarioConversacion);
                        $texto=$usuarioChat->getNombreUsuario();;
                        ?>
                        <?=  $texto?>
                        <?php
                    }else{
                        $texto="Selecciona una conversacion";

                    ?>
                    <?=  $texto?>
                    <?php } ?>
                </h2>
            </div>
            <?php
            if (!isset($_REQUEST['idC']) && !isset($_REQUEST['usrId'])) {
                ?>
                <?php
            } else {
                $idC = $_REQUEST['idC'];
                $usrId = $_SESSION["id"];
                require_once "conversacionVerMensajes.php";
            }
            ?>
        </div>
    </div>
</main>


</body>
</html>