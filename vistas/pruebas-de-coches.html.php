<!-- Pagina de Pruebas de coches -->
<div class="container py-5">
  <div class="row">
    <!-- Es la columna lateral izquierda -->
    <nav class="col-md-3 mb-4">
		<div class="card">
			<div class="card-body">
				<!-- Son las preguntas frecuentes -->
				<div class="list-group mb-4">
					<a class="list-group-item list-group-item-action active" aria-current="true">Preguntas Frecuentes</a>
					<a href="que-coche-comprar.php" class="list-group-item list-group-item-action">¿Que coche comprar?</a>
					<a href="primera-prueba.php" class="list-group-item list-group-item-action">Primera prueba</a>
					<a href="pruebas-de-coches.php" class="list-group-item list-group-item-action">Pruebas de coches</a>
				</div>
				
				<!-- Apartado de te interesa -->
				<div class="mb-4">
					<h6 class="text-warning mt-2 ps-2"><i class="fas fa-star me-2"></i>Te interesa</h6>
					<ul class="list-unstyled ps-4">
						<li><a href="feed-RSS.php#motor" class="text-decoration-none"><i class="fas fa-cogs me-2 text-secondary"></i>Noticias Mundo Motor</a></li>
						<li><a href="feed-RSS.php#f1" class="text-decoration-none"><i class="fas fa-flag-checkered me-2 text-danger"></i>Ultimas noticias Formula 1</a></li>
						<li><a href="feed-RSS.php#motogp" class="text-decoration-none"><i class="fas fa-motorcycle me-2 text-primary"></i>Ultimas noticias MotoGP</a></li>
					</ul>
				</div>
				
				<hr>

				<!-- Apartado de otras secciones -->
				<div class="mb-4">
					<h6 class="text-success mt-2 ps-2"><i class="fas fa-folder-open me-2"></i>Otras Secciones</h6>
					<ul class="list-unstyled ps-4">
					  <li class="mb-2">
						<a href="https://eventosmotor.com/" class="text-decoration-none">
						  <i class="fas fa-calendar-alt me-2 text-primary"></i>Eventos Proximos
						</a>
					  </li>  
					</ul>
				</div>
				
				<!-- Apartado de suscripción -->
				<div class="card">
					<div class="card-header bg-primary text-white">
						<i class="fas fa-envelope-open-text me-2"></i>Suscribete a nuestro boletin
					</div>
				<div class="card-body">
					<form action="suscribirse.php" method="POST">
						<div class="mb-3">
							<label for="emailSubs" class="form-label">Email</label>
							<input type="email" class="form-control" id="emailSubs" name="email" placeholder="tuemail@ejemplo.com" required>
						</div>
						<button type="submit" class="btn btn-success w-100">Suscribirse</button>
					</form>
				</div>
			</div>
		</div>
	</nav>


    <!-- Es el contenido principal a la derecha -->
    <main class="col-md-9 ps-md-4">
		<!-- Es el código actual de noticias -->
		<div class="text-center mb-5">
			
			<h1 class="text-primary fw-bold"><?php echo $titulo; ?></h1>
			
			<h4 class="text-secondary mb-2">Noticias recientes</h5>
			
		</div>
		<!-- Es la sección de noticias sobre el mundo del motor -->
		<div class="card mb-4 shadow-sm">
			<div class="card-header bg-primary text-white">
				<h4 class="text-white my-2">Ultimas noticias sobre pruebas de coches</h4>
			</div>
			<div class="card-body">
				<ul class="list-group list-group-flush">
					<?php
					$rss_url = 'https://es.motor1.com/rss/category/pruebas-coches/';
					$rss = @simplexml_load_file($rss_url);
					if ($rss) {
						$count = 0;
						foreach ($rss->channel->item as $item) {
							$img_url = '';
							if (isset($item->enclosure) && isset($item->enclosure['url'])) {
								$img_url = (string) $item->enclosure['url'];
							} elseif (isset($item->children('media', true)->content)) {
								$media = $item->children('media', true);
								$img_url = (string) $media->content->attributes()->url;
							}
							?>
							<li class="list-group-item p-3 border-0 mb-3 shadow-sm rounded">
								<div class="d-flex align-items-start">
									<?php if ($img_url): ?>
										<img src="<?= $img_url ?>" alt="Imagen noticia" 
											 class="rounded me-3" 
											 style="width: 100px; height: 70px; object-fit: cover; transition: transform 0.3s ease;" 
											 onmouseover="this.style.transform='scale(1.1)';" 
											 onmouseout="this.style.transform='scale(1)';">
									<?php endif; ?>
									<div>
										<a href="<?= $item->link ?>" target="_blank" 
										   class="fw-bold text-secondary text-decoration-none fs-6 mb-1 d-block"
										   style="transition: color 0.3s ease;"
										   onmouseover="this.style.color='#0d6efd';" 
										   onmouseout="this.style.color='';">
											<?= $item->title ?>
										</a>
										<small class="badge bg-primary">
											<i class="far fa-calendar me-1"></i><?php echo date("d/m/Y", strtotime($item->pubDate)); ?>
											<i class="far fa-clock me-1"></i><?php echo date("H:i", strtotime($item->pubDate)); ?>
										</small>
									</div>
								</div>
							</li>
							<?php
							$count++;
							if ($count >= 8) break;
						}
					} else {
						echo '<li class="list-group-item text-danger fw-bold">?? No se pudo cargar el feed RSS.</li>';
					}
					?>
				</ul>						
			</div>
		</div>
	</main>
</div>

