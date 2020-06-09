<?php
require_once "../../_com/sesiones.php";
if (!haySesionIniciada() || comprobarCookieRecurdame()) redireccionar("../../user/sesion-inicio.php");

$juegoActual = $_REQUEST['juego'];


$juego = DAO::juegoObtenerPorNombre($juegoActual);

$recordActual = DAO::usuarioObtenerRecord($_SESSION['id'], $juego->getId());

?>
<html>
<head>

    <title>Tetris Game</title>
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
        .puntuacion h1 {
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
        .puntuacion{
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
        .puntuacion div{
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
        .puntuacion .recordActual{
            display: flex;
            width:100%;
            padding: 10px;
            font-size: 12px;
            color: white;
            font-family:'Jost', sans-serif;
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
            width: 60%;
            display: flex;
            height: 80%;
            padding: 5px;
            justify-content: center;
        }
        table tbody{
            width: 90%;
            height: 90%;
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
        <canvas id="tetris" width="200" height="400" style="height: 85%;width: 30%"></canvas>
    </div>
    <div class="info">
        <div class="puntuacion">

            <h1>Puntuación:</h1>
            <div id="puntuacion">0</div>
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
    const I = [
        [
            [0, 0, 0, 0],
            [1, 1, 1, 1],
            [0, 0, 0, 0],
            [0, 0, 0, 0],
        ],
        [
            [0, 0, 1, 0],
            [0, 0, 1, 0],
            [0, 0, 1, 0],
            [0, 0, 1, 0],
        ],
        [
            [0, 0, 0, 0],
            [0, 0, 0, 0],
            [1, 1, 1, 1],
            [0, 0, 0, 0],
        ],
        [
            [0, 1, 0, 0],
            [0, 1, 0, 0],
            [0, 1, 0, 0],
            [0, 1, 0, 0],
        ]
    ];

    const J = [
        [
            [1, 0, 0],
            [1, 1, 1],
            [0, 0, 0]
        ],
        [
            [0, 1, 1],
            [0, 1, 0],
            [0, 1, 0]
        ],
        [
            [0, 0, 0],
            [1, 1, 1],
            [0, 0, 1]
        ],
        [
            [0, 1, 0],
            [0, 1, 0],
            [1, 1, 0]
        ]
    ];

    const L = [
        [
            [0, 0, 1],
            [1, 1, 1],
            [0, 0, 0]
        ],
        [
            [0, 1, 0],
            [0, 1, 0],
            [0, 1, 1]
        ],
        [
            [0, 0, 0],
            [1, 1, 1],
            [1, 0, 0]
        ],
        [
            [1, 1, 0],
            [0, 1, 0],
            [0, 1, 0]
        ]
    ];

    const O = [
        [
            [0, 0, 0, 0],
            [0, 1, 1, 0],
            [0, 1, 1, 0],
            [0, 0, 0, 0],
        ]
    ];

    const S = [
        [
            [0, 1, 1],
            [1, 1, 0],
            [0, 0, 0]
        ],
        [
            [0, 1, 0],
            [0, 1, 1],
            [0, 0, 1]
        ],
        [
            [0, 0, 0],
            [0, 1, 1],
            [1, 1, 0]
        ],
        [
            [1, 0, 0],
            [1, 1, 0],
            [0, 1, 0]
        ]
    ];

    const T = [
        [
            [0, 1, 0],
            [1, 1, 1],
            [0, 0, 0]
        ],
        [
            [0, 1, 0],
            [0, 1, 1],
            [0, 1, 0]
        ],
        [
            [0, 0, 0],
            [1, 1, 1],
            [0, 1, 0]
        ],
        [
            [0, 1, 0],
            [1, 1, 0],
            [0, 1, 0]
        ]
    ];

    const Z = [
        [
            [1, 1, 0],
            [0, 1, 1],
            [0, 0, 0]
        ],
        [
            [0, 0, 1],
            [0, 1, 1],
            [0, 1, 0]
        ],
        [
            [0, 0, 0],
            [1, 1, 0],
            [0, 1, 1]
        ],
        [
            [0, 1, 0],
            [1, 1, 0],
            [1, 0, 0]
        ]
    ];
    const cvs = document.getElementById("tetris");
    const ctx = cvs.getContext("2d");
    const puntuacion_index = document.getElementById("puntuacion");

    const FIL = 20;
    const COL = COLUMN = 10;
    const SQ = squareSize = 20; // tamaño de los cuadrados
    const VACIO = "WHITE"; // color de los bloques vacios

    // dibujar bloques en el canvas
    function crearBloque(x, y, color) {
        ctx.fillStyle = color;
        ctx.fillRect(x * SQ, y * SQ, SQ, SQ);

        ctx.strokeStyle = "GREY";
        ctx.strokeRect(x * SQ, y * SQ, SQ, SQ);
    }

    // medidas del tablero del juego

    let tablero = [];
    for (r = 0; r < FIL; r++) {
        tablero[r] = [];
        for (c = 0; c < COL; c++) {
            tablero[r][c] = VACIO;
        }
    }

    // dibujar el tablero

    function crearTablero() {
        for (r = 0; r < FIL; r++) {
            for (c = 0; c < COL; c++) {
                crearBloque(c, r, tablero[r][c]);
            }
        }
    }

    crearTablero();

    // piezas y sus colores

    const PIEZAS = [
        [Z, "red"],
        [S, "green"],
        [T, "yellow"],
        [O, "blue"],
        [L, "purple"],
        [I, "cyan"],
        [J, "orange"]
    ];

    // generar piezas al azar

    function randomPieza() {
        let r = randomN = Math.floor(Math.random() * PIEZAS.length) // 0 -> 6
        return new pieza(PIEZAS[r][0], PIEZAS[r][1]);
    }

    let p = randomPieza();

    // el objeto pieza , cada pieza se llama TETRAMINO

    function pieza(tetromino, color) {
        this.tetromino = tetromino;
        this.color = color;

        this.tetrominoN = 0; // empieza por el primer modelo
        this.activeTetromino = this.tetromino[this.tetrominoN];

        // necesitamos controlar las piezas
        this.x = 3;
        this.y = -2;
    }

    // funcion de relleno

    pieza.prototype.fill = function (color) {
        for (r = 0; r < this.activeTetromino.length; r++) {
            for (c = 0; c < this.activeTetromino.length; c++) {
                // dibujamos solo los bloques ocupados
                if (this.activeTetromino[r][c]) {
                    crearBloque(this.x + c, this.y + r, color);
                }
            }
        }
    }

    // dibujar la pieza en el tablero
    pieza.prototype.draw = function () {
        this.fill(this.color);
    }

    // borrar la pieza
    pieza.prototype.unDraw = function () {
        this.fill(VACIO);
    }

    // mover la pieza hacia abajo , aumenta velocidad

    pieza.prototype.moveDown = function () {
        if (!this.collision(0, 1, this.activeTetromino)) {
            this.unDraw();
            this.y++;
            this.draw();
        } else {
            // paramos la pieza y dibujamos otra
            this.lock();
            p = randomPieza();
        }

    }

    // mover la pieza hacia la derecha
    pieza.prototype.moveRight = function () {
        if (!this.collision(1, 0, this.activeTetromino)) {
            this.unDraw();
            this.x++;
            this.draw();
        }
    }

    // mover la pieza hacia la izquierda
    pieza.prototype.moveLeft = function () {
        if (!this.collision(-1, 0, this.activeTetromino)) {
            this.unDraw();
            this.x--;
            this.draw();
        }
    }

    // girar la pieza
    pieza.prototype.rotate = function () {
        let siguienteModelo = this.tetromino[(this.tetrominoN + 1) % this.tetromino.length];
        let kick = 0; //choque de la pieza con una pared

        if (this.collision(0, 0, siguienteModelo)) {
            if (this.x > COL / 2) {
                // pared derecha
                kick = -1; //mover la pieza hacia la izq.
            } else {
                // pared izquierda
                kick = 1; // mover la pieza hacia la dcha.
            }
        }

        if (!this.collision(kick, 0, siguienteModelo)) {
            this.unDraw();
            this.x += kick;
            this.tetrominoN = (this.tetrominoN + 1) % this.tetromino.length; // (0+1)%4 => 1
            this.activeTetromino = this.tetromino[this.tetrominoN];
            this.draw();
        }
    }

    let puntuacion = 0;

    pieza.prototype.lock = function () {
        for (r = 0; r < this.activeTetromino.length; r++) {
            for (c = 0; c < this.activeTetromino.length; c++) {
                // saltamos los bloques vacios
                if (!this.activeTetromino[r][c]) {
                    continue;
                }
                // si la piezas se bloquean en el tope = GAME OVER
                if (this.y + r < 0) {
                    document.location.href = "../guardarPuntuacion.php?idJuego=" + id + "&puntuacion=" + puntuacion;
                    //esto tengo que cambiarlo luego para que redirigja al guardar puntuacion y tal

                    // detener la solicitud de generar pieza
                    gameOver = true;
                    break;
                }
                // paramos la pieza
                tablero[this.y + r][this.x + c] = this.color;
            }
        }
        // borrar las filas completas
        for (r = 0; r < FIL; r++) {
            let filaCompleta = true;
            for (c = 0; c < COL; c++) {
                filaCompleta = filaCompleta && (tablero[r][c] != VACIO);
            }
            if (filaCompleta) {
                // si la fila esta completa
                // movemos abajo las filas superiores
                for (y = r; y > 1; y--) {
                    for (c = 0; c < COL; c++) {
                        tablero[y][c] = tablero[y - 1][c];
                    }
                }

                for (c = 0; c < COL; c++) {
                    tablero[0][c] = VACIO;
                }
                // sumar la puntuacion , +10 cada fila borrada
                puntuacion += 10;
            }
        }
        // actualizar el tablero
        crearTablero();

        // actualizar la puntuacion
        puntuacion_index.innerHTML = puntuacion;
    }

    // funcion de colision

    pieza.prototype.collision = function (x, y, piece) {
        for (r = 0; r < piece.length; r++) {
            for (c = 0; c < piece.length; c++) {
                // isi el bloque esta vacio, lo saltamos
                if (!piece[r][c]) {
                    continue;
                }

                let newX = this.x + c + x;
                let newY = this.y + r + y;


                if (newX < 0 || newX >= COL || newY >= FIL) {
                    return true;
                }

                if (newY < 0) {
                    continue;
                }

                if (tablero[newY][newX] != VACIO) {
                    return true;
                }
            }
        }
        return false;
    }

    // CONTROL bloques

    document.addEventListener("keydown", CONTROL);

    function CONTROL(event) {
        if (event.keyCode == 37) {
            p.moveLeft();
            borradoComienzo = Date.now();
        } else if (event.keyCode == 38) {
            p.rotate();
            borradoComienzo = Date.now();
        } else if (event.keyCode == 39) {
            p.moveRight();
            borradoComienzo = Date.now();
        } else if (event.keyCode == 40) {
            p.moveDown();
        }
    }

    // borrar bloque cada 1 seg usamos la hora actual

    let borradoComienzo = Date.now();
    let gameOver = false;

    function borrado() {
        let now = Date.now();
        let delta = now - borradoComienzo;
        if (delta > 1000) {
            p.moveDown();
            borradoComienzo = Date.now();
        }
        if (!gameOver) {
            requestAnimationFrame(borrado);
        }
    }

    borrado();

</script>
<script src="tetris.js"></script>
</body>
</html>