<?php
require_once "Juego.php";

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
        return new Cliente($rs[0]["id"], $rs[0]["email"], $rs[0]["contrasenna"], $rs[0]["codigoCookie"],
            $rs[0]["nombre"], $rs[0]["telefono"], $rs[0]["direccion"]);
    }

    public static function clienteObtenerPorId(int $id): Cliente
    {
        $rs = self::ejecutarConsulta("SELECT * FROM cliente WHERE id=?", [$id]);
        return self::crearClienteDesdeRs($rs);
    }

    public static function clienteObtenerPorEmailYContrasenna($email, $contrasenna): Cliente
    {
        $rs = self::ejecutarConsulta("SELECT * FROM cliente WHERE BINARY email=? AND BINARY contrasenna=?",
            [$email, $contrasenna]);
        if ($rs) {
            return new Cliente($rs[0]["id"], $rs[0]["email"], $rs[0]["contrasenna"], $rs[0]["codigoCookie"], $rs[0]["nombre"], $rs[0]["telefono"], $rs[0]["direccion"]);
        } else {
            return null;
        }
    }

    public static function clienteGuardarCodigoCookie(string $email, string $codigoCookie)
    {
        if ($codigoCookie != null)
        {
            self::ejecutarActualizacion("UPDATE cliente SET codigoCookie=? WHERE email=?", [$codigoCookie, $email]);
        } else {
            self::ejecutarActualizacion("UPDATE cliente SET codigoCookie=NULL WHERE email=?", [$email]);

        }

    }
    public static function clienteObtenerPorEmailYCokie($email, $cookie){
        $rs= self::ejecutarConsulta("select * from cliente where email=? and codigoCookie=?",[$email,$cookie]);
        return self::crearClienteDesdeRs($rs);
    }

    public static function clienteActualizarDireccion($direccion): void
    {
        self::ejecutarActualizacion(
            "UPDATE cliente SET direccion=? WHERE id=?",
            [$direccion, $_SESSION["id"]]
        );
    }



    /* Juego */

    public static function juegoObtenerPorId(int $id)
    {
        $rs = self::ejecutarConsulta("SELECT * FROM producto WHERE id=?", [$id]);
        $juegos = new juegos($rs[0]["id"], $rs[0]["nombre"], $rs[0]["descripcion"], $rs[0]["link"],$rs[0]["imagen"]);
        return $juegos;
    }

    public static function juegosObtenerTodos(): array
    {
        $datos = [];
        $rs = self::ejecutarConsulta("SELECT * FROM juegos ORDER BY nombre", []);

        foreach ($rs as $fila) {
            $juegos = new Juego($fila["id"], $fila["nombre"], $fila["descripcion"], $fila["link"],$fila["imagen"]);
            array_push($datos, $juegos);
        }
        return $datos;
    }












}