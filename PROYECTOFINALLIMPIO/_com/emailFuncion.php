<?php
function enviarEmail($email, $nombre, $asunto, $cuerpo)
{

    require '../user/PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';//Modificar
    $mail->Host = 'smtp.gmail.com';//Modificar
    $mail->Port = '587';//Modificar
    $mail->Username = 'ciclosuperiorjuanki@gmail.com'; //Modificar
    $mail->Password = 'Juanki100398'; //Modificar
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ));

    $mail->setFrom('ciclosuperiorjuanki@gmail.com', 'MINIGAMES');//Modificar

    $mail->addAddress($email, $nombre);

    $mail->Subject = $asunto;
    $mail->Body = $cuerpo;
    $mail->IsHTML(true);
    if ($mail->send()) {
        echo "Para terminar el proceso siga las instrucciones que le hemos enviado la direccion de correo electronico: $email";
        echo "<br><a href='../user/sesion-inicio.php' >Iniciar Sesion</a>";
    } else {

    }
}

?>