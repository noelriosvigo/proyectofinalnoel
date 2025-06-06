<?php

// Mostrar errores (para depuración)
error_reporting(E_ALL);
ini_set('display_errors', 1);

$titulo = "ERROR 404";
$vista = '404';
require('vistas/plantilla.html.php');
