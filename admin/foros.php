<?php

// Mostrar errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('comun.inc.php');

$conn = db_open();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Es para recuperar datos del formulario
    $foro['id'] = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
	$foro['autor'] = isset($_REQUEST['autor']) ? $_REQUEST['autor'] : null;
    $foro['comentarios'] = isset($_REQUEST['comentarios']) ? trim(strip_tags($_REQUEST['comentarios'])) : '';
    
    // Es para generar fecha del servidor si es nuevo
    if ($foro['id'] == null) {
        $foro['fecha'] = date('Y-m-d H:i:s');
    };

    // Es para insertar o actualizar
    if ($foro['id'] == null) {
        $id = db_insert($conn, 'foros', $foro);
    } else {
        db_update($conn, 'foros', $foro);
        $id = $foro['id'];
    }

    $conn = db_close($conn);
    header('Location: foros.php?editar=' . $id);
} else {
    // Es para borrar
    if (isset($_REQUEST['borrar']) and intval($_REQUEST['borrar'])) {
        db_delete_by_id($conn, 'foros', $_REQUEST['borrar']);
    }
    // Es para editar
    else if (isset($_REQUEST['editar']) and intval($_REQUEST['editar'])) {
        $id = intval($_REQUEST['editar']);
        // Cargar el foro con el id
        $res = db_query($conn, "SELECT * FROM foros WHERE id=?", [$id]);

        if (count($res) == 1) {
            $foro = $res[0];
        }
    }
}

// Es para obtener todos los foros con paginación
$por_pagina = 5;
$pagina_actual = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;

$total = db_query($conn, "SELECT COUNT(*) as total FROM foros")[0]['total'];

$paginas = ceil($total / $por_pagina);
$offset = ($pagina_actual - 1) * $por_pagina;

$foros = db_query($conn, "SELECT * FROM foros ORDER BY fecha DESC LIMIT ? OFFSET ?", [$por_pagina, $offset]);

$conn = db_close($conn);

$titulo = "Gestión de Comentarios";
$vista = 'foros'; // Corregido, antes decía 'roles'
require("vistas/plantilla.html.php");
