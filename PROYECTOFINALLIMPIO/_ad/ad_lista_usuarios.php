<?php

session_start();
require_once "../_com/comunes-app.php";
$usuarios = DAO::usuariosObtener();
?>
<html>
<head>

    <title>Inicio | Usuarios</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">

    <style>
        html {
            width: 100%;
            height: 100%;
        }

        body {
            width: 100%;
            height: 100%;
            display: flex;
            flex-wrap: wrap;
            background-image: url("../user/IMG/image.jpg");
            background-size: cover;
            margin: 0;
            justify-content: center;
            align-items: center;
        }

        .lista {
            display: flex;
            width: 100%;
            height: 90%;
            justify-content: center;
            align-items: center;
        }

        table {
            width: 50%;
            height: 70%;
            overflow-y: scroll;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            background-color: rgba(36, 40, 59, 1);
            padding: 10px;
            border-collapse: collapse;
        }

        tbody {
            width: 100%;
            display: table;

        }

        table::-webkit-scrollbar {
            display: none;
        }


        th {
            font-family: 'Jost', sans-serif;
            color: white;
            padding: 5px;
            margin: 0;
            border: 0;
            text-align: center;
            border-bottom: 1px solid darkorange;
            position: sticky;
            margin-bottom: 5px;
        }

        td {
            padding: 5px;
            text-align: center;
            font-family: 'Jost', sans-serif;
            color: darkgray;
            border-bottom: 1px solid gray;
        }

        a {
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: darkorange;
            border-radius: 5px;
            color: white;
            font-size: 12px;
            padding: 5px;
            text-transform: capitalize;
        }

        .salir {
            width: 10%;
        }
    </style>
</head>

<body>


<div class="lista">
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>

            <th>Usuario</th>

            <th>Correo</th>
        </tr>

        <?php
        foreach ($usuarios as $usuario) {
            $id = $usuario->getId();
            $nombre = $usuario->getNombre();
            $nombreUsuario = $usuario->getNombreUsuario();
            $emailusuario = $usuario->getEmail();


            ?>


            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $nombre ?></td>

                <td><?php echo $nombreUsuario ?></td>

                <td><?php echo $emailusuario ?></td>
                <td><a href="../user/gestion_eliminar_usuario.php?id=<?php echo $id ?>">eliminar</a>
                </td>
            </tr>


            <?php
        }
        ?>
    </table>


</div>
<div class="salir">
    <a href="../user/index.php">salir</a>
</div>
</body>
