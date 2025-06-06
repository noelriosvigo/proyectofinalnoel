<!-- Página de consejos -->
<div class="container py-5">
	<div class="text-center mb-4">
		<img src="admin/imagenes/cabeceras/consejos.png" alt="Consejos" class="img-fluid section-padding mb-4">
	</div>
	
	<!-- Formulario de búsqueda -->
	<div class="busqueda-container">
		<form method="GET" action="consejos.php" class="busqueda-form">
			<div class="input-group">
				<input type="text" class="form-control" name="busqueda" placeholder="Buscar consejos..." value="<?= isset($_GET['busqueda']) ? $_GET['busqueda'] : '' ?>">
				<button class="btn btn-primary" type="submit">Buscar</button>
			</div>
		</form>
	</div>
	
	<div class="row mb-4">
		<?php if (!empty($consejos)): ?>
			<?php foreach ($consejos as $consejo): ?>
				<div class="col-lg-4 col-md-6 p-4">
					<div class="card shadow-sm h-100">
						<!-- Es para imagen del consejo -->
						<div class="card-img-top">
							<?php if (!empty($consejo['imagen'])): ?>
								<img src="admin/imagenes/consejos/<?php echo $consejo['imagen']; ?>"
									alt="<?php echo $consejo['titulo']; ?>"
									class="card-img-top img-fluid"
									style="height: 200px; object-fit: cover;">
							<?php else: ?>
								<img src="path_to_default_image.jpg" alt="Imagen no disponible"
									class="card-img-top img-fluid"
									style="height: 200px; object-fit: cover;">
							<?php endif; ?>
						</div>

						<!-- Es para contenido del consejo -->
						<div class="card-body">
							<h4 class="card-title"><?php echo $consejo['titulo']; ?></h4>
							<span class="badge bg-primary"> <?php echo $consejo['categoria']; ?></span>
							<p class="card-text">
								<?php 
								// Es para mostrar solo los primeros 60 caracteres
								$texto = strip_tags($consejo['contenido']);
								echo strlen($texto) > 60 ? substr($texto, 0, 60).'...' : $texto;
								?>
							</p>
						</div>
						<div class="card-footer bg-transparent border-top-0 pt-0">
							<div class="d-flex justify-content-between align-items-center">
								<div class="text-muted small">
									<i class="bi bi-calendar me-1"></i>
									<?= date("d/m/Y", strtotime($consejo['fecha'])) ?>
								</div>
								
								<a href="detalle_consejo.php?id=<?= $consejo['id'] ?>" class="btn btn-sm btn-outline-primary rounded-pill">
									Leer más <i class="bi bi-arrow-right ms-1"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php else: ?>
			<p class="text-center">No hay posts disponibles.</p>
		<?php endif; ?>
			
		<!-- Paginación -->
		<div class="d-flex justify-content-center mt-4">
			<?php include("paginacion.html.php"); ?>
		</div>
	</div>
</div>