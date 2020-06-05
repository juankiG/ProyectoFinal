<?php



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
<p style="display: flex;
            width:100%;
            padding: 10px;
            font-size: 14px;
            color: #ffb516;
            font-family: 'Anton', sans-serif;
            letter-spacing: .8px;
            margin: 0;
            justify-content: center;
            align-items: center;">Descripción <?php echo $juego->getNombre()?> </p>
<p><?php echo $juego->getDescripcion()?></p>
</body>
</html>
