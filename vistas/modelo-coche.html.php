<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

<div class="container py-5">
  <!-- Es la cabecera -->
  <div class="text-center mb-4">
    <h2 class="fw-bold mb-3">Explora modelos premium</h2>
    <p class="text-muted">Haz clic en cualquier modelo para verlo en 3D</p>
  </div>

  <!-- Es la selección de modelo -->
  <div class="row g-3 mb-4">
    <div class="col-md-3 col-6">
      <div class="model-card" data-model="mercedes">
        <div class="model-thumb" style="background-image: url('admin/imagenes/thumbs/mercedes-thumb.jpg');"></div>
        <div class="model-name">SLR</div>
      </div>
    </div>
    <div class="col-md-3 col-6">
      <div class="model-card" data-model="lamborghini">
        <div class="model-thumb" style="background-image: url('admin/imagenes/thumbs/lamborghini-thumb.jpg');"></div>
        <div class="model-name">Lamborghini</div>
      </div>
    </div>
    <div class="col-md-3 col-6">
      <div class="model-card" data-model="tesla_model_s">
        <div class="model-thumb" style="background-image: url('admin/imagenes/thumbs/tesla-thumb.jpg');"></div>
        <div class="model-name">Tesla</div>
      </div>
    </div>
    <div class="col-md-3 col-6">
      <div class="model-card" data-model="mercedes-benz_g-class">
        <div class="model-thumb" style="background-image: url('admin/imagenes/thumbs/gclass-thumb.jpg');"></div>
        <div class="model-name">G-Class</div>
      </div>
    </div>
  </div>

  <!-- Es para visualizarlo en 3D -->
  <div class="model-viewer-container mb-4">
    <model-viewer class="model-viewer" id="model-viewer" 
                 camera-controls 
                 auto-rotate>
    </model-viewer>
    <div id="model-placeholder" class="text-center py-5">
      <i class="fas fa-car text-muted" style="font-size: 3rem;"></i>
      <p class="mt-3">Selecciona un modelo para verlo en 3D</p>
    </div>
  </div>

  <!-- Es la información básica del modelo -->
  <div id="model-info" class="text-center" style="display: none;">
    <h4 id="model-title" class="fw-bold mb-2"></h4>
	<h6 id="model-description" class="mb-2"></h6>
  </div>
</div>

<!-- Son los datos de los modelos -->
<script>
  const models = {
    mercedes: {
      title: "Mercedes SLR McLaren",
      description: "Superdeportivo alemán con motor V8. Hecho en colaboración con McLaren.",
      model: "admin/imagenes/coche3d/mercedes-benz_slr_mclaren_2005.glb",
    },
    lamborghini: {
      title: "Lamborghini Murciélago",
      description: "Clásico deportivo italiano con motor V12.",
      model: "admin/imagenes/coche3d/lamborghini_murcielago_lp640.glb",
    },
    tesla_model_s: {
      title: "Tesla Model S Plaid",
      description: "Sedán eléctrico más rápido del mundo.",
      model: "admin/imagenes/coche3d/tesla_model_s_plaid_2023.glb",
    },
    "mercedes-benz_g-class": {
      title: "Mercedes G-Class",
      description: "Todoterreno de lujo con diseño icónico. Tracción 4x4 y motor V8.",
      model: "admin/imagenes/coche3d/mercedes-benz_g-class.glb",
    }
  };

  document.querySelectorAll('.model-card').forEach(card => {
    card.addEventListener('click', function() {
      const modelId = this.getAttribute('data-model');
      const modelData = models[modelId];
      const viewer = document.getElementById('model-viewer');
      
      // Para actualizar visor 3D
      viewer.src = modelData.model;
      viewer.style.display = 'block';
      document.getElementById('model-placeholder').style.display = 'none';
      
      // Para actualizar información
      document.getElementById('model-title').textContent = modelData.title;
      document.getElementById('model-info').style.display = 'block';
	  document.getElementById('model-description').textContent = modelData.description;
    });
  });
</script>