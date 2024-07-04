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

<!-- Tabla, con listado de Propiedades -->
<table class="propiedades">
  <thead>
    <tr>
      <th>ID</th>
      <th>Título</th>
      <th>Imagen</th>
      <th>Precio</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tr>
    <td>1</td>
    <td>Casa en la PLaya</td>
    <td> <img src="../img/blog3.jpg" class="imagen-tabla" </td>
    <td>$120580</td>
    <td>
      <a href="#" class="boton-rojo-block">Eliminar</a>
      <a href="#" class="boton-amarillo-block">Actualizar</a>
    </td>
  </tr>
  <tbody>

  </tbody>
</table>















<!-- Vista del Footer -->
<?php
// Llama a la función incluirTemplate()
incluirTemplate('footer');
?>

<!-- url: http://localhost/bienesraices/admin/ -->