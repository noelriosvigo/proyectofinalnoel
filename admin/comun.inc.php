<?php
session_start();


require('../config.php');
require('../librerias/db_mysql.php');

if (!isset($_SESSION['usuario'])) {
    header('Location: ../login.php');
    exit;
}

// Es para solo permitir si el rol es Administrador
if (strtolower($_SESSION['usuario']['nombre_rol']) !== 'administrador') {
    header('Location: ../index.php');
    exit;
}
