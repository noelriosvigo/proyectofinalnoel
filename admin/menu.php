<?php

// Mostrar errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('comun.inc.php');

$titulo = "Menu";
$vista = 'menu';
require("vistas/plantilla.html.php");