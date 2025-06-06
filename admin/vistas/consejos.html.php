<!-- Página de consejos -->
<h2>Gestión de Consejos</h2>

<div class="card mb-4">
    <div class="card-header">
        <strong><?php echo isset($consejo) ? 'Editar consejo' : 'Añadir nuevo consejo'; ?></strong>
    </div>
    <div class="card-body">
        <div class="mb-4">
            <a class="btn btn-primary" href="consejos.php">Nuevo consejo</a>
        </div>

        <form action="consejos.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <!-- ID (solo para editar) -->
                <div class="col-md-2 mb-3">
                    <label class="form-label">ID</label>
                    <input class="form-control" type="text" name="id" value="<?php echo isset($consejo) ? $consejo['id'] : ''; ?>" readonly>
                </div>

                <!-- Título -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Título</label>
                    <input class="form-control" type="text" name="titulo" maxlength="50" value="<?php echo isset($consejo) ? $consejo['titulo'] : ''; ?>" required>
                </div>

                <!-- Fecha (solo se visualiza si la tienes) -->
                <div class="col-md-4 mb-3">
                    <label class="form-label">Fecha</label>
                    <input class="form-control" type="text" name="fecha" value="<?php echo isset($consejo) ? $consejo['fecha'] : ''; ?>" readonly>
                </div>

                <!-- Contenido -->
                <div class="col-12 mb-3">
                    <label class="form-label">Contenido</label>
                    <textarea class="form-control" name="contenido" maxlength="500" rows="4" required><?php echo isset($consejo) ? $consejo['contenido'] : ''; ?></textarea>
                </div>

                <!-- Categoría -->
                <div class="col-md-4 mb-3">
                    <label class="form-label">Categoría</label>
                    <select class="form-control" name="categoria" required>
                        <option value="Motor" <?php echo isset($consejo) && $consejo['categoria'] == 'Motor' ? 'selected' : ''; ?>>Motor</option>
                        <option value="Neumáticos" <?php echo isset($consejo) && $consejo['categoria'] == 'Neumáticos' ? 'selected' : ''; ?>>Neumáticos</option>
                        <option value="Aceite" <?php echo isset($consejo) && $consejo['categoria'] == 'Aceite' ? 'selected' : ''; ?>>Aceite</option>
                        <option value="Frenos" <?php echo isset($consejo) && $consejo['categoria'] == 'Frenos' ? 'selected' : ''; ?>>Frenos</option>
                    </select>
                </div>

                <!-- Imagen -->
                <div class="col-md-8 mb-3">
                    <label class="form-label">Imagen</label>
                    <?php if (isset($consejo) && !empty($consejo['imagen'])): ?>
                        <div class="mb-2">
                            <img src="../admin/imagenes/consejos/<?php echo $consejo['imagen']; ?>" class="img-thumbnail" style="max-width: 200px;" alt="Imagen subida">
                        </div>
                    <?php endif; ?>
                    <input type="file" class="form-control" name="imagen" accept="image/*">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <strong>Lista de Consejos</strong>
    </div>
    <div class="card-body table-responsive">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Contenido</th>
                <th>Fecha</th>
                <th>Categoría</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
            <?php if (!empty($consejos)): ?>
                <?php foreach ($consejos as $consejo): ?>
                    <tr>
                        <td class="text-end"><?php echo $consejo['id']; ?></td>
                        <td><?php echo $consejo['titulo']; ?></td>
                        <td><?php echo $consejo['contenido']; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($consejo['fecha'])); ?></td>
                        <td><?php echo $consejo['categoria']; ?></td>
                        <td class="text-center">
                            <?php if (!empty($consejo['imagen'])): ?>
                                <img src="../admin/imagenes/consejos/<?php echo $consejo['imagen']; ?>" 
                                     alt="Imagen del consejo" 
                                     style="max-width: 100px; height: auto; object-fit: contain; border-radius: 4px;">
                            <?php else: ?>
                                <span class="text-muted">Sin imagen</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-primary mb-1" href="consejos.php?editar=<?php echo $consejo['id']; ?>">Editar</a>
                            <a class="btn btn-sm btn-danger" href="consejos.php?borrar=<?php echo $consejo['id']; ?>" onclick="return confirm('¿Seguro que quieres eliminar este consejo?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">No hay consejos creados.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</div>

<br>
<?php include("paginacion.html.php"); ?>
