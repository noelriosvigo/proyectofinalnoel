<?php
ini_set('display_errors', 'On');
ini_set('error_reporting', E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Datos de conexión para localhost (XAMPP)
define('DB_HOST', 'localhost'); // Servidor local
define('DB_USER', ''); // Usuario por defecto en XAMPP
define('DB_PASS', ''); // XAMPP no tiene contraseña por defecto
define('DB_NAME', ''); // Nombre de tu base de datos en XAMPP
define('DB_PORT', 3306); // Puerto por defecto de MySQL en XAMPP
?>
