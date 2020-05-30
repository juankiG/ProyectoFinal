
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
            align-items: center;">Record <?php echo $juego->getNombre()?></p>
<table>
    <tr>
        <th>usuario </th>
        <th>record </th>

    </tr>

    <?php
    $record=  DAO::usuariosObtenerRecord($juego->getId());
    if($record){
        foreach ($record as $fila){?>
    <tr>
        <td><?php echo $fila->getNombre()?></td>
        <td><?php echo $fila->getRecord()?></td>
    </tr>

            <?php
        }
    }


    ?>

</table>
</body>
</html>
