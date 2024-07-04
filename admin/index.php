<!-- Vista del Header -->
<?php
// Consulta de las Propiedades en la BBDD
// - Vinculacion a la BBDD
require('../includes/config/database.php');
// - Llama a la función conectarDB()
$db = conectarBD();
// Escribir el Query
$query = "SELECT * FROM propiedades";
// Consultar a la BBDD
$resultadoConsulta = mysqli_query($db, $query);
// Mostrar los resultados -> en el codigo del table

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
  <tbody>
    <!-- Retorno de la consulta a la BBDD -->
    <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)) : ?>
      <!-- Genera en cada iteracion el siguiente codigo HTML -->
      <tr>
        <td><?php echo $propiedad['id']; ?></td>
        <td><?php echo $propiedad['titulo']; ?></td>
        <td><img src="../imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla" </td>
        <td>€ <?php echo $propiedad['precio']; ?></td>
        <td>
          <a href="#" class="boton-rojo-block">Eliminar</a>
          <a href="#" class="boton-amarillo-block">Actualizar</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>
<!-- Cierra conexion a la BBDD -->
<?php mysqli_close($db); ?>

<!-- Vista del Footer -->
<?php
// Llama a la función incluirTemplate()
incluirTemplate('footer');
?>

<!-- url: http://localhost/bienesraices/admin/ -->