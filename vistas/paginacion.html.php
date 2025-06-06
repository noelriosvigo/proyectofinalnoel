<div class="pagination pagination-sm">
    <?php for ($i = 1; $i <= $paginas; $i++): ?>
        <a href="?p=<?php echo $i; ?>" class="btn btn-<?php echo ($i == $pagina_actual) ? 'primary' : 'light'; ?>">
            <?php echo $i; ?>
        </a>
        <?php endfor; ?>
    </div>
</div>