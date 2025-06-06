<!-- Página de Perfil -->
<div class="container py-5">
        <div class="text-center mb-4">
            <img src="admin/imagenes/cabeceras/perfil.png" alt="Perfil" class="img-fluid" style="max-height: 150px;">
        </div>

        <div class="card shadow-sm p-4 text-center">
            <div class="mb-3">
				<img src="assets/images/usuarios/<?php echo ($_SESSION['usuario']['avatar_path']); ?>" alt="avatar" style="width:150px;height:150px;border-radius:50%;object-fit:cover;">
            </div>

            <form action="perfil.php" method="POST" enctype="multipart/form-data" class="mx-auto" style="max-width: 400px;">
                <div class="mb-3">
                    <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
                    <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control"
                        value="<?php echo $_SESSION['usuario']['nombre_usuario']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="<?php echo ($_SESSION['usuario']['email']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="avatar" class="form-label">Actualizar Avatar</label>
                    <input type="file" name="avatar" id="avatar" class="form-control">
                </div>
				
				<?php if (isset($_SESSION['success'])): ?>
					<div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
				<?php endif; ?>

				<?php if (isset($_SESSION['error'])): ?>
					<div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
				<?php endif; ?>
				
                <button type="submit" class="btn btn-success w-100">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>
