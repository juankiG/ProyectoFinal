<?php
require_once "dao.php";
//getting image data
$product_image = $_FILES['imagen']['name'];
$product_image_tmp = $_FILES['imagen']['tmp_name'];

move_uploaded_file($product_image_tmp,"JuegoImagen/$product_image");


$product_link = $_FILES['link']['name'];
$product_link_tmp = $_FILES['link']['tmp_name'];
move_uploaded_file($product_link_tmp,"Juego/$product_link");
        DAO::ejecutarActualizacion("INSERT INTO `juegos`( `nombre`, `descripcion`, `link`, `imagen`) VALUES (?,?,?,?)",["juego","descripcion","./administrador/Juego/".$product_link,"./administrador/JuegoImagen/".$product_image]);
        header("./verimagen.php");


?>