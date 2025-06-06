<?php

// Mostrar errores (para depuración)
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Es para guardar el email en la carpeta que indiqué
        file_put_contents("admin/vistas/emails.txt", $email . PHP_EOL, FILE_APPEND);

        echo "<script>alert('¡Gracias por suscribirte!'); window.history.back();</script>";
    } else {
        echo "<script>alert('❌ Email inválido.'); window.history.back();</script>";
    }
}
?>
