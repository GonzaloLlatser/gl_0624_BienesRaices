<?php
// Vinculación archivo de funciones

require('../../includes/app.php');

use App\Vendedor;

estaAutenticado();

// Validar el ID del vendedor
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);



//  Condicional, si no existe redirecciona a la Vista Inicial
if (!$id) {
  header('Location:/admin');
}

// Obtener el arreglo del Vendedor de la BBDD
$vendedor = Vendedor::find($id);



// - Arreglo con mensajes de Error
$errores = Vendedor::getErrores();

// Ejecucion del código POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Asignar los valores
  $args = $_POST['vendedor'];
  // Sincronizar los valores
  $vendedor->sincronizar($args);
  // Validacion
  $errores = $vendedor->validar();
  // Condicional
  if (empty($errores)) {
    $vendedor->guardar();
  }
}

incluirTemplate('header');

?>

<main class="contenedor seccion">
  <h1>Actualizar Vendedor</h1>
  <!-- Enlaces -->
  <a href="../index.php" class="boton boton-verde">Volver</a>
  <!-- Mensajes de Errores del Formulario -->
  <?php foreach ($errores as $error) : ?>
    <div class="alerta error">
      <?php echo $error ?>
    </div>
  <?php endforeach ?>
  <!-- Formulario -->
  <form class="formulario" method="POST">
    <!-- Vincula formulario -->
    <?php include '../../includes/templates/formulario_vendedores.php' ?>
    <input type="submit" value="Guardar Cambios" class="boton boton-verde">
  </form>
</main>