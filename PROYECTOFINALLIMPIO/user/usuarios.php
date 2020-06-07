<?php

session_start();
require_once "../_com/comunes-app.php";
$usuarios=DAO::usuariosObtener();
?>
<html>
<head>

    <title>Inicio</title>
</head>

<body>
<div >

    <div >
        <table>
            <tr>

                <th>Nombre</th>

                <th>Usuario</th>

                <th>Correo</th>
            </tr>

        <?php
        foreach ($usuarios as $usuario) {
            $id= $usuario->getId();
            $nombre = $usuario->getNombre();
            $nombreUsuario = $usuario->getNombreUsuario();
            $emailusuario= $usuario->getEmail();


            ?>



               <tr>
                   <td><?php echo $id?></td>
                   <td><?php echo$nombre?></td>

                   <td><?php echo $nombreUsuario?></td>

                   <td><?php echo $emailusuario?></td>
                   <td>                   <a href="eliminarUsuario.php?id=<?php echo $id?>">eliminar usuario</a>
                   </td>
               </tr>


            <?php
        }
        ?>
        </table>

    </div>
</body>
