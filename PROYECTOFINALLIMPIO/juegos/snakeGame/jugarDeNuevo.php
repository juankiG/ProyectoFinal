<?php
if(isset($_REQUEST['record'])){
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">
    <title>Jugar de nuevo?</title>

</head>

<body>
 <h1>Has perdido, pero has conseguido un nuevo record de: <?=$_REQUEST['record']?></h1>
 <form action="index.php" method="POST">
     <input type="hidden" name="juego" value="snake">
     <input type="submit" name="jugar" value="jugar de nuevo!">
 </form>
</body>
</html>
    <?php
}else{


?>

    <!doctype html>

    <html lang="en">
    <head>
        <meta charset="utf-8">

        <title>The HTML5 Herald</title>
        <meta name="description" content="The HTML5 Herald">
        <meta name="author" content="SitePoint">
        <title>Jugar de nuevo?</title>

    </head>

    <body>
    <h1>Has perdido, no batiste tu anterior record</h1>
    <form action="index.php" method="POST">
        <input type="hidden" name="juego" value="snake">
        <input type="submit" name="jugar" value="jugar de nuevo!">
    </form>
    <a href="../../user/usuarioPantallaPrincipal.php">Volver a la pantalla principal</a>
    </body>
    </html>

    <?php
}
?>
