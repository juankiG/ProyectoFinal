<?php
 require_once "../_com/comunes-app.php";

?>
<div id="datos-chat">
    <?php

                $mensajes= DAO::mensajesObtener();

                foreach($mensajes as $fila){
                    $usuario= DAO::usuarioObtenerPorId($fila->getIdUsuario())
                    ?>
                    <table>
                        <tr>
                            <td style="color: aqua"><?php echo $usuario->getNombreUsuario()?></td>
                            <td><?php echo $fila->getMensaje()?></td>
                            <td style="float: right"><?php echo DAO::formatearFecha($fila->getFecha())?></td>
                        </tr>
                    </table>

               <?php }
                ?>


</div>
