<!doctype html>
<html lang="es" data-bs-theme="auto">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Noel Rios">
	<meta name="generator" content="Hugo 0.122.0">
	<title><?php echo isset($titulo) ? $titulo : '' ?></title>
	<link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link href="vistas/estilos/fff.css" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="imagenes/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="imagenes/favicon-16x16.png">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f7f7f7;
    }

    .eye-icon {
      width: 24px;
      height: 24px;
      color: #6c757d;
    }

    .toggle-button {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      background: transparent;
      border: none;
      padding: 0;
      z-index: 2;
    }
  </style>
</head>

<body>
  <main class="form-signin">
    <div class="d-flex justify-content-center mb-2">
      <img src="imagenes/login/iniciar-sesion.png" style="max-width: 250px" alt="Iniciar Sesión" class="img-fluid mx-auto d-block">
    </div>

    <!-- Mensajes de error -->
    <?php if (isset($_SESSION['success'])): ?>
      <div class="alert alert-success text-center mt-3">
        <?php echo $_SESSION['success']; ?>
      </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
      <div class="alert alert-danger text-center mt-3">
        <?php echo $_SESSION['error']; ?>
      </div>
    <?php endif; ?>

    <form method="post" action="login.php">
      <!-- Correo -->
      <div class="form-floating mb-3">
        <input id="email" name="email" type="email" class="form-control" placeholder=" " required autocomplete="off">
        <label for="email">Ingresa su Correo</label>
      </div>

      <!-- Contraseña con botón de ojo -->
      <div class="form-floating mb-3 position-relative">
        <input id="password" name="password" type="password" class="form-control" placeholder=" " autocomplete="current-password" required>
        <label for="password">Ingresa su Contraseña</label>
        <button type="button" class="toggle-button" aria-label="Mostrar u ocultar contraseña"></button>
      </div>

      <!-- Botón de enviar -->
      <button class="btn btn-primary w-100 mb-2" type="submit">Entrar</button>

      <!-- Registro -->
      <div class="text-center">
        <a href="registro.php" class="btn btn-secondary w-100">¿No tienes cuenta?<br>Regístrate</a>
      </div>

      <!-- Volver a inicio -->
      <div class="d-flex justify-content-center mt-3">
        <div style="border: 1px solid #ccc; padding: 6px 12px; border-radius: 6px; background-color: #f8f9fa; width: auto; max-width: 220px; text-align: center;">
          <a href="../index.php" class="text-decoration-none d-block" style="font-size: 0.9rem;">← Volver a la página de inicio</a>
        </div>
      </div>

      <p class="mt-3 mb-2 text-body-secondary text-center">&copy; 2025 - Proyecto Final Noel Ríos Vigo</p>
    </form>
  </main>

  <!-- Codigo en JavaScript -->
  <script>
    const eyeIcons = {
      open: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="eye-icon">
               <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
               <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
             </svg>`,
      closed: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="eye-icon">
                 <path d="M3.53 2.47a.75.75 0 00-1.06 1.06l18 18a.75.75 0 101.06-1.06l-18-18zM22.676 12.553a11.249 11.249 0 01-2.631 4.31l-3.099-3.099a5.25 5.25 0 00-6.71-6.71L7.759 4.577a11.217 11.217 0 014.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113z" />
                 <path d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0115.75 12zM12.53 15.713l-4.243-4.244a3.75 3.75 0 004.243 4.243z" />
                 <path d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 00-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 016.75 12z" />
               </svg>`
    };

    function initTogglePassword() {
      const passwordInput = document.getElementById('password');
      const toggleBtn = document.querySelector('.toggle-button');

      if (!passwordInput || !toggleBtn) return;

      toggleBtn.innerHTML = eyeIcons.open;

      toggleBtn.addEventListener('click', () => {
        const isVisible = passwordInput.type === 'text';
        passwordInput.type = isVisible ? 'password' : 'text';
        toggleBtn.innerHTML = isVisible ? eyeIcons.open : eyeIcons.closed;
      });
    }

    document.addEventListener('DOMContentLoaded', initTogglePassword);
  </script>
</body>
</html>
