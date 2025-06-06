<?php

// Mostrar errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Es para incluir configuraciones y la conexión a la base de datos
require('comun.inc.php'); // Es para asegurarse de que este archivo está en la ruta correcta

$conn = db_open();

// Es para la gestión de las operaciones
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
    $titulo = $_REQUEST['titulo'];
    $contenido = $_REQUEST['contenido'];
    $categoria = $_REQUEST['categoria'];

    // Es para subir imagen
$imagen = null;
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
    $imagen = $id . '.jpg';  // Es la imagen que se guarda con el nombre del ID
    $ruta_imagen = "imagenes/consejos/$imagen";
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
        // Es la imagen subida correctamente
    } else {
        echo "Error al subir la imagen.";
    }
}

// Si es una edición de un consejo
if ($id) {
    $query = "UPDATE consejos SET titulo = ?, contenido = ?, categoria = ?, imagen = ? WHERE id = ?";
    db_query($conn, $query, [$titulo, $contenido, $categoria, $imagen, $id]);
} else {
    // Si es un nuevo consejo
    $query = "INSERT INTO consejos (titulo, contenido, categoria, imagen, fecha) VALUES (?, ?, ?, ?, NOW())";
    db_query($conn, $query, [$titulo, $contenido, $categoria, $imagen]);
}

    header("Location: consejos.php"); // Es para redirigir después de guardar
    exit;
}

// Es para borrar un consejo
if (isset($_REQUEST['borrar'])) {
    $id = $_REQUEST['borrar'];
    $query = "DELETE FROM consejos WHERE id = ?";
    db_query($conn, $query, [$id]);
    header("Location: consejos.php"); // Es para redirigir después de borrar
    exit;
}

// Es para cargar datos del consejo para editar
if (isset($_REQUEST['editar'])) {
    $id = $_REQUEST['editar'];
    $result = db_query($conn, "SELECT * FROM consejos WHERE id = ?", [$id]);
    if ($result && count($result) > 0) {
        $consejo = $result[0];
    }
}

// Es para obtener el total de consejos para la paginación
$total_registros_query = "SELECT COUNT(*) AS total FROM consejos";
$total_registros_result = db_query($conn, $total_registros_query);
$total = $total_registros_result[0]['total'];

// Es para obtener los consejos para la paginación
$por_pagina = 4;
$pagina_actual = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$offset = ($pagina_actual - 1) * $por_pagina;

$consejos = db_query($conn, "SELECT * FROM consejos ORDER BY fecha DESC LIMIT ? OFFSET ?", [$por_pagina, $offset]);

$paginas = ceil($total / $por_pagina);

db_close($conn);

$titulo = "Gestión de Consejos";
$vista = "consejos";
require('vistas/plantilla.html.php');
?>
