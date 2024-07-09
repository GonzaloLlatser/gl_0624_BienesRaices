<?php
// Vinculacion archivo de funciones
require './includes/funciones.php';
// Definicion de Variables
$inicio = true;
// Llama a la funcion incluirTemplate()
incluirTemplate("header");
?>
<!-- Main -->
<main class="contenedor">
  <section class="seccion contenedor">
    <h2>Casas y Pisos en Venta</h2>

    <?php
    // Definicion de limite de Propiedades en la vista
    $limite = 10;
    include './includes/templates/anuncios.php';
    ?>


    <div class="alinear-derecha">
      <a href="anuncios.html" class="boton-verde">Ver todas</a>
    </div>
  </section>
</main>

<!-- Footer -->
<?php
include './includes/templates/footer.php';
?>

<!-- Vinculo Js -->
<script src="./build/js/bundle.min.js"></script>
</body>

</html>