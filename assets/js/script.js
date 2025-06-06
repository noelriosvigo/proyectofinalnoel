const lightBtn = document.getElementById('lightBtn');
const darkBtn = document.getElementById('darkBtn');
const body = document.body;

// Aplica tema guardado
const savedTheme = localStorage.getItem('theme');
if (savedTheme === 'dark') {
  body.classList.add('dark');
} else {
  body.classList.add('light');
}

// Actualiza visibilidad de botones
function updateButtonVisibility() {
  if (body.classList.contains('dark')) {
    darkBtn.style.display = 'none';
    lightBtn.style.display = 'inline-block';
  } else {
    lightBtn.style.display = 'none';
    darkBtn.style.display = 'inline-block';
  }
}

lightBtn.addEventListener('click', () => {
  body.classList.remove('dark');
  body.classList.add('light');
  localStorage.setItem('theme', 'light');
  updateButtonVisibility();
});

darkBtn.addEventListener('click', () => {
  body.classList.remove('light');
  body.classList.add('dark');
  localStorage.setItem('theme', 'dark');
  updateButtonVisibility();
});

// Llamada inicial
updateButtonVisibility();
