<!-- Página de Foro -->
<div class="container py-5">
    <div class="text-center mb-4">
        <img src="admin/imagenes/cabeceras/foro.png" alt="Foro" class="section-padding">
    </div>

    <!-- Es el formulario para añadir comentarios -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <form action="foros.php" method="post" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-light">
				<!-- Error -->
				<?php if (isset($_SESSION['error'])): ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $_SESSION['error'] ?>
					</div>
				<?php endif; ?>
                <!-- Es el autor visible (desactivado para mostrarlo al usuario) -->
				<div class="mb-3">
					<label for="autor_visible" class="form-label">Correo del Autor</label>
					<input id="autor_visible" class="form-control" type="text" value="<?php echo $_SESSION['usuario']['email']; ?>" disabled>
				</div>

				<!-- Es el autor real (oculto, se envía al servidor) -->
				<input type="hidden" name="autor" value="<?php echo $_SESSION['usuario']['email']; ?>">

                <!-- Es el comentario -->
                <div class="mb-3">
                    <label for="comentarios" class="form-label">Comentario</label>
                    <textarea id="comentarios" class="form-control" name="comentarios" rows="4" required></textarea>
                </div>

                <!-- El es botón para guardar -->
                <div class="text-end">
                    <input class="btn btn-success" type="submit" value="Publicar">
                </div>
            </form>
        </div>
    </div>
	
	<!-- Son los comentarios recientes -->
	<div class="container my-5">
		<h2 class="text-center mb-4">Comentarios Recientes</h2>

		<!-- Es el formulario de búsqueda -->
		<div class="row justify-content-center mb-5">
			<div class="col-md-8">
				<form method="GET" action="foros.php" class="d-flex">
					<input 
						type="text" 
						class="form-control me-2" 
						name="busqueda" 
						placeholder="Buscar consejos..." 
						value="<?php echo isset($_GET['busqueda']) ? $_GET['busqueda'] : ''; ?>">

					<button class="btn btn-primary" type="submit">Buscar</button>
				</form>
			</div>
		</div>

		<!-- Son los comentarios -->
		<div class="row">
			<?php if (!empty($foros)): ?>
				<?php foreach ($foros as $foro): ?>
					  <div class="col-12 mb-5 d-flex">
						<div class="card shadow-sm w-100">
							<div class="card-body">
								<!-- Es el autor y avatar -->
								<div class="d-flex align-items-center mb-3">
									<img 
										src="assets/images/usuarios/<?php echo !empty($foro['avatar_path']) ? $foro['avatar_path'] : 'default-avatar.png'; ?>" 
										alt="Avatar de <?php echo $foro['autor']; ?>" 
										class="rounded-circle me-3" 
										width="50" 
										height="50">
									<h6 class="mb-0 fw-semibold d-flex align-items-center">
										<i class="fas fa-user-circle me-2 text-primary"></i>
										<span><?php echo $foro['email']; ?></span>
									</h6>
								</div>

								<!-- Es el comentario -->
								<div class="comment-content mt-4 mb-3 position-relative">
								<div class="position-absolute top-0 start-0 h-100" style="width: 3px; background-color: #0d6efd; border-radius: 3px;"></div>
									<div class="ps-4">
										<h6 class="text-muted mb-2 fw-normal">COMENTARIO:</h6>
										<p class="card-text mb-0 text-break" style="line-height: 1.6;">
											<?php echo $foro['comentarios']; ?>
										</p>
									</div>
								</div>
							</div>

							<!-- Es el pie de tarjeta -->
							<div class="card-footer text-muted text-end small">
								<i class="far fa-calendar me-1"></i><?php echo date("d/m/Y", strtotime($foro['fecha'])); ?>
								<i class="far fa-clock me-1"></i><?php echo date("H:i", strtotime($foro['fecha'])); ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="col-12">
					<p class="text-center text-muted">No hay comentarios disponibles.</p>
				</div>
			<?php endif; ?>
		
		<!-- Paginación -->
		<div class="d-flex justify-content-center mt-4">
			<?php include("paginacion.html.php"); ?>
		</div>
	</div>
</div>
