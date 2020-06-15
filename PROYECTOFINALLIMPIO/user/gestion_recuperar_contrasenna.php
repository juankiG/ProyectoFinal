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
        $url="http://192.168.1.107/php/ProyectoFP/PROYECTOFINALLIMPIO/user/usuario_nueva_contrasenna.php?id=".$cliente->getId()."";
        $asunto = 'Recuperar Contraseña - Sistema de Usuarios';
        $cuerpo=  "Estimado $nombre <br /><br />Para continuar con la recuperacion de la contraseña haz click en el siguiente enlace <a href='$url'>Recuperar Contraseña</a>";

        enviarEmail($email,$nombre,$asunto,$cuerpo);
    }

}else{
    redireccionar("usuario_recuperar_contrasenna.php?noEmail=true");
}
?>
<html>
<head>
    <link rel="stylesheet" href="css/estilo_entre_pantallas.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<div class="info">
    <div class="logo">
        <a href=""><img src="IMG/logo.webp" alt=""></a>
    </div>
    <p>Se le ha enviado un e-mail a su direccion de correo electrónico con los pasos a seguir para la recuperacin de su contraseña, verifique su bandeja de entrada.</p>
    <button><a href="sesion-inicio.php">Aceptar</a></button>
</div>

</body>
</html>
