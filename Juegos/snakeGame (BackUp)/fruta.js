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