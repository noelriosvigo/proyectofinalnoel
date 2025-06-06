<!doctype html>
<html lang="es" data-bs-theme="auto">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Noel Rios">
	<meta name="generator" content="Hugo 0.122.0">
	<title><?php echo isset($titulo) ? $titulo : '' ?></title>
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="imagenes/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="imagenes/favicon-16x16.png">
	<link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="vistas/estilos/fff.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/626004e13f.js" crossorigin="anonymous"></script>
</head>
<body>
	<?php include "menu.html.php"; ?>
	<main class="container main-container">
	<?php include $vista . ".html.php" ?>
	</main>
	<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
