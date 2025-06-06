<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Es para captura y limpiar los datos del formulario
$nombre = trim($_POST['nombre'] ?? '');
$email = trim($_POST['email'] ?? '');
$mensaje = trim($_POST['mensaje'] ?? '');

// Es para las validaciones
$errors = [];

if (empty($nombre) || !preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{2,50}$/', $nombre)) {
    $errors[] = "El nombre debe tener entre 2 y 50 letras y espacios";
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Por favor ingrese un email válido (destinatario)";
}

if (empty($mensaje) || strlen($mensaje) < 10) {
    $errors[] = "El mensaje debe tener al menos 10 caracteres";
}

if (!empty($errors)) {
    $_SESSION['error'] = implode("<br>", $errors);
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

// Es para envío de correo
$mail = new PHPMailer(true);

try {
    // Es para configurar SMTP con gmail en este caso
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'proyectofinalnoel@gmail.com'; // Tu cuenta Gmail
    $mail->Password   = 'ihmx pzmi cjsr bxuz';          // Tu App Password de Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('proyectofinalnoel@gmail.com', 'Formulario de Contacto');
    $mail->addAddress($email); // Es para enviar al correo que el usuario ingresó
    $mail->addReplyTo('proyectofinalnoel@gmail.com', 'No responder');

    // Es para el contenido del correo
    $mail->Subject = "Nuevo mensaje de $nombre desde el formulario";
    $mail->Body    = "Has recibido un mensaje desde el formulario de contacto:\n\n"
                   . "Nombre del remitente: $nombre\n"
                   . "Mensaje:\n$mensaje\n";

    $mail->send();
    $_SESSION['success'] = "El mensaje ha sido enviado correctamente a $email.";
} catch (Exception $e) {
    $_SESSION['error'] = "Hubo un error al enviar el mensaje: " . $mail->ErrorInfo;
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
