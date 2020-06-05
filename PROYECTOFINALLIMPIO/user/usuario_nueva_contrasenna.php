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
    <link rel="stylesheet" href="css/estilo_inicio.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">

    <script src="js/bootstrap.min.js" ></script>

</head>

<body>

<div style="align-items: center" class="container">

    <div id="loginbox" style="margin-top:50px;height: 50%" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="logo">
                <a href=""><img src="IMG/logo.webp" alt=""></a>
            </div>

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form id="loginform" class="form-horizontal" role="form" action="gestion_recuperar_contrasenna.php" method="GET" autocomplete="off">
                    <p style="width: 100%;text-align: center">Introduce la nueva contraseña</p>
                    <div style="margin-bottom: 25px" class="input-group">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="contrasenna" type="password" class="form-control" name="contrasenna" placeholder="password" required>
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <input id="id" type="hidden" class="form-control" name="id" value="<?=$id?>">
                    </div>


                    <div style="margin-top:10px;justify-content: center;margin: 0" class="form-group">
                        <div class="col-sm-12 controls">
                            <button id="btn-login" type="submit" >Enviar</a></button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>