<?php

// Mostrar errores (para depuración)
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('config.php');
require('librerias/db_mysql.php');

// Es para conectarte a la base de datos
$conn = db_open();

// Es para obtener el ID del consejo desde la URL
$id_consejo = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id_consejo > 0) {
    // Es para consultar y obtener los detalles del consejo en específico
    $query = "SELECT * FROM consejos WHERE id = ?";
    $resultado = db_query($conn, $query, [$id_consejo]);
    
    if (!empty($resultado)) {
        $consejo = $resultado[0];
        $titulo = $consejo['titulo']; // Usar el título del consejo como título de página
    } else {
        // Si no se encuentra el consejo, redirigir o mostrar mensaje
        header('Location: consejos.php');
        exit();
    }
} else {
    // Si no hay ID válido, redirigir a la lista de consejos
    header('Location: consejos.php');
    exit();
}

db_close($conn);

$vista = "detalle_consejo";
require('vistas/plantilla.html.php');