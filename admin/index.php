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

// ELIMINAR PROPIEDAD
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Crea variable
  $id = $_POST['id'];
  // Valida la informacion
  $id = filter_var($id, FILTER_VALIDATE_INT);
  // Condicional (En caso de existir id)
  if ($id) {
    // Eliminar ARCHIVO IMG
    // - Genera Query
    $query = "SELECT imagen FROM propiedades WHERE id= $id";
    // - Almacena el resultado de la consulta
    $resultado = mysqli_query($db, $query);
    // - Identifica la imagen almacenada
    $propiedad = mysqli_fetch_assoc($resultado);
    // - Elimina el archivo img
    unlink('../imagenes/' . $propiedad['imagen']);

    // Eliminar PROPIEDAD de mi BBDD
    // - Genera Query
    $query = "DELETE FROM propiedades WHERE id= $id";
    // - Almacena el resultado de la consulta
    $resultado = mysqli_query($db, $query);
    // Condicional de existir resultado
    if ($resultado) {
      // Redirecciona a la pagina ADMIN
      header('Location: /bienesraices/admin?resultado=3');
    }
  }
}

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
    <p class="alerta exito">Anuncio Creado Correctamente</p>
  <?php elseif ($resultado == 2) : ?>
    <p class="alerta exito">Anuncio Actualiazado Correctamente</p>
  <?php elseif ($resultado == 3) : ?>
    <p class="alerta exito">Anuncio Eliminado Correctamente</p>
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
          <form method="POST" class="w-100">
            <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
            <input type="submit" class="boton-rojo-block" value="eliminar">
          </form>
          <a href="../admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
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