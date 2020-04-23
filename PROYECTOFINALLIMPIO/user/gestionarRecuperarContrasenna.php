<?php
require_once "../_com/requireonces-comunes.php";
require_once "../_com/emailFuncion.php";
if(isset($_REQUEST['email'])){
    $email=$_REQUEST['email'];
    $cliente=DAO::usuarioObtenerPorCorreo($email);
}
if(isset($_REQUEST['id'])){
    $cliente=DAO::usuarioObtenerPorId($_REQUEST['id']);
}

if(isset($cliente)){
    if(isset($_REQUEST['contrasenna'])){
        DAO::usuarioCambiarContrasenna($_REQUEST['contrasenna'],$cliente->getEmail());
        redireccionar("sesion-inicio.php");
    }else{
        $nombre=$cliente->getNombre();
        $url="http://localhost/php/ProyectoFP/PROYECTOFINALLIMPIO/user/recuperarContrasennaFormulario.php?id=".$cliente->getId()."";
        $asunto = 'Recuperar Contraseña - Sistema de Usuarios';
        $cuerpo=  "Estimado $nombre <br /><br />Para continuar con la recuperacion de la contraseña haz click en el siguiente enlace <a href='$url'>Recuperar Contraseña</a>";

        enviarEmail($email,$nombre,$asunto,$cuerpo);
    }

}else{
    redireccionar("recuperarContrasennaUsuario.php?noEmail=true");
}