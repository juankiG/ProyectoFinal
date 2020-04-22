<?php

require_once "dao.php";
require_once "clases.php";
require_once "utilidades.php";

function sessionStartSiNoLoEsta()
{
    if(!isset($_SESSION)) {
        session_start();
    }
}

// Comprueba si hay sesión-usuario iniciada en la sesión-RAM.
function haySesionIniciada()
{
    sessionStartSiNoLoEsta();
    return isset($_SESSION['sesionIniciada']);
}

function vieneFormularioDeInicioDeSesion()
{
    return isset($_REQUEST['nombreUsuario']);
}

function vieneCookieRecuerdame()
{
    return isset($_COOKIE["nombreUsuario"]);
}

function comprobarCookieRecurdame()
{
    if(vieneCookieRecuerdame()){
        $usuario = DAO::usuarioObtenerPorUsuarioYCodigoCookie($_COOKIE["nombreUsuario"], $_COOKIE["codigoCookie"]); // TODO Hacer esto con DAO.

        if ($usuario) { // Si viene un usuario es que existe el usuario y coincide el código cookie. Daremos por iniciada la sesión.
            // Recuperar los datos adicionales del usuario que acaba de iniciar sesión.
            anotarDatosSesionRam($usuario);

            // Renovar la cookie (código y caducidad).
            generarCookieRecuerdame($usuario->getNombreUsuario());
            return true;
        }
    }

    return false;


}

function garantizarSesion()
{
    sessionStartSiNoLoEsta();

    if (haySesionIniciada()) {
        // Si hay cookie de "recuérdame", la renovamos.

        if (vieneCookieRecuerdame()) {
            establecerCookieRecuerdame($_COOKIE["nombreUsuario"], $_COOKIE["codigoCookie"]);


        }
        // >>> NO HACEMOS NADA MÁS. DEJAMOS QUE SE CONTINÚE EJECUTANDO EL PHP QUE NOS LLAMÓ... >>>
    } else { // NO hay sesión iniciada.

        if (vieneFormularioDeInicioDeSesion()) { // SÍ hay formulario enviado. Lo comprobaremos contra la BD.

            $usuario = DAO::usuarioObtenerPorUsuarioYContrasenna($_REQUEST['nombreUsuario'], $_REQUEST['contrasenna']);
            if( $usuario->getToken()==NULL){
                redireccionar("../user/sesion-inicio.php?noToken=true");
            }
            if ($usuario) { // Si viene un usuario es que el inicio de sesión ha sido exitoso.
                anotarDatosSesionRam($usuario);

                if (isset($_REQUEST["recuerdame"])) { // Si han marcado el checkbox de recordar
                    $usuario = DAO::usuarioObtenerPorUsuarioYContrasenna($_REQUEST['nombreUsuario'], $_REQUEST['contrasenna']);
                    generarCookieRecuerdame($usuario->getNombreUsuario());
                }
                // >>> Y DEJAMOS QUE SE CONTINÚE EJECUTANDO EL PHP QUE NOS LLAMÓ... >>>
            } else { // Si usuario es null, o no existe ese usuario o la contraseña no coincide.
                redireccionar("../user/sesion-inicio.php?incorrecto=true");
            }
        } else if (vieneCookieRecuerdame()) {
            $usuario = DAO::usuarioObtenerPorUsuarioYCodigoCookie($_COOKIE["nombreUsuario"], $_COOKIE["codigoCookie"]); // TODO Hacer esto con DAO.

            if ($usuario) { // Si viene un usuario es que existe el usuario y coincide el código cookie. Daremos por iniciada la sesión.
                // Recuperar los datos adicionales del usuario que acaba de iniciar sesión.
                anotarDatosSesionRam($usuario);

                // Renovar la cookie (código y caducidad).
                generarCookieRecuerdame($usuario->getNombreUsuario());
            } else { // Parecía que venía una cookie válida pero... No es válida o pasa algo raro.
                // Borrar la cookie mala que nos están enviando (si no, la enviarán otra vez, y otra, y otra...)
                borrarCookieRecuerdame($usuario->getNombreUsuario());

                // REDIRIGIR A INICIAR SESIÓN PARA IMPEDIR QUE ESTE USUARIO VISUALICE CONTENIDO PRIVADO.
                redireccionar("../user/sesion-inicio.php");
            }
        } else { // NO hay ni sesión, ni cookie, ni formulario enviado.
            // REDIRIGIMOS PARA QUE NO SE VISUALICE CONTENIDO PRIVADO:
            redireccionar("../user/sesion-inicio.php");
        }
    }
}

function establecerCookieRecuerdame($nombreUsuario, $codigoCookie)
{
    // Enviamos el código cookie al cliente, junto con su identificador.
    setcookie("nombreUsuario", $nombreUsuario, time() + 24*60*60); // Un mes sería: +30*24*60*60
    setcookie("codigoCookie", $codigoCookie, time() + 24*60*60); // Un mes sería: +30*24*60*60
}


function generarCookieRecuerdame($nombreUsuario)
{
    // Creamos un código cookie muy complejo (no necesariamente único).
    $codigoCookie = generarCadenaAleatoria(32); // Random...

    DAO::usuarioGuardarCodigoCookie($nombreUsuario, $codigoCookie);

    // TODO Para una seguridad óptima convendriá anotar en la BD la fecha de caducidad de la cookie y no aceptar ninguna cookie pasada dicha fecha.

    establecerCookieRecuerdame($nombreUsuario, $codigoCookie);
}


function generarToken($nombreUsuario)
{
    // Creamos un código cookie muy complejo (no necesariamente único).
    $token = generarCadenaAleatoria(32); // Random...

    DAO::usuarioGuardarToken($nombreUsuario, $token);

}

function borrarCookieRecuerdame($nombreUsuario)
{
    // Eliminamos el código cookie de nuestra BD.
    DAO::usuarioGuardarCodigoCookie($nombreUsuario, "");
    setcookie("nombreUsuario", "", time() - 3600); // Tiempo en el pasado, para (pedir) borrar la cookie.
    setcookie("codigoCookie", "", time() - 3600); // Tiempo en el pasado, para (pedir) borrar la cookie.
}

function anotarDatosSesionRam($usuario)
{
    $_SESSION["sesionIniciada"] = "";
    $_SESSION["id"] = $usuario->getId();
    $_SESSION["email"] = $usuario->getEmail();
    $_SESSION["nombre"] = $usuario->getNombre();
    $_SESSION["nombreUsuario"] = $usuario->getNombreUsuario();
    // TODO: Para implementar una superclase Usuario para Cliente y Administrador, aquí habría que añadir algo como esto: $_SESSION["tipoUsuario"] = "ADM" / "CLI";
}

function destruirSesionYCookies($nombreUsuario)
{
    unset($_SESSION['sesionIniciada']);
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    unset($_SESSION['nombreUsuario']);
    unset($_SESSION['nombre']);
    session_destroy();

    borrarCookieRecuerdame($nombreUsuario);
}