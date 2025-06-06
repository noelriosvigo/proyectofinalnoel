<!-- Página de Panel de control -->
<header>
    <h1 class="dashboard-title">Bienvenido al Panel de Administración</h1>
    <p class="dashboard-subtitle">Desde aquí puedes gestionar todas las funcionalidades de tu sitio web de forma centralizada.</p>
    <div class="last-login">
        <i class="fas fa-clock"></i> Último acceso: <?php echo date('d-m-Y H:i'); ?>
    </div>
</header>

<div class="stats">
    <a href="boletin.php" class="stat-card" aria-label="Gestión de boletín">
		<p>
			<i class="fas fa-envelope"></i>
			<h3 class="btn btn-primary"; >Boletín de suscripción</h3>
			<p>Consulta y elimina las direcciones de correo de los usuarios suscritos al boletín informativo del sitio.</p>
			<span class="card-notification">Actualización disponible</span>
		</p>
    </a>
        
    <a href="minijuego.php" class="stat-card" aria-label="Acceder al MiniJuego">
		<p>
			<i class="fas fa-gamepad"></i>
			<h3 class="btn btn-primary">MiniJuego</h3>
			<p>Juega el mini-juego y adivina el número</p>
		</p>
    </a>
    
    <a href="usuarios.php" class="stat-card" aria-label="Gestión de Usuarios">
        <p>
			<i class="fas fa-users"></i>
			<h3 class="btn btn-primary">Gestión de Usuarios</h3>
			<p>Administra los usuarios registrados en el sistema</p>
		</p>
    </a>
    
    <a href="consejos.php" class="stat-card" aria-label="Gestión de Consejos">
        <p>
			<i class="fas fa-lightbulb"></i><br>
			<h3 class="btn btn-primary">Gestión de Consejos</h3>
			<p>Publica y Gestiona los consejos</p>
		</p>
    </a>
    
    <a href="foros.php" class="stat-card" aria-label="Gestión de Comentarios">
        <p>
			<i class="fas fa-comments"></i><br>
			<h3 class="btn btn-primary">Gestión de Comentarios</h3>
			<p>Administra los foros de la comunidad</p>
			<span class="card-notification">Actualización disponible</span>
		</p>
    </a>
</div>