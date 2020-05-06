<?php
require_once "../_com/comunes-app.php";;
//getting image data
$product_image = $_FILES['imagen']['name'];
$product_image_tmp = $_FILES['imagen']['tmp_name'];
if(isset($_REQUEST["Nombrecarpeta"])){
    $directorio="../juegos/".$_REQUEST['Nombrecarpeta'];
    mkdir($directorio, 755);
}

move_uploaded_file($product_image_tmp,".././contenido/$product_image");
$juego=$_REQUEST['nombre'];
$descripcion=$_REQUEST['descripcion'];
$product_link = $_FILES['link']['name'];
$product_link_tmp = $_FILES['link']['tmp_name'];
move_uploaded_file($product_link_tmp,"$directorio/$product_link");
        DAO::juegoAgegarBD($juego,$descripcion,"../contenido/recursos/".$product_image,$product_link);
        redireccionar(".././user/usuarioPantallaPrincipal.php");




?>