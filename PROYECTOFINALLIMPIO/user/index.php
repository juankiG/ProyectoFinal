<?php
session_start();
require_once "../_com/comunes-app.php";
$id = $_SESSION['id'];
$usuario = DAO::usuarioObtenerPorId($id);

$juegos = DAO::juegoObtenerTodos();
if (isset($_REQUEST['Enviar']))
    DAO::mensajeInsertar($usuario->getId(), $_REQUEST['mensaje']);

?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo_principal.css">
    <title>Inicio</title>
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
                                    <input type="hidden" name="nombreUsuario" value="<?= $_SESSION["nombreUsuario"] ?>">
                                </form>
                            </a></li>
                        <?php
                        if ($usuario->getTipoUsuario() == 1) {
                            ?>

                            <li><a href="../_ad/ad_subir_juego.php">subir juego</a></li>
                            <li><a href="../_ad/ad_lista_usuarios.php">Usuarios</a></li>
                            <?php

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
    <div class="chat">

        <?php
        require_once "chat_enLinea.php";
        ?>

    </div>
    <div id="contenido">
        <?php// require "../_com/info-sesion.php"; ?>
        <div class="juegos">

            <?php
            foreach ($juegos as $juego) {
                $nombreJuego = $juego->getNombre();
                $linkImagen = $juego->getLinkImagen();
                $descripcionJuego = $juego->getDescripcion();


                ?>
                <div id="juego">

                <a href="../juegos/<?= $nombreJuego ?>Game/index.php?juego=<?= $nombreJuego ?>"><img
                                src="<?= $linkImagen ?>"/></a>

                <div class="descripcion-juego">

                        <h2> <?=$nombreJuego ?> </h2>

                    <p><?=$descripcionJuego ?></p>
                </div>
                </div>

                <?php
            }
            ?>
        </div>


    </div>

</main>










</body>
</html>