<?php

// Mostrar errores (para depuración)
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('config.php');
require('librerias/db_mysql.php');

// Es para incluir configuraciones y la conexión a la base de datos
$conn = db_open();

$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

// Es para obtener el total de consejos para la paginación
$total_registros_query = "SELECT COUNT(*) AS total FROM consejos";
$total_registros_result = db_query($conn, $total_registros_query);
$total = $total_registros_result[0]['total']; // Número total de registros

// Es para la paginación de los consejos
$por_pagina = 3;
$pagina_actual = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$offset = ($pagina_actual - 1) * $por_pagina;

$consejos = db_query($conn, "SELECT * FROM consejos WHERE titulo LIKE ? OR contenido LIKE ? ORDER BY fecha DESC LIMIT ? OFFSET ?", ['%' . $busqueda . '%', '%' . $busqueda . '%', $por_pagina, $offset]);

$paginas = ceil($total / $por_pagina);

db_close($conn);

$titulo = "Consejos de Mantenimiento del Coche";
$vista = "consejos";
require('vistas/plantilla.html.php');
?>
