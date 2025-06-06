<nav aria-label="Paginación">
  <ul class="pagination pagination-sm">
    <?php for ($i = 1; $i <= $paginas; $i++): ?>
        <li class="page-item <?= ($pagina_actual == $i) ? 'active' : '' ?>">
            <a class="page-link" href="?p=<?= $i ?>"><?= $i ?></a>
        </li>
    <?php endfor; ?>
  </ul>
</nav>
