<?php

// Mostrar errores (para depuración)
error_reporting(E_ALL);
ini_set('display_errors', 1);


require('config.php');
require('librerias/db_mysql.php');

$conn = db_open();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Es para recuperar los datos del formulario
    $foro['id'] = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
	$foro['autor'] = isset($_POST['autor']) ? $_POST['autor'] : null;
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
    };
};

$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

$por_pagina = 3;
$pagina_actual = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;
$offset = ($pagina_actual - 1) * $por_pagina;

// Es para consultar usuarios eliminados
$total_result = db_query(
    $conn,
    "SELECT COUNT(*) as total FROM foros f
     LEFT JOIN usuarios u ON f.autor = u.email
     WHERE (? = '' OR f.comentarios LIKE ?)",
    ['', '%' . $busqueda . '%']
);
$total = $total_result[0]['total'];
$paginas = ceil($total / $por_pagina);

$foros = db_query(
    $conn,
    "SELECT f.*, 
            COALESCE(u.avatar_path, 'default-avatar.png') as avatar_path,
            COALESCE(u.email, f.autor) as email
     FROM foros f
     LEFT JOIN usuarios u ON f.autor = u.email
     WHERE (? = '' OR f.comentarios LIKE ?)
     ORDER BY f.fecha DESC
     LIMIT ? OFFSET ?",
    ['', '%' . $busqueda . '%', $por_pagina, $offset]
);

$conn = db_close($conn);

$titulo = "Foro";
$vista = "foros";
require('vistas/plantilla.html.php');
