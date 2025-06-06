<?php

require('comun.inc.php');

$conn = db_open();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Es para recuperar datos del formulario
    $rol['id'] = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
	$rol['nombre_rol'] = isset($_REQUEST['nombre_rol']) ? $_REQUEST['nombre_rol'] : null;


    // Si es un nuevo usuario, insertamos, si es un usuario existente, actualizamos
	if ($rol['id'] == null) {
    $id = db_insert($conn, 'roles', $rol);
	} else {
		db_update($conn, 'roles', $rol);
		$id = $rol['id'];
	}

    $conn = db_close($conn);
    header('Location: roles.php?editar=' . $id);
	} else {
    // Es para borrar
    if (isset($_REQUEST['borrar']) and intval($_REQUEST['borrar'])) {
        db_delete_by_id($conn, 'roles', $_REQUEST['borrar']);
    }
    // Es para editar
    else if (isset($_REQUEST['editar']) and intval($_REQUEST['editar'])) {
        $id = intval($_REQUEST['editar']);
        // Es para cargar el rol con el id
        $res = db_query($conn, "SELECT * FROM roles WHERE id=?", [$id]);

        if (count($res) == 1) {
            $rol = $res[0];
        }
    }
}

// Es para obtener todos los roles con paginación
$por_pagina = 4;
$pagina_actual = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;

$total = db_query($conn, "SELECT COUNT(*) as total FROM roles")[0]['total'];
$paginas = ceil($total / $por_pagina);

$offset = ($pagina_actual - 1) * $por_pagina;

// Es para obtener los roles de la base de datos con la paginación
$roles = db_query($conn, "SELECT * FROM roles LIMIT ? OFFSET ?", [$por_pagina, $offset]);

$conn = db_close($conn);

$titulo = "Gestión de roles";
$vista = 'roles';
require("vistas/plantilla.html.php");
?>
