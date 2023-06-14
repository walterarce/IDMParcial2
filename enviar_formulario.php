<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
    $enviado="enviado.html";
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'info@cosas3d.com';
    $mail->Password = 'prueba123A@';
    $mail->setFrom('info@cosas3d.com', 'Walter Arce DWN2AV');
    $mail->addAddress('walterarce@gmail.com', 'Walter Arce');
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'Contacto Eco Energia';
        $mail->isHTML(false);
        $mail->Body = <<<EOT
Email: {$_POST['email']}
Nombre: {$_POST['nombre']}
Mensaje: {$_POST['mensaje']}
Recibir Novedades: {$_POST['novedades']}
EOT;
        if (!$mail->send()) {
            $msg = 'Disculpas, el email no pudo enviarse';
        } else {
            $msg = 'Mensaje enviado! , gracias por contactarse con nosotros.';
            header("Location: $enviado");
        }
    } else {
        $msg = 'Share it with us!';
    }

?>
