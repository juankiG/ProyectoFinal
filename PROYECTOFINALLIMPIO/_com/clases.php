<?php


trait Identificable
{
    protected $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
}

class Usuario {
    use Identificable;

    private  $nombre;
    private  $email;
    private  $contrasenna;
    private  $tipoUsuario;
    private  $nombreUsuario;
    private  $codigoCookie;
    private $token;


    public function __construct($id, $nombre, $email, $contrasenna, $tipoUsuario, $nombreUsuario, $codigoCookie,$token)
    {
        $this->setId($id);
        $this->setNombre($nombre);
        $this->setEmail($email);
        $this->setContrasenna($contrasenna);
        $this->setTipoUsuario($tipoUsuario);
        $this->setNombreUsuario($nombreUsuario);
        $this->setCodigoCookie($codigoCookie);
        $this->setToken($token);



    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getContrasenna()
    {
        return $this->contrasenna;
    }

    public function setContrasenna($contrasenna)
    {
        $this->contrasenna = $contrasenna;
    }

    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    public function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;
    }

    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }
    public function getToken()
    {
        return $this->token;
    }


    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
    }

    public function getCodigoCookie()
    {
        return $this->codigoCookie;
    }

    public function setCodigoCookie($codigoCookie)
    {
        $this->codigoCookie = $codigoCookie;
    }



    private function setToken($token)
    {
        $this->token=$token;
    }
}

class Juego {
    use Identificable;

    private  $nombre;
    private  $descripcion;
    private  $linkImagen;



    public function __construct($id, $nombre, $descripcion, $link)
    {
        $this->setId($id);
        $this->setNombre($nombre);
        $this->setDescripcion($descripcion);
        $this->setLinkImagen($link);


    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }


    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }


    public function getLinkImagen()
    {
        return $this->linkImagen;
    }

    public function setLinkImagen($linkImagen)
    {
        $this->linkImagen = $linkImagen;
    }

}
class Record{
    private $nombre;
    private $record;

    public function __construct($nombre,$record)
    {
        $this->nombre=$nombre;
        $this->record=$record;
    }


    public function getNombre()
    {
        return $this->nombre;
    }


    public function getRecord()
    {
        return $this->record;
    }

}
class Mensaje{
    private $id;
    private $idUsuario;
    private $mensaje;
    private $fecha;
    public function __construct($id,$idUsuario,$mensaje,$fecha)
    {
        $this->id=$id;
        $this->idUsuario=$idUsuario;
        $this->mensaje=$mensaje;
        $this->fecha=$fecha;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }



    /**
     * @return mixed
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * @param mixed $mensaje
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

}



