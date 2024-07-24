<!-- Vista del Header -->
<?php
// Vinculación archivo de funciones
require('../../bienesraices/includes/app.php');
estaAutenticado();

// Importar clases
use App\Propiedad;
use App\Vendedor;

// Metodo para Obtener las Propiedades
$propiedades = Propiedad::all();
$vendedores = Vendedor::all();

// ELIMINAR PROPIEDAD O VENDEDOR
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Crea variable
  $id = $_POST['id'];
  // Valida la informacion
  $id = filter_var($id, FILTER_VALIDATE_INT);
  // Condicional (En caso de existir id)
  if ($id) {
    $tipo = $_POST['tipo'];
    if (validarTipoContenido($tipo)) {
      if ($tipo == 'vendedor') {
        $vendedor = Vendedor::find($id);
        $vendedor->eliminar();
      } else if ($tipo == 'propiedad') {
        $propiedad = Propiedad::find($id);
        $propiedad->eliminar();
      }
    }
  }
}

// Mensaje de Confirmacion de Registro de la Propiedad
$resultado = $_GET['resultado'] ?? null;

// Llama a la función incluirTemplate()
incluirTemplate("header");
?>

<!-- Cuerpo de la Página -->
<main class="contenedor seccion">
  <h1>Administrador de Bienes Raices</h1>
  <?php
  $mensaje = mostrarNotificacion(intval($resultado));
  if ($mensaje) { ?> <p class="alerta exito"><?php echo s($mensaje) ?></p> <?php } ?>

  <!-- Enlaces -->
  <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
  <a href="/bienesraices/admin/vendedores/crear.php" class="boton boton-amarillo">Nuevo Vendedor</a>


  <h2>Propiedades</h2>
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
    <?php foreach ($propiedades as $propiedad) : ?>
      <!-- Genera en cada iteracion el siguiente codigo HTML -->
      <tr>
        <td><?php echo $propiedad->id; ?></td>
        <td><?php echo $propiedad->titulo; ?></td>
        <td><img src="../imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla" </td>
        <td>€ <?php echo $propiedad->precio; ?></td>
        <td>
          <form method="POST" class="w-100">
            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
            <input type="hidden" name="tipo" value="propiedad">
            <input type="submit" class="boton-rojo-block" value="eliminar">
          </form>
          <a href="../admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<h2>Vendedores</h2>
<!-- Tabla, con listado de Vendedores -->
<table class="propiedades">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Teléfono</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <!-- Retorno de la consulta a la BBDD -->
    <?php foreach ($vendedores as $vendedor) : ?>
      <!-- Genera en cada iteracion el siguiente codigo HTML -->
      <tr>
        <td><?php echo $vendedor->id; ?></td>
        <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
        <td><?php echo $vendedor->telefono; ?></td>
        <td>
          <form method="POST" class="w-100">
            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
            <input type="hidden" name="tipo" value="vendedor">
            <input type="submit" class="boton-rojo-block" value="eliminar">
          </form>
          <a href="../admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>


<!-- Vista del Footer -->
<?php
// Llama a la función incluirTemplate()
incluirTemplate('footer');
?>

<!-- url: http://localhost/bienesraices/admin/ -->