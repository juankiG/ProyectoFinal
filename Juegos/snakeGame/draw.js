//const canvas = document.querySelector(".canvas");
const canvas = document.getElementById("canvas");
const contexto = canvas.getContext("2d");
const escala = 10;
const filas= canvas.height / escala;
const columnas = canvas.width / escala;


var snake;

(function setup(){
 snake = new Snake();
 fruta = new Fruta();

 fruta.actualizarUbicacion();


 window.setInterval(() => {
     contexto.clearRect(0, 0, canvas.width, canvas.height);
     fruta.pintar();
    snake.actualizar();
    snake.pintar();

    if(snake.comer(fruta)){
        //contador = contador + 1;
        fruta.actualizarUbicacion();
    }

    snake.haChocado();

     document.querySelector('.puntuacion')
         .innerText = snake.total;
 }, 200);
}());

window.addEventListener('keydown', ((evt) => {
    const direccion = evt.key.replace('Arrow', '');
    snake.cambiarDireccion(direccion);
}));

console.log(canvas);