<!-- Página de boletín -->
<div class="container my-4 p-3 bg-light border rounded">
    <h2><?= $titulo ?></h2>

    <?php if (empty($emails)): ?>
        <div class="alert alert-warning mt-3">El archivo está vacío o no hay correos guardados.</div>
    <?php else: ?>
        <form method="POST">
            <ul class="list-group mt-3">
                <?php foreach ($emails as $index => $email): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><?= $email ?></span>
                        <button class="btn btn-sm btn-danger" type="submit" name="eliminar" value="<?= $index ?>" onclick="return confirm('¿Seguro que quieres eliminar esta sucripción?')">Eliminar</button>
                    </li>
                <?php endforeach; ?>
            </ul>
        </form>
    <?php endif; ?>
</div>
