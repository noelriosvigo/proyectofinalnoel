<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm">
    <a href="index.php" class="navbar-brand fw-bold d-flex align-items-center m-2">
      <img src="admin/imagenes/logo.png" alt="Mi perfil" width="50" height="50" 
           class="me-2 rounded-circle border border-primary";>
      <span class="fs-5">Plataforma Web Exclusiva</span>
    </a>
	
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>

<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto align-items-center gap-2">
        <?php if (isset($_SESSION['usuario'])): ?>
            <?php if ($_SESSION['usuario']['nombre_rol'] === 'Usuario'): ?>
                <!-- Es el menú para Usuario -->
                <li class="nav-item"><a class="nav-link active" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="feed-RSS.php">RSS</a></li>
                <li class="nav-item"><a class="nav-link" href="consejos.php">Consejos</a></li>
                <li class="nav-item"><a class="nav-link" href="foros.php">Foro</a></li>
                <li class="nav-item"><a class="nav-link" href="nosotros.php">Nosotros</a></li>
                <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                <li class="nav-item"><a class="nav-link" href="modelo-coche.php">Modelo Coche</a></li>
                <li class="nav-item"><a class="nav-link" href="perfil.php">Perfil</a></li>
            <?php elseif ($_SESSION['usuario']['nombre_rol'] === 'Administrador'): ?>
                <!-- Es el menú para Administrador -->
                <li class="nav-item">
                    <a class="nav-link" href="admin/dashboard.php">
                        <i class="fa-solid fa-gear"></i>Panel de Control
                    </a>
                </li>
            <?php endif; ?>

            <!-- Es el separador visual -->
            <li class="nav-item d-none d-lg-block">|</li>

            <!-- Es para cerrar sesión -->
            <li class="nav-item">
                <a class="btn btn-outline-danger btn-sm" href="admin/logout.php">Cerrar sesión</a>
            </li>
        <?php else: ?>
            <!-- Es para los que no han iniciar sesión -->
            <li class="nav-item">
                <a class="btn btn-outline-primary btn-sm" href="admin/login.php">Iniciar sesión</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-primary btn-sm" href="admin/registro.php">Registrarse</a>
            </li>
        <?php endif; ?>

        <!-- Son los botones de modos -->
        <li class="nav-item d-flex align-items-center gap-1">
            <button id="lightBtn" class="btn btn-outline-secondary btn-sm" aria-label="Modo Claro" title="Modo Claro">
                <i class="fa-solid fa-sun"></i>
            </button>
            <button id="darkBtn" class="btn btn-dark btn-sm" aria-label="Modo Oscuro" title="Modo Oscuro">
                <i class="fa-solid fa-moon"></i>
            </button>
        </li>
    </ul>
</div>
</nav>
