<?php
require_once "../_com/comunes-app.php";
if (isset($_REQUEST['record'])) {
    $idJuego = $_REQUEST['idJuego'];

    $juego = DAO::juegoObtenerPorID($idJuego);
    ?>

    <html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../user/css/estilo_entre_pantallas.css">
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
        <title>GAME OVER</title>
    </head>
    <body>
    <div class="info">
        <div class="logo">
            <a href=""><img src="../user/IMG/logo.webp" alt=""></a>
        </div>
        <p>Has perdido, tu puntuación es: <?= $_REQUEST['record'] ?></p>
        <form action="../juegos/<?= $juego->getNombre() ?>Game/index.php?juego=<?= $juego->getNombre() ?>"
              method="POST">


            <button type="submit" name="jugar" style="display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    color: white;
    font-family: 'Jost', sans-serif;
    text-transform: uppercase;
    font-size: 12px;
    width: 20%;
    height: 100%;">Volver a jugar
            </button>

        </form>

    </div>

    </body>
    </html>
    <?php
}


?>
