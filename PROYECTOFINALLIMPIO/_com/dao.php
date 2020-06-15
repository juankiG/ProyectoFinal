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
        if ($rs){
            return self::crearUsuarioDesdeRs($rs);
        }
        else return null;
    }


    public static function usuarioObtenerPorUsuarioYContrasenna($nombreUsuario, $contrasenna): Usuario
    {
        $rs = self::ejecutarConsulta("SELECT * FROM usuarios WHERE nombreUsuario=? AND BINARY contrasenna=?",
            [$nombreUsuario, $contrasenna]);
        if ($rs) {

            return self::crearUsuarioDesdeRs($rs);
        } else {

            redireccionar("../user/sesion-inicio.php?invUsr=y");
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
    public static function usuarioObtenerPorNombreUsuario(string $nombreUsuario)
    {
        $rs = self::ejecutarConsulta("SELECT * FROM usuarios WHERE nombreUsuario=?", [$nombreUsuario]);
        if($rs){
            return self::crearUsuarioDesdeRs($rs);
        }else{
            return null;
        }

    }

    public static function usuarioObtenerIdPorEmail(string $email)
    {
        $rs = self::ejecutarConsulta("SELECT id FROM usuarios WHERE email=?", [$email]);
        if($rs){
            return $rs[0]['id'];
        }else{
            return 0;
        }

    }
    public static function usuariosObtener()
    {
        $juegos = [];
        $rs = self::ejecutarConsulta("SELECT * FROM usuarios where tipousuario=0", []);

        foreach ($rs as $fila) {
            $juego = new Usuario($fila["id"], $fila["nombre"], $fila["email"], $fila["contrasenna"],$fila["tipoUsuario"],$fila["nombreUsuario"],$fila["codigoCookie"],$fila["token"]);
            array_push($juegos, $juego);
        }
        return $juegos;

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
        $rs = self::ejecutarConsulta("SELECT nombreUsuario, recordUsuario FROM `recordusuario` INNER JOIN usuarios on idUsuario=id WHERE idJuego=? ORDER by recordusuario DESC LIMIT 5", [ $idJuego]);

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
        $usuarioExiste = self::usuarioObtenerIdPorNombreUsuario($nombreUsuario);
        if($usuarioExiste){
            redireccionar("../user/usuario_registrar.php?errUs=t");
        }
        $usuarioExiste = self::usuarioObtenerIdPorEmail($email);
        if($usuarioExiste){
            redireccionar("../user/usuario_registrar.php?errEm=t");
        }

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
        $rs = self::ejecutarConsulta("SELECT * FROM solicitudesamistad WHERE idUsuarioSolicitado=? AND estadoSolicitud=2", [$id]);

        return $rs;
    }

    public static function usuarioSolicitudesAceptadas(int $id)
    {
        $rs = self::ejecutarConsulta
        ("SELECT * FROM solicitudesamistad WHERE (idUsuarioSolicitado=? 
                OR idUsuarioEnviador=?) AND estadoSolicitud=1", [$id, $id]);

        return $rs;
    }

    public static function usuarioSolicitudesRechazadas(int $id)
    {
        $rs = self::ejecutarConsulta("SELECT * FROM solicitudesamistad WHERE idUsuarioSolicitado=? AND estadoSolicitud=0", [$id]);

        return $rs;
    }

    public static function usuarioEliminarSolicitud(int $idReceptor, int $idEnviador)
    {
        $rs = self::ejecutarConsulta
        ("DELETE FROM solicitudesamistad WHERE idUsuarioSolicitado=? AND idUsuarioEnviador=?",
            [$idReceptor, $idEnviador]);
        $rs = self::ejecutarConsulta
        ("DELETE FROM solicitudesamistad WHERE idUsuarioSolicitado=? AND idUsuarioEnviador=?",
            [$idEnviador, $idReceptor]);

    }
    public static function usuarioEliminar(int $id)
    {
        $rs = self::ejecutarConsulta
        ("DELETE FROM usuarios WHERE id=?",
            [$id]);


    }

    public static function usuarioAceptarSolicitud(int $idReceptor, int $idEnviador){
        $rs = self::ejecutarConsulta
        ("UPDATE solicitudesamistad SET estadoSolicitud=1 WHERE idUsuarioSolicitado=? AND idUsuarioEnviador=?",
            [$idReceptor, $idEnviador]);
    }

    public static function usuarioEnviarSolicitud(int $idReceptor, int $idEnviador){
        $rs = self::ejecutarConsulta
        ("INSERT INTO `solicitudesamistad`(`idUsuarioSolicitado`, `idUsuarioEnviador`, `estadoSolicitud`) VALUES (?,?,?)",
            [$idReceptor, $idEnviador, 2]);
    }

    public static function usuarioRechazarSolicitud(int $idReceptor, int $idEnviador){
        $rs = self::ejecutarConsulta
        ("UPDATE solicitudesamistad SET estadoSolicitud=0 WHERE idUsuarioSolicitado=? AND idUsuarioEnviador=?",
            [$idReceptor, $idEnviador]);
    }

    public static function comprobarRelacionAmistad(int $idUsuarioLoggeado, int $idUsuarioVisitado){

        $rsUsuarioLoggeado = self::ejecutarConsulta
        ("SELECT * FROM solicitudesamistad WHERE idUsuarioSolicitado=? AND idUsuarioEnviador=?",
            [$idUsuarioLoggeado, $idUsuarioVisitado]);
        $rsUsuarioVisitado = self::ejecutarConsulta
        ("SELECT * FROM solicitudesamistad WHERE idUsuarioSolicitado=? AND idUsuarioEnviador=?",
            [$idUsuarioVisitado, $idUsuarioLoggeado]);

        if(!$rsUsuarioLoggeado){
            if(!$rsUsuarioVisitado){
                return 'agregar';
            }else if($rsUsuarioVisitado[0]['estadoSolicitud']==1){
                return 'amigos';
            }else if($rsUsuarioVisitado[0]['estadoSolicitud']==0){
                return 'rechazadaPorUsuarioReceptor';
            }else if($rsUsuarioVisitado[0]['estadoSolicitud']==2){
                return 'pendientePorUsuarioReceptor';
            }

        }

        if(!$rsUsuarioVisitado){
            if(!$rsUsuarioLoggeado){
                return 'agregar';
            }else if($rsUsuarioLoggeado[0]['estadoSolicitud']==1){
                return 'amigos';
            }else if($rsUsuarioLoggeado[0]['estadoSolicitud']==0){
                return 'rechazadaPorUsuarioSesion';
            }else if($rsUsuarioLoggeado[0]['estadoSolicitud']==2){
                return 'pendientePorUsuarioSesion';
            }

        }
    }



    /* MENSAJE DEL CHAT GENERAL */
    public static function mensajesObtener(){
        $mensajes=[];
        $rs = self::ejecutarConsulta("  select *from chat order by id", []);

        foreach ($rs as $fila) {
            $juego = new Mensaje($fila["id"], $fila["idusuario"], $fila["mensaje"], $fila["fecha"]);
            array_push($mensajes, $juego);
        }
        return $mensajes;

    }

    public static function mensajeInsertar($nombreUSuario, $mensaje)
    {

        self::ejecutarConsulta("INSERT INTO chat ( idusuario, mensaje) VALUES (?, ?)", [$nombreUSuario, $mensaje]);

    }
   public static function formatearFecha( $fecha){
        return date('g:i a',strtotime($fecha));
                }


   /* CONVERSACIONES Y MENSAJES */

    public static function obtenerConversacionesUsuario($id){

        $rs = self::ejecutarConsulta("  SELECT * FROM conversaciones WHERE idUsuarioUno=? OR idUsuarioDos=?", [$id, $id]);

        return $rs;

    }

    public static function conversacionObtenerMensajes($idConversacion){

        $rs = self::ejecutarConsulta("  SELECT * FROM mensajes WHERE idConversacion=? ORDER BY fechaMensaje DESC", [$idConversacion]);

        return $rs;

    }



    public static function conversacionNuevoMensaje($idConversacion, $textoMensaje, $fechaMensaje){

        $rs = self::ejecutarConsulta
        ("  INSERT INTO mensajes(idConversacion,
                                      idAutorMensaje,
                                      textoMensaje,
                                      fechaMensaje) 
                 VALUES (?,?,?,?)", [$idConversacion, $_SESSION['id'], $textoMensaje, $fechaMensaje]);

        return $rs;

    }

    public static function conversacionVerOCrear($idUsuarioConversacion){

        $rsUno = self::ejecutarConsulta("SELECT * FROM conversaciones WHERE idUsuarioUno=? AND idUsuarioDos=?",
            [$_SESSION['id'], $idUsuarioConversacion]);

        if($rsUno){

            return $rsUno[0]['idConversacion'];
        }else{
            $rsDos = self::ejecutarConsulta("SELECT * FROM conversaciones WHERE idUsuarioUno=? AND idUsuarioDos=?",
                [$idUsuarioConversacion, $_SESSION['id']]);
            if($rsDos){
                return $rsDos[0]['idConversacion'];

            }else{
                self::ejecutarConsulta("INSERT INTO conversaciones(idUsuarioUno, idUsuarioDos) VALUES (?,?)",
                    [$_SESSION['id'], $idUsuarioConversacion]);
                $rsNuevaConversacion = self::ejecutarConsulta("SELECT * FROM conversaciones WHERE idUsuarioUno=? AND idUsuarioDos=?",
                    [$_SESSION['id'], $idUsuarioConversacion]);
                return $rsNuevaConversacion[0]['idConversacion'];
            }
        }

    }
}
