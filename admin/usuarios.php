<?php

require('comun.inc.php');

$conn = db_open();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Es para recuperar datos del formulario
    $usuario['id'] = isset($_POST['id']) ? $_POST['id'] : null;
    $usuario['nombre_usuario'] = isset($_POST['nombre_usuario']) ? $_POST['nombre_usuario'] : null;
    $usuario['email'] = isset($_POST['email']) ? $_POST['email'] : null;
    $usuario['password'] = isset($_POST['password']) ? $_POST['password'] : null;
    $usuario['fecha_registro'] = date('Y-m-d H:i:s');
    $usuario['rol_id'] = isset($_POST['rol_id']) ? $_POST['rol_id'] : null;

    // Si es un nuevo usuario, insertamos, si es un usuario existente, actualizamos
    if ($usuario['id'] == null) {
        $id = db_insert($conn, 'usuarios', $usuario);
    } else {
        db_update($conn, 'usuarios', $usuario);
        $id = $usuario['id'];
    }

    $conn = db_close($conn);
    header('Location: usuarios.php?editar=' . $id);
} else {
    // Es para borrar
    if (isset($_REQUEST['borrar']) and intval($_REQUEST['borrar'])) {
        db_delete_by_id($conn, 'usuarios', $_REQUEST['borrar']);
    }
    // Es para editar
    else if (isset($_REQUEST['editar']) and intval($_REQUEST['editar'])) {
        $id = intval($_REQUEST['editar']);
        // Cargar el usuario con el id
        $res = db_query($conn, "SELECT * FROM usuarios WHERE id=?", [$id]);

        if (count($res) == 1) {
            $usuario = $res[0];
        }
    }
}

$por_pagina = 2;
$pagina_actual = isset($_GET['p']) ? max(1, intval($_GET['p'])) : 1;

$total = db_query($conn, "SELECT COUNT(*) as total FROM usuarios")[0]['total'];

$paginas = ceil($total / $por_pagina);
$offset = ($pagina_actual - 1) * $por_pagina;

$usuarios = db_query($conn, "
    SELECT usuarios.*, roles.nombre_rol AS nombre_rol
    FROM usuarios
    JOIN roles ON usuarios.rol_id = roles.id 
    LIMIT $por_pagina OFFSET $offset");

$conn = db_close($conn);

$titulo = "Gestión de usuarios";
$vista = 'usuarios';
require("vistas/plantilla.html.php");
