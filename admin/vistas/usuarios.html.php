<h2>Gestión de Usuarios</h2>

<!-- Formulario de usuario -->
<div class="card mb-4">
    <div class="card-header">
        <strong><?php echo isset($usuario) ? 'Editar usuario' : 'Añadir nuevo usuario'; ?></strong>
    </div>
    
    <div class="card-body">
        <div class="mb-4 text-end">
            <a class="btn btn-primary" href="usuarios.php">Nuevo Usuario</a>
        </div>
        <form action="usuarios.php" method="post">
            <div class="row g-2">
                <div class="col-md-4">
                    <label>ID</label>
                    <input class="form-control" type="text" name="id" value="<?php echo isset($usuario) ? $usuario['id'] : ''; ?>" readonly>
                </div>
                <div class="col-md-4">
                    <label>Nombre Usuario</label>
                    <input class="form-control" type="text" name="nombre_usuario" maxlength="30" value="<?php echo isset($usuario) ? $usuario['nombre_usuario'] : ''; ?>" required>
                </div>
                <div class="col-md-4">
                    <label>Correo Electrónico</label>
                    <input class="form-control" type="email" name="email" maxlength="100" value="<?php echo isset($usuario) ? $usuario['email'] : ''; ?>" required>
                </div>
                <div class="col-md-4">
                    <label>Contraseña</label>
                    <input class="form-control" type="password" name="password" maxlength="255" value="<?php echo isset($usuario) ? $usuario['password'] : ''; ?>" required>
                </div>
                <div class="col-md-4">
                    <label>Fecha Registro</label>
                    <input class="form-control" type="text" name="fecha_registro" value="<?php echo isset($usuario) ? $usuario['fecha_registro'] : ''; ?>" readonly>
                </div>
            </div>
            <!-- Rol -->
            <div class="col-md-4 mt-4">
                <label>Rol</label>
                <select class="form-control" name="rol_id" required>
                    <option value="1" <?php echo (isset($usuario) && $usuario['rol_id'] == 1) ? 'selected' : ''; ?>>Admin</option>
                    <option value="2" <?php echo (isset($usuario) && $usuario['rol_id'] == 2) ? 'selected' : ''; ?>>Usuario</option>
                </select>
            </div>

            <div class="col-12 mt-4">
                <input class="btn btn-success" type="submit" value="Guardar">
            </div>
        </form>
    </div>
</div>

<!-- Tabla de usuarios -->
<div class="card">
	<div class="card-header">
		<strong>Lista de usuarios</strong>
	</div>
<div class="card-body table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Usuario</th>
                <th>Correo Electrónico</th>
                <th>Contraseña</th>
                <th>Rol</th>
                <th>Fecha Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
			<?php if (!empty($usuarios)): ?>
				<?php foreach ($usuarios as $usuario): ?>
				<tr>
					<td><?php echo $usuario['id']; ?></td>
					<td><?php echo $usuario['nombre_usuario']; ?></td>
					<td><?php echo $usuario['email']; ?></td>
					<td><?php echo $usuario['password']; ?></td>
					<td><?php echo $usuario['nombre_rol']; ?></td>
					<td><?php echo date('d-m-Y H:i:s', strtotime($usuario['fecha_registro'])); ?></td>
					<td>
						<a class="btn btn-sm btn-primary" href="usuarios.php?editar=<?php echo $usuario['id']; ?>">Editar</a>
						<a class="btn btn-sm btn-danger" href="usuarios.php?borrar=<?php echo $usuario['id']; ?>" onclick="return confirm('¿Seguro que quieres eliminar este usuario?')">Borrar</a>
					</td>
				</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="7" class="text-center">No hay usuarios creados.</td>
				</tr>
			<?php endif; ?>
        </tbody>
    </table>
</div>
</div>


<!-- Paginación -->
<div class="mt-4">
    <?php include("paginacion.html.php"); ?>
</div>
