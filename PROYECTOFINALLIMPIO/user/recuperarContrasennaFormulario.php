<?php
if(isset($_REQUEST['id'])){
    $id=$_REQUEST['id'];
}
?>
<html>
<head>
    <title>Recuperar Password</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" >
    <script src="js/bootstrap.min.js" ></script>

</head>

<body>

<div class="container">

    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Recuperar Password</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="../../sesion-inicio.php">Iniciar Sesi&oacute;n</a></div>
            </div>

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form id="loginform" class="form-horizontal" role="form" action="gestionarRecuperarContrasenna.php" method="GET" autocomplete="off">

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="contrasenna" type="password" class="form-control" name="contrasenna" placeholder="password" required>
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <input id="id" type="hidden" class="form-control" name="id" value="<?=$id?>">
                    </div>


                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <button id="btn-login" type="submit" class="btn btn-success">Enviar</a></button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                No tiene una cuenta! <a href="registrarUsuario.php">Registrate aquí</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>