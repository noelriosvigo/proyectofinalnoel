<?php
session_start();

require('comun.inc.php');  // Asegúrate de que este archivo incluya las funciones necesarias

if (isset($_SESSION['usuario'])) {
    if (strtolower($_SESSION['usuario']['nombre_rol']) === 'administrador') {
        header('Location: dashboard.php');
    } else {
        header('Location: ../index.php');
    }
    exit;
} else {
    header('Location: login.php');
    exit;
}
