<?php
//  Vinculacion a la BBDD
require('../../includes/config/database.php');
// Llama a la función conectarDB()
$db = conectarBD();

// Vinculación archivo de funciones
require('../../includes/funciones.php');
// Llama a la función incluirTemplate()
incluirTemplate("header");

// Validacion
// - Arreglo con mensajes de Error
$errores = [];


// Ejecucion del código POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // - Datos visuales p/ Comprobacion de Obtencion
  // echo "<pre>";
  // var_dump($_POST);
  // echo "<pre>";
  // - Almacena Datos en variables
  $titulo = $_POST["titulo"];
  $precio = $_POST["precio"];
  $descipcion = $_POST["descipcion"];
  $habitaciones = $_POST["habitaciones"];
  $wc = $_POST["wc"];
  $estacionamiento = $_POST["estacionamiento"];
  $vendedorId = $_POST["vendedor"];
  // - Condicional Validacion de los Datos
  if (!$titulo) {
    $errores[] = "Debes añadir un título";
  }

  if (!$precio) {
    $errores[] = "El precio es Obligatorio";
  }

  if (strlen($descipcion) < 50) {
    $errores[] = "La Descripción es Obligatoria y debe tener al menos 50 caracteres";
  }

  if (!$habitaciones) {
    $errores[] = "El número de habitaciones es Obligatorio";
  }

  if (!$wc) {
    $errores[] = "El número de baños es Obligatorio";
  }

  if (!$estacionamiento) {
    $errores[] = "El número de sitios de estacionamiento es Obligatorio";
  }

  if (!$vendedorId) {
    $errores[] = "Selecciona un vendedor";
  }

  // Codigo para Visualizar errores
  // echo "<pre>";
  // var_dump($errores);
  // echo "<pre>";

  // Verifica si no hay errores (El array $errores esta vacio)
  if (empty($errores)) {
    // Insertar en la BBDD
    // - Genera Query SQL
    $query = "INSERT INTO propiedades(titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedorId) VALUES('$titulo','$precio','$descipcion','$habitaciones','$wc','$estacionamiento','$vendedorId')";
    // - Envia la query( Pasa como parametro la conexion $db, y la consulta $query)
    $resultado = mysqli_query($db, $query);
    // - Mensaje de Confirmacion
    if ($resultado == true) {
      echo "Insertado Correctamente";
    } else {
      echo "No se pudo insertar los datos";
    }
  }
}

?>

<main class="contenedor seccion">
  <h1>Crear</h1>
  <!-- Enlaces -->
  <a href="../index.php" class="boton boton-verde">Volver</a>
  <!-- Mensajes de Errores del Formulario -->
  <?php foreach ($errores as $error) : ?>
    <div class="alerta error">
      <?php echo $error ?>
    </div>
  <?php endforeach ?>
  <!-- Formulario -->
  <form action="../../admin/propiedades/crear.php" class="formulario" method="POST">
    <fieldset>
      <legend>Información General</legend>
      <label for="titulo">Titulo:</label>
      <input type="text" id="titulo" name="titulo" placeholder="Título Propiedad">
      <label for="precio">Precio:</label>
      <input type="number" id="precio" name="precio" placeholder="Precio Propiedad">
      <label for="imagen">Imagen::</label>
      <input type="file" id="imagen" accept="image/jpeg, image/png">
      <label for="descipcion">Descripción:</label>
      <textarea id="descripcion" name="descipcion"></textarea>
    </fieldset>
    <fieldset>
      <legend>Información Propiedad</legend>
      <label for="habitaciones">Habitaciones:</label>
      <input type="number" id="titulo" name="habitaciones" placeholder="Ejemplo: 3" min="1" max="9">
      <label for="baños">Baños:</label>
      <input type="number" id="wc" name="wc" placeholder="Ejemplo: 3" min="1" max="9">
      <label for="estacionamiento">Garage:</label>
      <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ejemplo: 1" min="0" max="5">
    </fieldset>
    <fieldset>
      <legend>Vendedor</legend>
      <select name="vendedor">
        <option value="">-- Seleccione --</option>
        <option value="1">Juan</option>
        <option value="1">Karen</option>
      </select>
    </fieldset>
    <input type="submit" value="Crear Propiedad" class="boton boton-verde">
  </form>
</main>

<?php
// Llama a la función incluirTemplate()
incluirTemplate('footer');
?>

<!-- url: http://localhost/bienesraices/admin/propiedades/crear.php -->