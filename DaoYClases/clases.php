<?php

abstract class Dato
{
}

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

class Cliente extends Dato {
    use Identificable;

    private  $email;
    private  $contrasenna;
    private  $codigoCookie;
    private  $nombre;

    private  $usuario;
    private  $tipoUsuario;

    public function __construct($id, $nombre, $usuario,$email, $contrasenna,  $tipoUsuario, $codigoCookie)
    {
        $this->setId($id);
        $this->setEmail($email);
        $this->setContrasenna($contrasenna);
        $this->setCodigoCookie($codigoCookie);
        $this->setNombre($nombre);
        $this->setUsuario($usuario);
        $this->setTipousuario($tipoUsuario);

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

    public function getCodigoCookie()
    {
        return $this->codigoCookie;
    }

    public function setCodigoCookie($codigoCookie)
    {
        $this->codigoCookie = $codigoCookie;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    public function getTipoUsuaurio()
    {
        return $this->tipoUsuario;
    }

    public function setTipousuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;
    }

}

class Juego extends Dato
{
    use Identificable;

    private $nombre;
    private $descripcion;
    private $link;
    private $img;

    function __construct(int $id=null, string $nombre, string $descripcion, string $link, string $img)
    {
        if        ($id != null && $nombre == null) { // Cargar de BD
            // TODO obtener info de la BD usando el id.
        } else if ($id == null && $nombre != null) { // Crear en BD
           DAO::agregarProducto($nombre,$descripcion,$link,$img);
        } else { // No hacemos nada con la BD (debe venir todo relleno)
            $this->id = $id;
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->link = $link;
            $this->img=$img;

        }
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link): void
    {
        $this->link = $link;
    }
    public function getimg(): string
    {
        return $this->img;
    }

    public function setImg(string $img): void
    {
        $this->img = $img;
    }


}

