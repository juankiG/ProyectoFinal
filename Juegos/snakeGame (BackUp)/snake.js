function Snake(){
    this.x = 0;
    this.y = 0;
    this.xSpeed = escala * 1 ;
    this.ySpeed = 0 ;
    this.total = 0;
    this.cola = [];

    this.pintar = function(){
        contexto.fillStyle = "#003300";
        for (let i=0; i<this.cola.length; i++){
            contexto.fillRect(this.cola[i].x, this.cola[i].y, escala, escala);
        }
        contexto.fillRect(this.x, this.y, escala, escala);
    }

    this.actualizar = function (){

        for (let i=0; i<this.cola.length -1; i++){
            this.cola[i] = this.cola[i+1];
        }

        this.cola[this.total - 1] = {x: this.x, y : this.y};

        this.x += this.xSpeed;
        this.y += this.ySpeed;

        if( this.x > canvas.width-1){
            this.x= 0;
        }

        if( this.x < 0){
            this.x= canvas.width;
        }

        if( this.y > canvas.height-1){
            this.y= 0;
        }

        if( this.y < 0){
            this.y= canvas.height;
        }
    }

    this.cambiarDireccion = function(direccion){
        switch(direccion){
            case 'Up':
                this.xSpeed = 0;
                this.ySpeed= -escala * 1;
                break;
            case 'Down':
                this.xSpeed = 0;
                this.ySpeed= escala * 1;
                break;
            case 'Left':
                this.xSpeed = -escala * 1;
                this.ySpeed= 0;
                break;
            case 'Right':
                this.xSpeed = escala * 1;
                this.ySpeed= 0;
                break;
        }
    }

    this.comer = function(fruta){
        if(this.x === fruta.x && this.y === fruta.y){
            this.total = this.total + 1;
            return true;
        }
        return false;

    }

    this.haChocado = function(){
        for(let i=0; i<this.cola.length; i++){
            if(this.x === this.cola[i].x &&
                this.y === this.cola[i].y)
            {
                this.total=0;
                this.cola= [];
            }
        }
    }
}