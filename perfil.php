<?php
session_start();

// Mostrar errores (para depuración)
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('config.php');
require('librerias/db_mysql.php');

$conn = db_open();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Es para comprobar que el usuario esté logueado
    if (!isset($_SESSION['usuario']['id'])) {
        $_SESSION['error'] = "No estás logueado.";
        header("Location: login.php");
        exit;
    }

    $id = $_SESSION['usuario']['id'];
    $nombre = $_POST['nombre_usuario'];
    $email = $_POST['email'];

    $avatar_path = 'default-avatar.png';

    if (!empty($_FILES['avatar']['name'])) {
        $nombre_archivo = uniqid() . '_' . basename($_FILES['avatar']['name']);
        $ruta_destino = 'assets/images/usuarios/' . $nombre_archivo;

        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $ruta_destino)) {
            // Es para eliminar el avatar anterior si existe y no es el por defecto
            if ($avatar_path != 'default-avatar.png' && file_exists('assets/images/usuarios/'.$avatar_path)) {
                unlink('assets/images/usuarios/'.$avatar_path);
            }
            $avatar_path = $nombre_archivo;
        } else {
            $_SESSION['error'] = "Error al subir la imagen.";
            header("Location: perfil.php");
            exit;
        }
    }

    $stmt = $conn->prepare("UPDATE usuarios SET nombre_usuario = ?, email = ?, avatar_path = ? WHERE id = ?");
    $stmt->bind_param("sssi", $nombre, $email, $avatar_path, $id);

    if ($stmt->execute()) {
        $_SESSION['usuario']['nombre_usuario'] = $nombre;
        $_SESSION['usuario']['email'] = $email;
        $_SESSION['usuario']['avatar_path'] = $avatar_path;

        $_SESSION['success'] = "Perfil actualizado correctamente.";
    } else {
        $_SESSION['error'] = "Error al actualizar el perfil.";
    }

    header("Location: perfil.php");
    exit;
}

$conn->close();

$titulo = "Perfil";
$vista = "perfil";
require('vistas/plantilla.html.php');