<?php
// Vinculacion archivo de funciones
require './includes/app.php';
// Definicion de Variables
$inicio = true;
// Llama a la funcion incluirTemplate()
incluirTemplate("header");
?>
<!-- Main -->
<main class="contenedor">
  <h1>Base</h1>
</main>

<!-- Footer -->
<?php
include './includes/templates/footer.php';
?>

<!-- Vinculo Js -->
<script src="./build/js/bundle.min.js"></script>
</body>

</html>