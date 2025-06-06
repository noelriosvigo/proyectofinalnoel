<h2>Gestión de Comentarios</h2>

<div class="card mb-4">
	<div class="card-header">
        <strong><?php echo isset($foro) ? 'Editar comentario' : 'Añadir nuevo comentario'; ?></strong>
    </div>
    <div class="card-body">
        <div class="mb-4">
            <a class="btn btn-primary" href="foros.php">Nuevo comentario</a>
        </div>

        <form action="foros.php" method="post">
            <div class="row">
                <!-- ID (solo para editar) -->
                <div class="col-md-2 mb-3">
                    <label class="form-label">ID</label>
                    <input class="form-control" type="text" name="id" value="<?php echo isset($foro) ? $foro['id'] : ''; ?>" readonly>
                </div>

                <!-- Autor -->	
				<div class="col-md-5 mb-3">
					<label for="autor_visible" class="form-label">Autor</label>
					<input id="autor_visible" class="form-control" type="text" value="<?php echo $_SESSION['usuario']['email']; ?>" disabled>
				</div>

				<!-- Es el autor real (oculto, se envía al servidor) -->
				<input type="hidden" name="autor" value="<?php echo $_SESSION['usuario']['email']; ?>">

                <!-- Comentarios -->
                <div class="col-12 mb-3">
                    <label class="form-label">Comentarios</label>
                    <textarea class="form-control" name="comentarios" maxlength="300" rows="4" required><?php echo isset($foro) ? $foro['comentarios'] : ''; ?></textarea>
                </div>
				
				 <!-- Fechas -->
                <div class="col-md-3 mb-3">
                    <label class="form-label">Fecha de Publicación</label>
                    <input class="form-control" type="text" name="fecha" value="<?php echo isset($foro) ? $foro['fecha'] : ''; ?>" readonly>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
</form>

<div class="card">
<div class="card-header">
		<strong>Lista de Comentarios del Foro</strong>
	</div>
<div class="card-body table-responsive">
<table class="table">
    <tr>
        <th>ID</th>
        <th>Creado por</th>
        <th>Comentarios</th>
        <th>Fecha de Publicación</th>
        <th>Acciones</th>
    </tr>

    <?php if (!empty($foros)): ?>
        <?php foreach ($foros as $foro): ?>
            <tr>
                <td class="text-end"><?php echo $foro['id']; ?></td>
                <td><?php echo $foro['autor']; ?></td>
                <td><?php echo $foro['comentarios']; ?></td>
				<td><?php echo date('d-m-Y H:i:s', strtotime($foro['fecha'])); ?></td>
                <td class="text-center">
                    <a class="btn btn-sm btn-primary" href="foros.php?editar=<?php echo $foro['id']; ?>">Editar</a>
                    <a class="btn btn-sm btn-danger" href="foros.php?borrar=<?php echo $foro['id']; ?>"
						onclick="return confirm('¿Seguro que quieres eliminar este comentario?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5" class="text-center">No hay comentarios creados.</td>
        </tr>
    <?php endif; ?>
</table>
</div>
</div>
</div>

<br>
<?php include("paginacion.html.php"); ?>
