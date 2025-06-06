  <div class="container text-center">
    <h1 class="mb-3">¡Adivina el número!</h1>
    <p class="mb-4">Estoy pensando en un número del 1 al 10</p>
    
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="input-group mb-3">
          <input type="number" class="form-control" id="intento" min="1" max="10" placeholder="Tu número">
          <button class="btn btn-primary" onclick="verificar()">Adivinar</button>
        </div>
        <div id="mensaje" class="fw-bold"></div>
      </div>
    </div>
  </div>

  <script>
    const numeroSecreto = Math.floor(Math.random() * 10) + 1;

    function verificar() {
      const intento = parseInt(document.getElementById("intento").value);
      const mensaje = document.getElementById("mensaje");

      if (isNaN(intento)) {
        mensaje.textContent = "Por favor, ingresa un número.";
        mensaje.style.color = "orange";
        return;
      }

      if (intento === numeroSecreto) {
        mensaje.textContent = "¡Correcto! 🎉";
        mensaje.style.color = "green";
      } else {
        mensaje.textContent = "Incorrecto. Intenta de nuevo.";
        mensaje.style.color = "red";
      }
    }
  </script>

