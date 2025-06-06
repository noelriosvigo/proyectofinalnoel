<!-- Página de contacto -->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="card-contact shadow-lg p-4 rounded-3">
    <div class="text-center mb-4">
      <img src="admin/imagenes/cabeceras/contacto.png" alt="Contacto" class="section-padding">
    </div>

    <!-- Es para mostrar mensajes de sesión -->
    <?php if (isset($_SESSION['success'])): ?>
      <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
      <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <form action="enviar.php" method="POST" novalidate>
	  <div class="mb-3">
		<label for="nombre" class="form-label fw-semibold">Nombre</label>
		<input type="text" id="nombre" name="nombre" class="form-control"
			   pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{2,50}" 
			   minlength="2" maxlength="50"
			   value="<?php echo $nombre ?? ''; ?>"
			   title="Solo letras y espacios. Mínimo 2 caracteres, máximo 50" required>
	  </div>

	  <div class="mb-3">
		<label for="email" class="form-label fw-semibold">Correo</label>
		<input type="email" id="email" name="email" class="form-control"
			   maxlength="100"
			   value="<?php echo $email ?? ''; ?>" required>
	  </div>

	  <div class="mb-4">
		<label for="mensaje" class="form-label fw-semibold">Mensaje</label>
		<textarea id="mensaje" name="mensaje" class="form-control" rows="4"
				  minlength="10" maxlength="500" required><?php echo $mensaje ?? ''; ?></textarea>
	  </div>

	  <button type="submit" class="btn btn-success w-100">Enviar</button>
	</form>
  </div>
</div>