<?php
require_once "../_com/comunes-app.php";

$rs= DAO::obtenerConversacionesUsuario($_SESSION['id']);

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

if(!$rs){
    echo("<p> No hay conversaciones aún </p>");
}
foreach ($rs as $fila) {
    if($fila['idUsuarioUno'] == $_SESSION['id']){
        $idUsuarioConversacion = $fila['idUsuarioDos'];
    }

    if($fila['idUsuarioDos'] == $_SESSION['id']){
    $idUsuarioConversacion = $fila['idUsuarioUno'];
    }

    $usuario = DAO::usuarioObtenerPorId($idUsuarioConversacion);
?>
<p> Conversación con <?=$usuario->getNombreUsuario()?>
    <a href="conversacionVerMensajes.php?idC=<?=$fila['idConversacion']?>&usrId=<?=$_SESSION['id']?>">Ver mensajes</a>
</p>
<?php
}
?>
<br>
<p>Escribir un nuevo mensaje para:<p>
    <form action="nuevoMensajePerfilGestionar.php">
    <input type="text" name="usrName" placeholder="Nombre de usuario">
    <input type="submit" value="Ver conversacion">
    </form>
<br>
<br>
<a href="../user/usuarioPantallaPrincipal.php">Volver a la página de inicio</a>



</body>
</html>