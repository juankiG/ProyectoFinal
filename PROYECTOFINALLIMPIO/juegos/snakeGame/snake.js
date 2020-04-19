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
                document.location.href = "guardarPuntuacion.php?idJuego=13&puntuacion=" + this.total ;
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
            document.location.href = "guardarPuntuacion.php?idJuego=13&puntuacion=" + this.total ;
            console.log("colision");
            this.total = 0;
            this.cola = [];
        }
    }

}