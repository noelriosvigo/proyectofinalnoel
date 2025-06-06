<!-- Página de detalle de consejo -->
<div class="container py-5">
    <div class="text-center mb-4">
        <img src="admin/imagenes/cabeceras/consejos.png" alt="Consejos de Mantenimiento" class="img-fluid section-padding mb-4">
    </div>
    
    <!-- Es el botón para volver atrás -->
    <div class="mb-4">
        <a href="consejos.php" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Volver a consejos
        </a>
    </div>
    
    <!-- Es el detalle del consejo -->
    <div class="card shadow-sm">
        <!-- Imagen del consejo -->
        <div class="card-img-top">
            <?php if (!empty($consejo['imagen'])): ?>
                <img src="admin/imagenes/consejos/<?= $consejo['imagen'] ?>" 
                     alt="<?= $consejo['titulo'] ?>"
                     class="img-fluid w-100" style="max-height: 400px; object-fit: cover;">
            <?php else: ?>
                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                    <i class="bi bi-car-front text-muted" style="font-size: 3rem;"></i>
                </div>
            <?php endif; ?>
        </div>

        <!-- Es el contenido del consejo -->
        <div class="card-body">
            <div class="mb-3">
                <span class="badge bg-primary"><?= $consejo['categoria'] ?></span>
                <small class="text-muted ms-2">
                    <i class="bi bi-calendar"></i> <?= date("d/m/Y", strtotime($consejo['fecha'])) ?>
                </small>
            </div>
            
            <h1 class="card-title h2 mb-4"><?= $consejo['titulo'] ?></h1>
            
            <div class="card-text">
                <?= $consejo['contenido'] ?>
            </div>
        </div>
        
        <!-- Es el pie de tarjeta con acciones -->
        <div class="card-footer bg-white d-flex justify-content-between align-items-center">
            <small class="text-muted">
                ID: <?= $consejo['id'] ?>
            </small>
        </div>
    </div>
</div>