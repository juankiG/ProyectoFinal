<?php
require_once "../../_com/sesiones.php";

if (!haySesionIniciada() || comprobarCookieRecurdame()) redireccionar("../../user/sesion-inicio.php");

$juegoActual = $_REQUEST['juego'];


$juego = DAO::juegoObtenerPorNombre($juegoActual);

$recordActual = DAO::usuarioObtenerRecord($_SESSION['id'], $juego->getId());

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <style>
        html {
            height: 99.7%;
            display:flex;
            width: 100%;
            margin:0;
        }

        body {
            background-image: url("../../user/IMG/sinMarcaDeAgua+Oscuro.jpg");
            background-size: cover;
            height: 100%;
            width: 100%;
            flex-wrap: wrap;
            margin: 0;
        }
        nav {
            display: flex;
            width: 100%;
            background-color: rgba(36, 40, 59, 1);
            flex-wrap: wrap;
            align-items: center;
            height: 10%;
            border-bottom: 2px solid darkorange;
            justify-content: center;
        }
        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 20%;
            margin: 0;
        }

        .logo a {
            display: flex;
            width: 100%;
            margin: 0;
        }

        .logo img {
            margin-bottom: 10px;
            margin-left: 20px;
            width: 100%;
            height: 50px;
        }
        main{
            display: flex;
            width: 100%;
            height: 90%;
            flex-wrap: wrap;
        }
        .juego{
            display: flex;
            width: 70%;
            height: 100%;
            justify-content: center;
            align-items: center;
        }
        .info{
            display: flex;
            width: 30%;
            flex-wrap: wrap;
            justify-content: center;
        }

        canvas{
            display: block;
            margin:0;
            border: 2px solid darkorange;
        }
        #puntuacion h1 {
            display: flex;
            width:auto;
            padding: 10px;
            font-size: 16px;
            color: white;
            font-family: 'Anton', sans-serif;
            text-transform: uppercase;
            font-weight: 500;
            letter-spacing: 1.3px;
            margin: 0;
            align-items: center;
        }
        #puntuacion{
            margin-top: 15px;
            display: flex;
            width: 90%;
            flex-wrap: wrap;
            height: 15%;
            border-bottom: 1px solid darkorange;
            border-radius: 10px;
            background-color: rgba(36, 40, 59, 0.6);
            justify-content: center;

        }
        #puntuacion div{
            padding: 10px;
            align-items: center;
            display: flex;
            justify-content: center;
            width: 10%;
            color: white;
            font-family: 'Anton', sans-serif;
            font-size: 16px;
            letter-spacing: .6px;
            margin: 0;
        }
        #puntuacion .recordActual{
            display: flex;
            width:100%;
            padding: 10px;
            font-size: 13px;
            color: white;
            font-family: 'jost', sans-serif;
            letter-spacing: .3px;
            text-transform: lowercase;
            margin: 0;
            align-items: center;
            justify-content: space-around;
        }
        .descripcion{
            width: 90%;
            display: flex;
            height: 30%;
            justify-content: center;
            flex-wrap: wrap;
            border-bottom: 1px solid darkorange;
            border-radius: 10px;
            background-color: rgba(36, 40, 59, 0.6);
        }
        .descripcion p{
            display: flex;
            width:100%;
            padding: 10px;
            font-size: 12px;
            color: white;
            font-family: 'Jost', sans-serif;
            letter-spacing: .6px;
            margin: 0;
            align-items: center;
        }
        .record{
            width: 90%;
            display: flex;
            height: 30%;
            justify-content: center;
            flex-wrap: wrap;
            border-bottom: 1px solid darkorange;
            border-radius: 10px;
            background-color: rgba(36, 40, 59, 0.6);
        }

        .record table{
            width: 75%;
            display: flex;
            height: 80%;
            padding: 5px;
            justify-content: center;
        }
        table tbody{
            width: 90%;
            height: auto;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;

        }
        tbody tr{
            width: 100%;
            display: flex;
            justify-content: space-around;
        }
        th{
            height: 20%;
            display: flex;
            justify-content: space-around;
            width:100%;
            font-size: 12px;
            color: white;
            font-family: 'Jost', sans-serif;
            text-transform: uppercase;
            letter-spacing: .6px;
            margin: 0;
            align-items: center;
            border-bottom: 1px solid darkorange;
        }
        td{
            display: flex;
            justify-content: space-around;
            width:100%;
            padding: 2px;
            font-size: 11px;
            color: white;
            font-family: 'Jost', sans-serif;
            letter-spacing: .6px;
            margin: 0;
            align-items: center;
        }
        .salir{
            width: 90%;
            display: flex;
            height: 10%;
            justify-content: center;
            align-items: center;

        }
        .salir a{
            display: flex;
            width: 50%;
            height: 100%;
            margin: 0;
            text-decoration: none;
            color: white;
            background-color: darkorange;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            font-size: 14px;
            color: white;
            font-family: 'Anton', sans-serif;
            letter-spacing: .8px;
        }
        .salir a:hover{
            background-color: #ffb516;
        }
    </style>

    <title>Juega snake!</title>
