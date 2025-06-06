<?php
session_start();

require('../config.php');
require('../librerias/db_mysql.php');

// Es para verificar si el usuario ya está logueado y redirigirlo
if (isset($_SESSION['usuario'])) {
    if ($_SESSION['usuario']['nombre_rol'] == 'Administrador') {
        header('Location: dashboard.php');
        exit;
    } else {
        header('Location: ../index.php');
        exit;
    }
}

// Es para verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {		$id = $_POST['id'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $confirm_password = $_POST['confirm_password'] ?? null;

    // Es para validar campos
    if (empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['error'] = 'Todos los campos son obligatorios';
        header('Location: registro.php');
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'El correo electrónico no es válido';
        header('Location: registro.php');
        exit;
    }

    if ($password !== $confirm_password) {
        $_SESSION['error'] = 'Las contraseñas no coinciden';
        header('Location: registro.php');
        exit;
    }

    // Es para cifrar la contraseña
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Es para conectar a la base de datos
    $conn = db_open();
    if (!$conn) {
        $_SESSION['error'] = 'No se pudo conectar a la base de datos.';
        header('Location: registro.php');
        exit;
    }

    // Es para comprobar si el correo ya existe
    $res = db_query($conn, "SELECT * FROM usuarios WHERE email = ?", [$email]);
	
    if (count($res) > 0) {
        $_SESSION['error'] = 'El correo electrónico ya está registrado';
        db_close($conn);
        header('Location: registro.php');
        exit;
    }

    // Es para insertar nuevo usuario
    $nombre_usuario = 'Usuario' . $id;
    $fecha_registro = date('Y-m-d H:i:s');
    $rol_id = 2;
    $nombre_rol = 'Usuario';
	$avatar_path = 'default-avatar.png';

    $insert_res = db_query(
    $conn,
    "INSERT INTO usuarios (nombre_usuario, email, password, fecha_registro, rol_id, nombre_rol, avatar_path) VALUES (?, ?, ?, ?, ?, ?, ?)",
    [$nombre_usuario, $email, $password_hash, $fecha_registro, $rol_id, $nombre_rol, $avatar_path]
	);
}

require('vistas/registro.html.php');
