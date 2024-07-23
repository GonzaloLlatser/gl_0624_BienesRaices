<?php
// Vinculación archivo de funciones

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;


require('../../includes/app.php');
estaAutenticado();

// Definicion de Variables
$id = $_GET['id'];
// Filtro de seguridad, solo permite INT
$id = filter_var($id, FILTER_VALIDATE_INT);
// Condicional
if (!$id) {
  header('Location: /bienesraices/admin');
}

// Obtener los datos de una Propiedad
$propiedad = Propiedad::find($id);



// Consultar a la BBDD (Lista de Vendedores)
$consulta = "SELECT * FROM vendedores;";
$resultado = mysqli_query($db, $consulta);

// Llama a la función incluirTemplate()
incluirTemplate("header");

// Validacion
// - Arreglo con mensajes de Error
$errores = Propiedad::getErrores();

// Ejecucion del código POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Asignar los atributos
  $args = $_POST['propiedad'];

  $propiedad->sincronizar($args);

  // Validacion de archivos
  $errores = $propiedad->validar();

  // Subida de archivos
  // - Generar nombre unico para cada imagen
  $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

  // - Realiza un resize a la Img con Intervention
  if ($_FILES['propiedad']['tmp_name']['imagen']) {
    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
    // - Almacena el nombre de la imagen en la BBDD
    $propiedad->setImagen($nombreImagen);
  }

  // Verifica si no hay errores (El array $errores esta vacio)
  if (empty($errores)) {
    // Almacenar la Imagen
    $image->save(CARPETA_IMAGENES . $nombreImagen);
    $propiedad->guardar();
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
    <!-- Vincula Formulario -->
    <?php include '../../includes/templates/formulario_propiedades.php' ?>
    <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
  </form>
</main>

<?php
// Llama a la función incluirTemplate()
incluirTemplate('footer');
?>

<!-- url: http://localhost/bienesraices/admin/propiedades/crear.php -->