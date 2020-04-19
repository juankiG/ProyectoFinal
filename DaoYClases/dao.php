<?php

require_once "clases.php";
require_once "utilidades.php";

class DAO
{
    private static $pdo = null;

    private static function obtenerPdoConexionBD()
    {
        $servidor = "localhost";
        $identificador = "root";
        $contrasenna = "";
        $bd = "proyectojuegos"; // Schema
        $opciones = [
            PDO::ATTR_EMULATE_PREPARES => false, // Modo emulación desactivado para prepared statements "reales"
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Que los errores salgan como excepciones.
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // El modo de fetch que queremos por defecto.
        ];

        try {
            $pdo = new PDO("mysql:host=$servidor;dbname=$bd;charset=utf8", $identificador, $contrasenna, $opciones);
        } catch (Exception $e) {
            error_log("Error al conectar: " . $e->getMessage());
            exit("Error al conectar" . $e->getMessage());
        }

        return $pdo;
    }

    private static function ejecutarConsulta(string $sql, array $parametros): array
    {
        if (!isset(self::$pdo)) {
            self::$pdo = self::obtenerPdoConexionBd();
        }

        $select = self::$pdo->prepare($sql);
        $select->execute($parametros);
        return $select->fetchAll();
    }

    public static function ejecutarActualizacion(string $sql, array $parametros): void
    {
        if (!isset(self::$pdo)) {
            self::$pdo = self::obtenerPdoConexionBd();
        }

        $actualizacion = self::$pdo->prepare($sql);
        $actualizacion->execute($parametros);
    }


    /* CLIENTE */

    private static function crearClienteDesdeRs(array $rs): Cliente
    {
        return new Cliente($rs[0]["id"], $rs[0]["nombre"], $rs[0]["usuario"], $rs[0]["correoElectronico"], $rs[0]["contrasenna"], $rs[0]["tipousuario"], $rs[0]["codigoCookie"]);
    }

    public static function clienteObtenerPorId(int $id): Cliente
    {
        $rs = self::ejecutarConsulta("SELECT * FROM usuarios WHERE id=?", [$id]);
        return self::crearClienteDesdeRs($rs);
    }



    public static function clienteObtenerPorUsuarioYContrasenna($usuario, $contrasenna)
    {
        $rs = self::ejecutarConsulta("SELECT * FROM usuarios WHERE BINARY usuario=? AND BINARY contrasenna=?",
            [$usuario, $contrasenna]);
        if ($rs) {
            return new Cliente($rs[0]["id"], $rs[0]["nombre"], $rs[0]["usuario"], $rs[0]["correoElectronico"], $rs[0]["contrasenna"], $rs[0]["tipousuario"], $rs[0]["codigoCookie"]);
        } else {
            return null;
        }
    }

    public static function clienteGuardarCodigoCookie(string $email, string $codigoCookie)
    {
        if ($codigoCookie != null) {
            self::ejecutarActualizacion("UPDATE usuarios SET codigoCookie=? WHERE correoElectronico=?", [$codigoCookie, $email]);
        } else {
            self::ejecutarActualizacion("UPDATE usuarios SET codigoCookie=NULL WHERE correoElectronico=?", [$email]);

        }

    }

    public static function clienteObtenerPorEmailYCokie($email, $cookie)
    {
        $rs = self::ejecutarConsulta("select * from usuarios where correoElectronico=? and codigoCookie=?", [$email, $cookie]);
        return self::crearClienteDesdeRs($rs);
    }

    public static function clienteAgregarBD($nombre,$usuario,$contrasenna,$email){
         self::ejecutarConsulta("INSERT INTO usuarios ( nombre, usuario,contrasenna, correoElectronico) VALUES ( ?, ?, ?,?);",[$nombre,$usuario,$contrasenna,$email]);

    }

    /* Juego */

    public static function JuegoObtenerPorId(int $id)
    {
        $rs = self::ejecutarConsulta("SELECT * FROM juegos WHERE id=?", [$id]);
        $juego = new Juego($rs[0]["id"], $rs[0]["nombre"], $rs[0]["descripcion"], $rs[0]["link"], $rs[0]["img"]);
        return $juego;
    }

    public static function juegosObtenerTodos(): array
    {
        $datos = [];
        $rs = self::ejecutarConsulta("SELECT * FROM juegos ORDER BY nombre", []);

        foreach ($rs as $fila) {
            $producto = new Juego($fila["id"], $fila["nombre"],$fila["descripcion"], $rs[0]["link"], $rs[0]["imagen"]);
            array_push($datos, $producto);
        }
        return $datos;
    }

    public static function agregarProducto($nombre, $descripcion, $link, $img)
    {
        self::ejecutarActualizacion("INSERT INTO juegos (id, nombre,descripcion, link, img) VALUES (NULL, ?, ?, ?,?);",
            [$nombre, $descripcion, $link, $img]);
    }

    public static function productoActualizar(int $id, string $nuevoNombre, string $nuevaDescripcion, string $nuevoLink, string $nuevoImg)
    {

        self::ejecutarActualizacion("UPDATE juegos SET nombre = ?, descripcion = ?, link =? ,img=? WHERE id=?",
            [$nuevoNombre, $nuevaDescripcion, $nuevoLink, $nuevoImg, $id]);
    }


}