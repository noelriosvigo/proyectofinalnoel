<h2>Gestión de Roles</h2>

<div class="card mb-4">
	<div class="card-header">
        <strong><?php echo isset($rol) ? 'Editar rol' : 'Añadir nuevo rol'; ?></strong>
    </div>
	<div class="card-body">
		<div class="mb-4">
			<a class="btn btn-primary" href="roles.php">Nuevo rol</a>
		</div>
		<form action="roles.php" method="post">
			<div class="row">
				<div class="col-md-2 mb-3">
					<input class="form-control" type="text" name="id" placeholder="ID" value="<?php echo isset($rol) ? $rol['id'] : ''; ?>" readonly>
				</div>
				<div class="col-md-3 mb-3">
					<input class="form-control" type="text" name="nombre_rol" placeholder="Nombre" value="<?php echo isset($rol) ? $rol['nombre_rol'] : ''; ?>" required>
				</div>
				<div class="col-12">
					<input class="btn btn-success" type="submit" value="Guardar">
				</div>
			</div>
		</form>
	</div>
</div>

<div class="card">
	<div class="card-header">
		<strong>Lista de Roles</strong>
	</div>
	<div class="card-body table-responsive">
		<table class="table">
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th class="text-center">Acciones</th>
				</tr>
				<?php if (!empty($roles)): ?>
				<?php foreach ($roles as $rol): ?>
				<?php if (!empty($rol['nombre_rol'])): ?>
					<tr>
						<td><?php echo $rol['id']; ?></td>
						<td><?php echo $rol['nombre_rol']; ?></td>
						<td class="text-center">
							<a class="btn btn-sm btn-primary" href="roles.php?editar=<?php echo $rol['id']; ?>">Editar</a>
							<a class="btn btn-sm btn-danger" href="roles.php?borrar=<?php echo $rol['id']; ?>" onclick="return confirm('¿Seguro que quieres eliminar este rol?')">Borrar</a>
						</td>
					</tr>
				<?php endif; ?>
				<?php endforeach; ?>

				<?php else: ?>
					<tr>
						<td colspan="3" class="text-center">No hay roles creados.</td>
					</tr>
				<?php endif; ?>
		</table>
	</div>
</div>
<!-- Paginación -->
<div class="mt-4">
    <?php include("paginacion.html.php"); ?>
</div>
