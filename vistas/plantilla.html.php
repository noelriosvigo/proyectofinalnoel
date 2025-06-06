<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="description" content="">
        <meta name="author" content="Noel">

        <title><?php echo $titulo; ?></title>
		
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="admin/imagenes/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="admin/imagenes/favicon-16x16.png">

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <link href="assets/css/bootstrap-icons.css" rel="stylesheet">

        <link href="assets/css/magnific-popup.css" rel="stylesheet">

        <link href="assets/css/templatemo-first-portfolio-style.css" rel="stylesheet">
		
		<link rel="stylesheet" href="assets/css/script.css">
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
		<script src="https://kit.fontawesome.com/626004e13f.js" crossorigin="anonymous"></script>

<!--

TemplateMo 578 First Portfolio

https://templatemo.com/tm-578-first-portfolio

--> 
	</head>
	
	<body>
	<?php include "header.html.php"; ?>
	<main>
	<?php include $vista . ".html.php"; ?>
	</main>
	<?php include "footer.html.php"; ?>
    

        <!-- JAVASCRIPT FILES -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/click-scroll.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/magnific-popup-options.js"></script>
        <script src="assets/js/custom.js"></script>
		<script src="assets/js/script.js"></script>
    </body>
</html>