</head>
<body>
<script>
    var id = "<?php echo $juego->getId();?>";
</script>
<nav>
    <div class="logo">
        <a href="../../user/index.php"><img src="../../user/IMG/logo.webp" alt=""></a>
    </div>

</nav>
<main>
    <div class="juego">
        <canvas class="canvas" id="canvas" height="300" width="300"
                style="background-color: #009900;width: 45%;height: 70%"></canvas>
    </div>
    <div class="info">
        <div id="puntuacion">
            <h1>Puntuación:</h1>
            <div class="puntuacion" style="width: 10%"></div>
            <h1 class="recordActual">Tu record actual es: <?= $recordActual ?></h1>
        </div>
        <div class="descripcion">

            <?php
            require_once "../juego_descripcion.php";
            ?>

        </div>

        <div class="record">
            <?php
            require_once "../juego_record.php";
            ?>
        </div>
        <div class="salir">
            <a href="../../user/index.php">salir</a>
        </div>
    </div>
</main>


<script>
    function Fruta() {
        this.x;
        this.y;

        this.actualizarUbicacion = function () {
            this.x = (Math.floor((Math.random() * filas - 1) + 1) * escala);
            this.y = (Math.floor((Math.random() * columnas - 1) + 1) * escala);
        };

        this.pintar = function () {
            contexto.fillStyle = "#ab0000";
            contexto.fillRect(this.x, this.y, escala, escala);
        }
    }

    function Bloque() {
        this.x;
        this.y;

        this.actualizarUbicacion = function () {
            this.x = (Math.floor((Math.random() * filas - 1) + 1) * escala);
            this.y = (Math.floor((Math.random() * columnas - 1) + 1) * escala);
        };

        this.pintar = function () {
            contexto.fillStyle = "#aaaaaa";
            contexto.fillRect(this.x, this.y, escala, escala);
        }
    }

    function Snake() {
        this.x = 0;
        this.y = 0;
        this.xSpeed = escala * 1;
        this.ySpeed = 0;
        this.total = 0;
        this.cola = [];

        this.pintar = function () {
            contexto.fillStyle = "#003300";
            for (let i = 0; i < this.cola.length; i++) {
                contexto.fillRect(this.cola[i].x, this.cola[i].y, escala, escala);
            }
            contexto.fillRect(this.x, this.y, escala, escala);
        }

        this.actualizar = function () {

            for (let i = 0; i < this.cola.length - 1; i++) {
                this.cola[i] = this.cola[i + 1];
            }

            this.cola[this.total - 1] = {x: this.x, y: this.y};

            this.x += this.xSpeed;
            this.y += this.ySpeed;

            if (this.x > canvas.width - 1) {
                this.x = 0;
            }

            if (this.x < 0) {
                this.x = canvas.width;
            }

            if (this.y > canvas.height - 1) {
                this.y = 0;
            }

            if (this.y < 0) {
                this.y = canvas.height;
            }
        }

        this.cambiarDireccion = function (direccion) {
            switch (direccion) {
                case 'Up':
                    if (this.ySpeed != escala * 1) {
                        this.xSpeed = 0;
                        this.ySpeed = -escala * 1;
                    }
                    break;
                case 'Down':
                    if (this.ySpeed != -escala * 1) {
                        this.xSpeed = 0;
                        this.ySpeed = escala * 1;
                    }
                    break;
                case 'Left':
                    if (this.xSpeed != escala * 1) {
                        this.xSpeed = -escala * 1;
                        this.ySpeed = 0;
                    }
                    break;
                case 'Right':
                    if (this.xSpeed != -escala * 1) {
                        this.xSpeed = escala * 1;
                        this.ySpeed = 0;
                    }
                    break;
            }
        }

        this.comer = function (fruta) {
            if (this.x === fruta.x && this.y === fruta.y) {
                this.total = this.total + 1;
                console.log("comer");
                return true;
            }
            return false;

        }

        this.haChocadoSerpiente = function () {

            for (let i = 0; i < this.cola.length; i++) {
                if ((this.x === this.cola[i].x &&
                    this.y === this.cola[i].y)) {
                    document.location.href = "../juego_guardar_puntuacion.php?idJuego=" + id + "&puntuacion=" + this.total;
                    console.log("colision");
                    this.total = 0;
                    this.cola = [];
                }
            }
        }

        this.haChocadoBloque = function (
            bloque1x,
            bloque1y,
            bloque2x,
            bloque2y,
            bloque3x,
            bloque3y,
            bloque4x,
            bloque4y) {

            if ((this.x === bloque1x &&
                this.y === bloque1y) ||
                (this.x === bloque2x &&
                    this.y === bloque2y) ||
                (this.x === bloque3x &&
                    this.y === bloque3y) ||
                (this.x === bloque3x &&
                    this.y === bloque3y) ||
                (this.x === bloque4x &&
                    this.y === bloque4y)) {
                document.location.href = "../juego_guardar_puntuacion.php?idJuego=" + id + "&puntuacion=" + this.total;
                console.log("colision");
                this.total = 0;
                this.cola = [];
            }
        }

    }

    //const canvas = document.querySelector(".canvas");
    const canvas = document.getElementById("canvas");
    const contexto = canvas.getContext("2d");
    const escala = 10;
    const filas = canvas.height / escala;
    const columnas = canvas.width / escala;


    var snake;


    (function setup() {
        snake = new Snake();
        fruta = new Fruta();
        bloque1 = new Bloque();
        bloque2 = new Bloque();
        bloque3 = new Bloque();
        bloque4 = new Bloque();


        fruta.actualizarUbicacion();
        bloque1.actualizarUbicacion();
        bloque2.actualizarUbicacion();
        bloque3.actualizarUbicacion();
        bloque4.actualizarUbicacion();


        window.setInterval(() => {
            contexto.clearRect(0, 0, canvas.width, canvas.height);
            bloque1.pintar();
            bloque2.pintar();
            bloque3.pintar();
            bloque4.pintar();

            fruta.pintar();
            snake.actualizar();
            snake.pintar();

            if (snake.comer(fruta)) {
                //contador = contador + 1;
                fruta.actualizarUbicacion();
                bloque1.actualizarUbicacion();
                bloque2.actualizarUbicacion();
                bloque3.actualizarUbicacion();
                bloque4.actualizarUbicacion();


            }

            snake.haChocadoBloque(
                bloque1.x,
                bloque1.y,
                bloque2.x,
                bloque2.y,
                bloque3.x,
                bloque3.y,
                bloque4.x,
                bloque4.y,);

            snake.haChocadoSerpiente();

            document.querySelector('.puntuacion')
                .innerText = snake.total;
        }, 150);
    }());

    window.addEventListener('keydown', ((evt) => {
        const direccion = evt.key.replace('Arrow', '');
        snake.cambiarDireccion(direccion);
    }));

    console.log(canvas);
</script>


</body>
</html>