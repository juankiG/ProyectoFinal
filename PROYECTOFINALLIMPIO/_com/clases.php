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



