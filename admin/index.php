<!-- Vista del Header -->
<?php
// Mensaje de Confirmacion de Registro de la Propiedad
$resultado = $_GET['resultado'] ?? null;
// Vinculación archivo de funciones
require('../includes/funciones.php');
// Llama a la función incluirTemplate()
incluirTemplate("header");
?>

<!-- Cuerpo de la Página -->
<main class="contenedor seccion">
  <h1>Administrador de Bienes Raices</h1>
  <?php if ($resultado == 1) : ?>
    <p class="alerta exito">Anuncio creado correctamente.</p>
  <?php endif ?>

  <!-- Enlaces -->
  <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
</main>

<!-- Vista del Footer -->
<?php
// Llama a la función incluirTemplate()
incluirTemplate('footer');
?>

<!-- url: http://localhost/bienesraices/admin/ -->