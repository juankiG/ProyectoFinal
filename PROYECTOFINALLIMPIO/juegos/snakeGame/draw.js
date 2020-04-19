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

    if(snake.comer(fruta)){
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