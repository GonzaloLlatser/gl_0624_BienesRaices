<?php
// Vinculación archivo de funciones

require('../../includes/app.php');

use App\Vendedor;

estaAutenticado();

// Crea nueva instancia
$vendedor = new Vendedor();

// - Arreglo con mensajes de Error
$errores = Vendedor::getErrores();

// Ejecucion del código POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
}

incluirTemplate('header');

?>

<main class="contenedor seccion">
  <h1>Registrar Vendedor</h1>
  <!-- Enlaces -->
  <a href="../index.php" class="boton boton-verde">Volver</a>
  <!-- Mensajes de Errores del Formulario -->
  <?php foreach ($errores as $error) : ?>
    <div class="alerta error">
      <?php echo $error ?>
    </div>
  <?php endforeach ?>
  <!-- Formulario -->
  <form action="../../admin/vendedores/crear.php" class="formulario" method="POST">
    <!-- Vincula formulario -->
    <?php include '../../includes/templates/formulario_vendedores.php' ?>
    <input type="submit" value="Registrar Vendedor" class="boton boton-verde">
  </form>
</main>