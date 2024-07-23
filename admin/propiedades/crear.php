<?php
// Vinculación archivo de funciones

require('../../includes/app.php');
// Importar Clase
use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

// Ahora puedes usar Image::make(), etc.
estaAutenticado();

// Crea Instancia 
$propiedad = new Propiedad();

// Consulta para Obtener los vendedores
$vendedores= Vendedor::all();



// Llama a la función incluirTemplate()
incluirTemplate("header");

// Validacion
// - Arreglo con mensajes de Error
$errores = Propiedad::getErrores();

// Ejecucion del código POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Creo nueva Instancia u Objeto de clase Propiedad
  $propiedad = new Propiedad($_POST['propiedad']);
  // - Crea ruta de carpeta
  $carpetaImagenes = '../../imagenes/';
  // - Condicional, busca la carpeta
  if (!is_dir($carpetaImagenes)) {
    // - Si no existe: Crea la Carpeta 
    mkdir($carpetaImagenes);
  }
  // - Generar nombre unico para cada imagen
  $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
  // - Setear la imagen
  // - Realiza un resize a la Img con Intervention
  if ($_FILES['propiedad']['tmp_name']['imagen']) {
    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
    // - Almacena el nombre de la imagen en la BBDD
    $propiedad->setImagen($nombreImagen);
  }

  // - Validar 
  $errores = $propiedad->validar();

  // Verifica si no hay errores (El array $errores esta vacio)
  if (empty($errores)) {
    // SUBIDA DE ARCHIVOS

    // - Crear carpeta para subir imagenes
    if (!is_dir(CARPETA_IMAGENES)) {
      mkdir(CARPETA_IMAGENES);
    }

    // - Guarda la Img en el servidor
    $image->save(CARPETA_IMAGENES . $nombreImagen);

    // - Guarda en la BBDD
    // Llama al metodo guardar() de la clase
    $propiedad->guardar();
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
  <form action="../../admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
    <!-- Vincula formulario -->
    <?php include '../../includes/templates/formulario_propiedades.php' ?>
    <input type="submit" value="Crear Propiedad" class="boton boton-verde">
  </form>
</main>

<?php
// Llama a la función incluirTemplate()
incluirTemplate('footer');
?>

<!-- url: http://localhost/bienesraices/admin/propiedades/crear.php -->