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
        $bd = "proyectofinaldb"; // Schema
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

    public static function ejecutarConsulta(string $sql, array $parametros): array
    {
        if (!isset(self::$pdo)) self::$pdo = self::obtenerPdoConexionBd();

        $select = self::$pdo->prepare($sql);
        $select->execute($parametros);
        return $select->fetchAll();
    }

    private static function ejecutarActualizacion(string $sql, array $parametros): void
    {
        if (!isset(self::$pdo)) self::$pdo = self::obtenerPdoConexionBd();

        $actualizacion = self::$pdo->prepare($sql);
        $actualizacion->execute($parametros);
    }


    /* USUARIO */

    private static function crearUsuarioDesdeRs(array $rs): Usuario
    {
        return new Usuario($rs[0]["id"], $rs[0]["nombre"], $rs[0]["email"], $rs[0]["contrasenna"], $rs[0]["tipoUsuario"], $rs[0]["nombreUsuario"], $rs[0]["codigoCookie"],$rs[0]["token"]);
    }

    public static function usuarioObtenerPorId(int $id): Usuario
    {
        $rs = self::ejecutarConsulta("SELECT * FROM usuarios WHERE id=?", [$id]);
        if ($rs) return self::crearUsuarioDesdeRs($rs);
        else return null;
    }

    public static function usuarioObtenerPorUsuarioYContrasenna($nombreUsuario, $contrasenna): Usuario
    {
        $rs = self::ejecutarConsulta("SELECT * FROM usuarios WHERE nombreUsuario=? AND BINARY contrasenna=?",
            [$nombreUsuario, $contrasenna]);
        if ($rs) {

            return self::crearUsuarioDesdeRs($rs);
        } else {

            return null;
        }
    }


    public static function usuarioObtenerPorUsuarioYCodigoCookie($nombreUsuario, $codigoCookie): Usuario
    {
        $rs = self::ejecutarConsulta("SELECT * FROM usuarios WHERE nombreUsuario=? AND BINARY codigoCookie=?",
            [$nombreUsuario, $codigoCookie]);

        if ($rs) {
            return self::crearUsuarioDesdeRs($rs);
        } else {
            return null;
        }
    }
    public static function usuarioCambiarContrasenna($contrasenna, $email)
    {
         self::ejecutarActualizacion("UPDATE usuarios SET contrasenna=? WHERE email=?", [$contrasenna,$email ]);

    }
    public static function usuarioObtenerPorCorreo($correo): Usuario
    {
        $rs = self::ejecutarConsulta("SELECT * FROM usuarios WHERE email=?",
            [$correo]);

        if ($rs) {
            return self::crearUsuarioDesdeRs($rs);
        } else {
            return null;
        }
    }

    public static function usuarioGuardarCodigoCookie(string $nombreUsuario, string $codigoCookie)
    {
    //redireccionar($codigoCookie);
        if ($codigoCookie != "") {
            self::ejecutarActualizacion("UPDATE usuarios SET codigoCookie=? WHERE nombreUsuario=?", [$codigoCookie, $nombreUsuario]);
        } else {
            self::ejecutarActualizacion("UPDATE usuarios SET codigoCookie=NULL WHERE nombreUsuario=?", [$nombreUsuario]);
        }

    }
    public static function usuarioGuardarToken(string $nombreUsuario, string $token)
    {
        //redireccionar($codigoCookie);
        if ($token != "") {
            self::ejecutarActualizacion("UPDATE usuarios SET token=? WHERE nombreUsuario=?", [$token, $nombreUsuario]);
        } else {
            self::ejecutarActualizacion("UPDATE usuarios SET token=NULL WHERE nombreUsuario=?", [$nombreUsuario]);
        }

    }

    public static function usuarioObtenerIdPorNombreUsuario(string $nombreUsuario)
    {
        $rs = self::ejecutarConsulta("SELECT id FROM usuarios WHERE nombreUsuario=?", [$nombreUsuario]);
        if($rs){
            return $rs[0]['id'];
        }else{
            return 0;
        }

    }

    public static function usuarioObtenerRecord($idUsuario, $idJuego)
    {
        $rs = self::ejecutarConsulta("SELECT recordUsuario FROM recordusuario WHERE idUsuario=? AND idJuego=?", [$idUsuario, $idJuego]);
        if($rs){
            return $rs[0]['recordUsuario'];
        }else{
            $rs = self::ejecutarConsulta("INSERT INTO recordusuario (idJuego, idUsuario, recordUsuario) VALUES (?, ?, ?)", [$idJuego, $idUsuario, 0]);
            return 0;
        }

    }
    public static function usuariosObtenerRecord( $idJuego)
    {

        $records = [];
        $rs = self::ejecutarConsulta("SELECT nombreUsuario, recordUsuario FROM `recordusuario` INNER JOIN usuarios on idUsuario=id WHERE idJuego=? ORDER by recordusuario DESC", [ $idJuego]);

        foreach ($rs as $fila) {
            $record = new Record($fila["nombreUsuario"], $fila["recordUsuario"]);
            array_push($records, $record);
        }
        return $records;

    }

    public static function actualizarRecord($idUsuario, $idJuego, $nuevoRecord): void
    {
        self::ejecutarActualizacion(
            "UPDATE recordusuario SET recordUsuario=? WHERE idJuego=? AND idUsuario=?",
            [$nuevoRecord, $idJuego, $idUsuario]
        );

    }
    public static function clienteAgregarBD($nombre, $nombreUsuario, $contrasenna,$email): void
    {
        self::ejecutarActualizacion(
            "INSERT INTO `usuarios`( `nombre`, `email`, `contrasenna`, `tipoUsuario`, `nombreUsuario`) VALUES (?,?,?,?,?);",[$nombre, $email, $contrasenna,0,$nombreUsuario]
        );

    }

    /* JUEGO */

    private static function crearJuegoDesdeRs(array $rs): Juego
    {
        return new Juego($rs[0]["id"], $rs[0]["nombre"], $rs[0]["descripcion"], $rs[0]["linkImagen"]);
    }

    public static function juegoObtenerTodos(): array
    {
        $juegos = [];
        $rs = self::ejecutarConsulta("SELECT * FROM juegos ORDER BY nombre", []);

        foreach ($rs as $fila) {
            $juego = new Juego($fila["id"], $fila["nombre"], $fila["descripcion"], $fila["linkImagen"]);
            array_push($juegos, $juego);
        }
        return $juegos;
    }

    public static function juegoObtenerPorNombre(string $nombreUsuario)
    {
        $rs = self::ejecutarConsulta("SELECT * FROM juegos WHERE nombre=?", [$nombreUsuario]);
        if($rs){
            return self::crearJuegoDesdeRs($rs);
        }else{
            return null;
        }

    }
    public static function juegoObtenerPorID($idJuego)
    {
        $rs = self::ejecutarConsulta("SELECT * FROM juegos WHERE id=?", [$idJuego]);
        if($rs){
            return self::crearJuegoDesdeRs($rs);
        }else{
            return null;
        }

    }
    public static function juegoAgegarBD($juego,$descripcion,$product_link,$product_image)
    {
        self::ejecutarActualizacion("INSERT INTO `juegos`( `nombre`, `descripcion`, `linkImagen`, `imagen`) VALUES (?,?,?,?)",[$juego,$descripcion,$product_link,$product_image]);
    }

    /* SOLICITUDES AMISTAD */

    public static function usuarioSolicitudesPendientes(int $id)
    {
        $rs = self::ejecutarConsulta("SELECT * FROM solicitudesAmistad WHERE idUsuarioSolicitado=? AND estadoSolicitud IS NULL", [$id]);

        return $rs;
    }

    public static function usuarioSolicitudesAceptadas(int $id)
    {
        $rs = self::ejecutarConsulta("SELECT * FROM solicitudesAmistad WHERE idUsuarioSolicitado=? AND estadoSolicitud=1", [$id]);

        return $rs;
    }

    public static function usuarioSolicitudesRechazadas(int $id)
    {
        $rs = self::ejecutarConsulta("SELECT * FROM solicitudesAmistad WHERE idUsuarioSolicitado=? AND estadoSolicitud=0", [$id]);

        return $rs;
    }

    public static function usuarioEliminarSolicitud(int $idReceptor, int $idEnviador)
    {
        $rs = self::ejecutarConsulta
        ("DELETE FROM solicitudes WHERE idUsuarioSolicitado=? AND idUsuarioEnviador=?",
            [$idReceptor, $idEnviador]);

    }

    public static function usuarioAceptarSolicitud(int $idReceptor, int $idEnviador){
        $rs = self::ejecutarConsulta
        ("UPDATE solicitudesAmistad SET estadoSolicitud=1 WHERE idUsuarioSolicitado=? AND idUsuarioEnviador=?",
            [$idReceptor, $idEnviador]);
    }

    public static function usuarioRechazarSolicitud(int $idReceptor, int $idEnviador){
        $rs = self::ejecutarConsulta
        ("UPDATE solicitudesAmistad SET estadoSolicitud=0 WHERE idUsuarioSolicitado=? AND idUsuarioEnviador=?",
            [$idReceptor, $idEnviador]);
    }


}