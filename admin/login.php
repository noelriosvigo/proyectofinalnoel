<?php
session_start();

require('../config.php');
require('../librerias/db_mysql.php');

if (isset($_SESSION['usuario'])) {
    // Es para comprobar si el usuario tiene el rol de administrador
    if ($_SESSION['usuario']['nombre_rol'] == 'Administrador') {
        // Si es administrador, redirigimos al dashboard o panel de control
        header('Location: ../admin/login.php');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    $conn = db_open();
    if (!$conn) {
        $_SESSION['error'] = 'Error de conexión con la base de datos.';
        header('Location: login.php');
        exit;
    }

    $res = db_query($conn, "SELECT * FROM usuarios WHERE email = ?", [$email]);

    if ($res && count($res) == 1) {
        $usuario = $res[0];

        // Es para verificar la contraseña con password_verify
        if (password_verify($password, $usuario['password'])) {
            $_SESSION['usuario'] = $usuario;

            // Es para redirigir según el rol
            if (strtolower($usuario['nombre_rol']) === 'administrador') {
                header('Location: ../admin/dashboard.php');
            } else {
                header('Location: ../index.php');
            }
            db_close($conn);
            exit;
        } else {
            $_SESSION['error'] = 'Contraseña incorrecta';
        }
    } else {
        $_SESSION['error'] = 'No existe un usuario con ese email';
    }

    db_close($conn);
}

require('vistas/login.html.php');
