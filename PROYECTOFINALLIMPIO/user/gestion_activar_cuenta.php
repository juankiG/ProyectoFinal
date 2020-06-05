<?php
require_once "../_com/requireonces-comunes.php";


require_once "../_com/emailFuncion.php";


if(isset($_REQUEST["id"]))
{
    $idUsuario = $_REQUEST['id'];
}
$cliente= DAO::usuarioObtenerPorId($idUsuario);
generarToken($cliente->getNombreUsuario());
?>

<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" href="css/estilo_entre_pantallas.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<div class="info">
    <div class="logo">
        <a href=""><img src="IMG/logo.webp" alt=""></a>
    </div>
    <p style="font-size: 20px">¡! Felicidades <?php echo $cliente->getNombre(); ?> por activar tu cuenta en MINIJUEGOS !¡</p>
    <button><a href="sesion-inicio.php">Iniciar sesión</a></button>
</div>

</body>
</html>