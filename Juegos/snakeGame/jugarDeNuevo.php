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
 <a href="index.php">Volver a jugar?</a>
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
    <a href="index.php">Volver a jugar?</a>
    </body>
    </html>

    <?php
}
?>
