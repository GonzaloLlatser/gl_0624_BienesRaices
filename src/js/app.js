document.addEventListener("DOMContentLoaded", function () {
  // Llamado a las Funciones
  eventListeners();
  darkMode();
});

function eventListeners() {
  // Selecciona elemento del DOM
  const mobileMenu = document.querySelector(".mobile-menu");
  // Vincula llamado de funcion al elemento
  mobileMenu.addEventListener("click", navegacionResponsive);
}

// Menu de Hamburguesa
function navegacionResponsive() {
  // Selecciona elemento del DOM
  const navegacion = document.querySelector(".navegacion");
  // Condicional = modificacion de clase y estilos CSS
  if (navegacion.classList.contains("mostrar")) {
    navegacion.classList.remove("mostrar");
  } else {
    navegacion.classList.add("mostrar");
  }
}

// Modo Oscuro o DarkMode
function darkMode() {
  // Selecciona elemento del DOM
  const botonDarkMode = document.querySelector(".dark-mode-boton");
  // Vincula llamado de funcion al elemento
  botonDarkMode.addEventListener("click", function () {
    // Condicional toggle para modificar clase del elemento
    document.body.classList.toggle("dark-mode");
  });
}
