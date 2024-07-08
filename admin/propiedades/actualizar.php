<?php
// Definicion de Variables
$id = $_GET['id'];
// Filtro de seguridad, solo permite INT
$id = filter_var($id, FILTER_VALIDATE_INT);
// Condicional
if (!$id) {
  header('Location: /bienesraices/admin');
}

//  Vinculacion a la BBDD
require('../../includes/config/database.php');
// Llama a la función conectarDB()
$db = conectarBD();

// Obtener los datos de una Propiedad
$consulta = "SELECT * FROM propiedades WHERE id={$id}";
$resultado = mysqli_query($db, $consulta);
// Almacean los datos en la Variable 
$propiedad = mysqli_fetch_assoc($resultado);

// Consultar a la BBDD (Lista de Vendedores)
$consulta = "SELECT * FROM vendedores;";
$resultado = mysqli_query($db, $consulta);

// Vinculación archivo de funciones
require('../../includes/funciones.php');
// Llama a la función incluirTemplate()
incluirTemplate("header");

// Validacion
// - Arreglo con mensajes de Error
$errores = [];
// - Creo Variables con los valores Obtenidos de la consulta 
$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedorId = $propiedad['vendedorId'];
$imagenPropiedad = $propiedad['imagen'];

// Ejecucion del código POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // - Datos visuales p/ Comprobacion de Obtencion
  // SuperGlobal de POST 
  // echo "<pre>";
  // var_dump($_POST);
  // echo "<pre>";
  // SuperGlobal FILES para archivos
  echo "<pre>";
  var_dump($_FILES);
  echo "<pre>";
  // - Almacena Datos en variables
  // - Incluyo mysqli_real_escape_string(Elimina caracteres especiales en una cadena de texto antes de enviarla a una consulta SQL)
  $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
  $precio = mysqli_real_escape_string($db, $_POST['precio']);
  $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
  $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
  $wc = mysqli_real_escape_string($db,  $_POST['wc']);
  $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
  $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
  $creado = date('Y/m/d');
  // Asignacion de Files a una variable
  $imagen = $_FILES['imagen'];
  // - Condicional Validacion de los Datos
  if (!$titulo) {
    $errores[] = "Debes añadir un título";
  }

  if (!$precio) {
    $errores[] = "El precio es Obligatorio";
  }

  if (strlen($descripcion) < 50) {
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

  // Imagen - validacion del tamaño (1 MB max)
  // Convesion de Bytes a Kbytes
  $medida = 1000 * 1000;
  if ($imagen['size'] > $medida) {
    $errores[] = "La imagen supera el tamaño máximo";
  }

  // Codigo para Visualizar errores
  // echo "<pre>";
  // var_dump($errores);
  // echo "<pre>";

  // Verifica si no hay errores (El array $errores esta vacio)
  if (empty($errores)) {
    // Crea ruta de carpeta
    $carpetaImagenes = '../../imagenes/';

    // - Condicional, busca la carpeta
    if (!is_dir($carpetaImagenes)) {
      // - Si no existe: Crea la Carpeta 
      mkdir($carpetaImagenes);
    }

    $nombreImagen = '';

    // Verificacion de Actualizar - nueva Imagen 
    if ($imagen['name']) {
      // En caso de existir imagen nueva
      // - Eliminar Imagen previa => Utiliza funcion PHP unlink()
      unlink($carpetaImagenes . $propiedad['imagen']);
      // - Generar nombre unico para cada imagen
      $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
      // - Subir imagen a la BBDD
      move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
    }
    // En caso de no subir ninguna imagen
    else {
      $nombreImagen = $propiedad['imagen'];
    }

    // SUBIDA DE ARCHIVOS
    // Insertar en la BBDD
    // - Genera Query SQL
    $query = "UPDATE propiedades SET titulo = '$titulo', precio = '$precio', imagen = '$nombreImagen', descripcion = '$descripcion', habitaciones = $habitaciones, wc = $wc,estacionamiento = $estacionamiento, vendedorId = $vendedorId WHERE id = $id";
    // - Mostrar la consulta para depuración
    echo $query;

    // - Envia la query( Pasa como parametro la conexion $db, y la consulta $query)
    $resultado = mysqli_query($db, $query);
    // - Confirmacion de Formulado enviado
    if ($resultado == true) {
      // Insertado Correctamente- Redirecciono al Usuario
      header('Location: /bienesraices/admin?resultado=2');
    } else {
      echo "No se pudo insertar los datos";
    }
  }
}
?>

<main class="contenedor seccion">
  <h1>Actualizar</h1>
  <!-- Enlaces -->
  <a href="../index.php" class="boton boton-verde">Volver</a>
  <!-- Mensajes de Errores del Formulario -->
  <?php foreach ($errores as $error) : ?>
    <div class="alerta error">
      <?php echo $error ?>
    </div>
  <?php endforeach ?>
  <!-- Formulario -->
  <form class="formulario" method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend>Información General</legend>
      <label for="titulo">Titulo:</label>
      <input type="text" id="titulo" name="titulo" placeholder="Título Propiedad" value="<?php echo $titulo; ?>">
      <label for="precio">Precio:</label>
      <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">
      <label for="imagen">Imagen:</label>
      <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">
      <!-- Enseño imagen -->
      <img src="../../imagenes/<?php echo $imagenPropiedad; ?>" alt="" class="imagen-small">
      <label for="descripcion">Descripción:</label>
      <textarea id="descripcion" name="descripcion"> <?php echo $descripcion; ?> </textarea>
    </fieldset>
    <fieldset>
      <legend>Información Propiedad</legend>
      <label for="habitaciones">Habitaciones:</label>
      <input type="number" id="habitaciones" name="habitaciones" placeholder="Ejemplo: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">
      <label for="wc">Baños:</label>
      <input type="number" id="wc" name="wc" placeholder="Ejemplo: 3" min="1" max="9" value="<?php echo $wc; ?>">
      <label for="estacionamiento">Garage:</label>
      <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ejemplo: 1" min="0" max="5" value="<?php echo $estacionamiento; ?>">
    </fieldset>
    <fieldset>
      <legend>Vendedor</legend>

      <select name="vendedor">
        <option value="">-- Seleccione --</option>
        <!-- Dato de la Consulta a la BBDD -->
        <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
          <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"> <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?> </option>
        <?php endwhile; ?>
      </select>
    </fieldset>
    <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
  </form>
</main>

<?php
// Llama a la función incluirTemplate()
incluirTemplate('footer');
?>

<!-- url: http://localhost/bienesraices/admin/propiedades/crear.php -->