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
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" >
    <script src="js/bootstrap.min.js" ></script>

</head>

<body>
<div class="container">
    <div class="jumbotron">

        <h1>Felicidades <?php echo $cliente->getNombre(); ?> por activar tu ceunta en MINIGAMES</h1>

        <br />
        <p><a class="btn btn-primary btn-lg" href="sesion-inicio.php" role="button">Iniciar Sesi&oacute;n</a></p>
    </div>
</div>
</body>
</html>