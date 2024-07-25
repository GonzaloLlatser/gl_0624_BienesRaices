<?php

// Vinculacion archivo de funciones
require './includes/app.php';
// Importa Clases
use App\Propiedad;
// Definicion de Variables
$inicio = true;
// Llama a la funcion incluirTemplate()
incluirTemplate("header");
// Definicion de Variables
$id = $_GET['id'];
// Filtro de seguridad, solo permite INT
$id = filter_var($id, FILTER_VALIDATE_INT);
// Condicional
if (!$id) {
  header('Location: /');
}
$propiedad = Propiedad::find($id);

?>

<!-- Main -->
<!-- Estructura html del anuncio -->
<main class="contenedor seccion contenido-centrado">
  <h1><?php echo $propiedad->titulo; ?></h1>
  <!-- Propiedad- Imagen -->
  <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio-imagen">
  <!-- Propiedad- Contenido -->
  <div class="resumen-propiedad">
    <p class="precio">€ <?php echo $propiedad->precio; ?></p>
    <ul class="iconos-caracteristicas">
      <li>
        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc" />
        <p><?php echo $propiedad->wc; ?></p>
      </li>
      <li>
        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
        <p><?php echo $propiedad->estacionamiento; ?></p>
      </li>
      <li>
        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" />
        <p><?php echo $propiedad->habitaciones; ?></p>
      </li>
    </ul>
    
      <?php echo $propiedad->descripcion; ?>
    
  </div>
</main>

<!-- Footer -->
<?php
include './includes/templates/footer.php';
?>

<!-- Vinculo Js -->
<script src="./build/js/bundle.min.js"></script>
</body>

</html>