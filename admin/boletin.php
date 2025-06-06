<?php
require('comun.inc.php');

// Es la ruta del archivo
$archivo = 'vistas/emails.txt';
$emails = [];

// Es para eliminar email si se recibe por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])) {
    $index = (int) $_POST['eliminar'];
    if (file_exists($archivo)) {
        $lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (isset($lineas[$index])) {
            unset($lineas[$index]);
            file_put_contents($archivo, implode(PHP_EOL, $lineas) . PHP_EOL);
        }
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Es para obtener emails para mostrar
if (file_exists($archivo)) {
    $emails = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

$titulo = "Cuentas almacenadas del Boletín de suscripción";
$vista = 'boletin';
require("vistas/plantilla.html.php");